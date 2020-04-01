<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Bigcommerce\Models\Product;
use Modules\Bigcommerce\Models\Variant;
use Modules\Bigcommerce\Models\Category;
use Modules\Bigcommerce\Jobs\Requests\Store\SettingsRequest;
use Modules\Bigcommerce\Jobs\Requests\Catalog\ProductRequest;
use Modules\Bigcommerce\Jobs\Requests\Catalog\CategoryRequest;
use Modules\Bigcommerce\Jobs\Requests\Customer\CustomerRequest;
use Modules\Bigcommerce\Jobs\Requests\Catalog\ProductVariantRequest;

class WebhookController
{
	/**
     * Handle webhook request.
     * 
     * @param  Request $request
     * @return Response
     */
    public function handle(Request $request)
    {
        $payload = $request->all();
        $method  = $this->eventToMethod($payload['scope']);

        Log::setHandlers([new \Monolog\Handler\StreamHandler(storage_path() . '/logs/bigcommerce-webhooks.log')]);
        Log::debug('[BigCommerce Webhook]', ['payload' => var_export($payload, true)]);

        if (method_exists($this, $method)) {
        	return $this->$method($payload);
        }

        return response('Webhook handler does not exist.', 404);
    }

    /**
     * Handle webhook event.
     * store/category/created
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCategoryCreated($payload)
    {
        try {
            dispatch_now(new CategoryRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/category/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCategoryUpdated($payload)
    {
        try {
            dispatch_now(new CategoryRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/category/deleted
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCategoryDeleted($payload)
    {
        try {
            Category::destroy($payload['data']['id']);

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/product/created
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreProductCreated($payload)
    {
        try {
            dispatch_now(new ProductRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/product/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreProductUpdated($payload)
    {
        try {
            dispatch_now(new ProductRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/product/deleted
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreProductDeleted($payload)
    {
        try {
            Product::destroy($payload['data']['id']);

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/product/inventory/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreProductInventoryUpdated($payload)
    {
        // Note: `200` success sent back because,
        //  `store/product/updated` will handle the update.

        return response('Webhook handled.');
    }

    /**
     * Handle webhook event.
     * store/product/inventory/order/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreProductInventoryOrderUpdated($payload)
    {
        // Note: `200` success sent back because,
        //  `store/product/updated` will handle the update.

        return response('Webhook handled.');
    }

    /**
     * Handle webhook event.
     * store/sku/created
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreSkuCreated($payload)
    {
        try {
            dispatch_now(new ProductVariantRequest($payload['data']['sku']['product_id'], $payload['data']['sku']['variant_id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/sku/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreSkuUpdated($payload)
    {
        try {
            dispatch_now(new ProductVariantRequest($payload['data']['sku']['product_id'], $payload['data']['sku']['variant_id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/sku/deleted
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreSkuDeleted($payload)
    {
        try {
            ProductVariant::where([
                'id'         => $payload['data']['sku']['variant_id'],
                'product_id' => $payload['data']['sku']['product_id']
            ])->delete();

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/sku/inventory/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreSkuInventoryUpdated($payload)
    {
        // Note: `200` success sent back because,
        //  `store/sku/updated` will handle the update.

        return response('Webhook handled.');
    }

    /**
     * Handle webhook event.
     * store/sku/inventory/order/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreSkuInventoryOrderUpdated($payload)
    {
        // Note: `200` success sent back because,
        //  `store/sku/updated` will handle the update.

        return response('Webhook handled.');
    }

    /**
     * Handle webhook event.
     * store/customer/created
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCustomerCreated($payload)
    {
        try {
            dispatch_now(new CustomerRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/customer/updated
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCustomerUpdated($payload)
    {
        try {
            dispatch_now(new CustomerRequest($payload['data']['id']));

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }
    
    /**
     * Handle webhook event.
     * store/customer/deleted
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreCustomerDeleted($payload)
    {
        try {
            $user = User::where(['bigcommerce_customer_id' => $item->id]);
        
            if (! is_null($user))
            {
                $user->bigcommerce_customer_id = 0;
                $user->save();
            }

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Handle webhook event.
     * store/information/deleted
     * 
     * @param  array $payload
     * @return Response
     */
    protected function whenStoreInformationUpdated($payload)
    {
        try {
            dispatch_now(new SettingRequest);

            return response('Webhook handled.');
        } catch (Exception $exception) {
            $this->webhookFailed($exception);
        }

        return response('Unable to complete request. Please review logs.', 500);
    }

    /**
     * Resolve event to method name.
     * [HELPER]
     * 
     * @param  string $event
     * @return string
     */
    protected function eventToMethod($event)
    {
        return 'when' . studly_case(str_replace('/', '_', $event));
    }

    /**
     * Handle request failed.
     *
     * @param  Exception  $exception
     * @return void
     */
    protected function webhookFailed(Exception $exception)
    {
        Log::setHandlers([new \Monolog\Handler\StreamHandler(storage_path() . '/logs/bigcommerce-webhooks.log')]);
        Log::error('[BigCommerce Webhook - Error]', ['message' => $exception->getMessage()]);
    }
}