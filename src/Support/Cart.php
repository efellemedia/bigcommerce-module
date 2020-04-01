<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Support;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class Cart
{
    /**
     * BigCommerce Cart cookie key.
     *
     * @var string
     */
    const CART_KEY = 'bigcommerce_cart';

    /**
     * BigCommerce cart count cookie key.
     * 
     * @var string
     */
    const CART_COUNT_KEY = 'bigcommerce_cart_count';

    /**
     * Save BigCommerce Cart ID.
     *
     * @param  int  $id
     * @return void
     */
    private function setId($id)
    {
        setcookie(self::CART_KEY, $id, config('bigcommerce.cart_expires'), '/');
    }

    /**
     * Save BigCommerce Cart Count.
     * 
     * @param  int  $count
     * @return void
     */
    private function setCount($count)
    {
        // cookie(self::CART_COUNT_KEY, $count, config('bigcommerce.cart_expires'));
        setcookie(self::CART_COUNT_KEY, $count, config('bigcommerce.cart_expires'), '/');
    }

    /**
     * Reset and forget the set BigCommerce Cart Cookie.
     * 
     * @return void
     */
    private function reset()
    {
        Log::debug('Resetting cart...');

        Cookie::queue(Cookie::forget(self::CART_KEY));
        Cookie::queue(Cookie::forget(self::CART_COUNT_KEY));
    }

    /**
     * Get BigCommerce Cart ID.
     * 
     * @return int
     */
    private function getId()
    {
        return $_COOKIE[self::CART_KEY] ?? false;
    }

    /**
     * Get current BigCommerce Cart.
     *
     * @return Collection
     */
    public function current()
    {
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            
            return false;
        }

        try {
            $endpoint = 'v3/carts/' . $this->getId().'?include=redirect_urls';
            $response = resolve('requestor')->request($endpoint, 'GET');
            $cart     = $response->get('data');
      
            $this->setId($cart->id);

            return collect($cart);
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
    }

    public function redirects()
    {
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            
            return false;
        }

        try {
            $endpoint  = 'v3/carts/' . $this->getId().'/redirect_urls';
            $response  = resolve('requestor')->request($endpoint, 'GET');
            $redirects = $response->get('data');
      
            return collect($redirects);
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
    }

    /**
     * Check if BigCommerce Cart has been created yet.
     *
     * @return bool
     */
    public function exists()
    {
        return $this->getId() !== false;
    }

    /**
     * Create new BigCommerce cart.
     * 
     * @param  array  $cartData
     * @return bool
     */
	public function create($cartData)
	{
        try {
            $cartData['customer_id'] = auth()->user()->id ?? 0;

            $endpoint = 'v3/carts?include=redirect_urls';
            $options  = [ 'body' => json_encode($cartData) ];
            $response = resolve('requestor')->request($endpoint, 'POST', $options);
            $cart     = $response->get('data');

            $this->setId($cart->id);

            $this->countItems($cart);

            return collect($cart);
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
	}

    /**
     * Destroy BigCommerce cart.
     * 
     * @return bool
     */
	public function destroy()
	{
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            return false;
        }

        try {
            resolve('requestor')->request('v3/carts/' . $this->getId(), 'DELETE');

            $this->reset();
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
	}

    /**
     * Updates a BigCommerce Cart's `customer_id`.
     *
     * Note:
     *   Changing the `customer_id` will remove any promotions or
     *   shipping on the Cart. These are tied to the customer depending
     *   on cart conditions and any customer groups.
     * 
     * @param  integer  $customerId
     * @return Collection
     */
    public function updateCustomerID($customerId = null)
    {
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            return false;
        }

        try {
            $endpoint = 'v3/carts/' . $this->getId();
            $options  = [ 'body' => json_encode([ 'customer_id' => auth()->user()->id ?? 0 ]) ];
            $response = resolve('requestor')->request($endpoint, 'PUT', $options);
            $cart     = $response->get('data');

            $this->setId($cart->id);

            return collect($cart);
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
    }

    /**
     * Add items to a BigCommerce Cart.
     * Validation is performed on the `API\CartController`.
     *
     * @param  array  $cartData
     * @return bool
     */
	public function addLineItems($cartData)
	{
        Log::debug('Adding cart line item');
        
        if (! $this->exists()) {
            return $this->create($cartData);
        }

        try {
            $endpoint = 'v3/carts/'.$this->getId().'/items';
            $options  = [ 'body' => json_encode($cartData) ];
            $response = resolve('requestor')->request($endpoint, 'POST', $options);
            $cart     = $response->get('data');

            $this->setId($cart->id);
            
            $this->countItems($cart);

            return collect($cart);
        } catch (Exception $exception) {
            Log::error('[Exception thrown while adding line item]', ['message' => $exception->getMessage()]);
        }

        return false;
	}

    /**
     * Updates an existing, single line item in the cart.
     *
     * Note:
     *   Currently only updating the item price and quantity are supported.
     *
     *   If a variant needs to be changed or updated, the product will need
     *   to be removed and re-added to the cart with the correct variants using
     *   the `Add Cart Line Items` endpoint.
     *
     * @param  integer  $itemId
     * @param  array    $cartData
     * @return bool
     */
	public function updateLineItem($itemId, $cartData)
	{
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            return false;
        }

        try {
            $endpoint = 'v3/carts/' . $this->getId() . "/items/" . $itemId;
            $options  = [ 'body' => json_encode($cartData) ];
            $response = resolve('requestor')->request($endpoint, 'PUT', $options);
            $cart     = $response->get('data');

            $this->setId($cart->id);

            $this->countItems($cart);

            return collect($cart);
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        return false;
	}

    /**
     * Deletes a BigCommerce Cart line item.
     *
     * @param  integer  $itemId
     * @return Collection - updated cart
     */
	public function removeLineItem($itemId)
	{
        if (! $this->exists()) {
            Log::error('[BigCommerce Cart Request]', ['message' => 'Cart Not Found.']);
            return false;
        }
        
        try {
            $endpoint = 'v3/carts/' . $this->getId() . '/items/' . $itemId;
            $response = resolve('requestor')->request($endpoint, 'DELETE');
        } catch (Exception $exception) {
            Log::error('[BigCommerce Cart Request]', ['message' => $exception->getMessage()]);
        }

        $cart = $response->get('data');

        if ($this->isEmpty($cart)) {
            $this->reset();
        } else {
            $this->countItems($cart);
        }

        return collect($cart);
    }

    protected function countItems($cart)
    {
        Log::debug('counting items');

        $count = array_reduce(iterator_to_array($this->iterateThroughItems($cart)), function($count, $item) {
            if (isset($item->parent_id) and $item->parent_id) {
                return $count;
            }

            if (isset($item->quantity) and $item->quantity) {
                $count += $item->quantity;
            } else {
                $count += 1;
            }

            return $count;
        }, 0);

        Log::debug('cart count', [$count]);

        $this->setCount($count);
    }

    /**
     * Iterate through all cart items.
     * 
     * @param  object  $cart
     * @return \Generator
     */
    private function iterateThroughItems($cart)
    {
        if (! $this->isEmpty($cart)) {
            foreach ( $cart->line_items->physical_items as $item ) {
                yield $item;
            }
    
            foreach ( $cart->line_items->digital_items as $item ) {
                yield $item;
            }
    
            foreach ( $cart->line_items->gift_certificates as $item ) {
                yield $item;
            }
        } else {
            yield;
        }
    }

    /**
     * Determines if the cart is empty or not.
     * 
     * @param  mixed  $cart
     * @return bool
     */
    protected function isEmpty($cart)
    {
        return is_null($cart);
    }
}