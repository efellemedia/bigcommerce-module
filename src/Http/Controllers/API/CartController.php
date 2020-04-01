<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Bigcommerce\Facades\Cart;
use Modules\Bigcommerce\Http\Resources\CartResource;
use Modules\Bigcommerce\Http\Requests\AddCartLineItemsRequest;
use Modules\Bigcommerce\Http\Requests\UpdateCartLineItemRequest;

class CartController extends Controller
{
    /**
     * Get current BigCommerce cart.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show(Request $request)
    {
        if ($cart = Cart::current()) {
            return new CartResource($cart);
        }

        return response()->json('Cart does not exist.', '404');
    }

    /**
     * Add line item(s) to BigCommerce Cart.
     *
     * @param  AddCartLineItemsRequest  $request
     * @return Response
     */
    public function store(AddCartLineItemsRequest $request)
    {
        if ($cart = Cart::addLineItems($request->validated())) {
            return new CartResource($cart);
        }

        return response()->json('Internal error occurred. Please check logs.', '500');
    }

    /**
     * Update line item in BigCommerce Cart.
     *
     * @param  UpdateCartLineItemRequest  $request
     * @param  integer                    $itemId
     * @return Response
     */
    public function update(UpdateCartLineItemRequest $request, $itemId)
    {
        if ($cart = Cart::updateLineItem($itemId, $request->validated())) {
            return new CartResource($cart);
        }

        return response([
            'error' => [
                'message'     => 'Internal error occurred. Please check logs.',
                'status_code' => 500,
            ]
        ])->json('Internal error occurred. Please check logs.', '500');
    }

    /**
     * Remove line item in BigCommerce Cart.
     *
     * @param  Request  $request
     * @param  integer  $itemId
     * @return Response
     */
    public function destroy(Request $request, $itemId)
    {
        if ($cart = Cart::removeLineItem($itemId)) {
            return new CartResource($cart);
        }

        return response()->json('Internal error occurred. Please check logs.', '500');
    }
}