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

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Fusion\Http\Controllers\Controller;
use Modules\Bigcommerce\Models\Customer;
use Modules\Bigcommerce\Http\Resources\CustomerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return JsonResource
     */
    public function index(Request $request)
    {
        return CustomerResource::collection(
            Customer::orderBy('email')->paginate(25)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  Request   $request
     * @param  Customer  $customer
     * @return JsonResource
     */
    public function show(Request $request, Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Validate customer password (via BigCommerce CRM).
     *
     * @param  Request  $request
     * @param  Customer $customer
     * @return JsonResource
     */
    public function validatePassword(Request $request, Customer $customer)
    {
        try {
            $endpoint = "v2/customers/{$customer->id}/validate";
            $password = $request->input('password');

            $response = resolve('requestor')->request($endpoint, "GET", ['password' => $password]);
            $valid    = $response->get('data')->success;
        } catch (Exception $exception) {
            Log::error('[Validation attempt failed]', ['message' => $exception->getMessage()]);
            
            return response('Validation attempt failed.', 500);
        }

        if ($valid) {
            return response('Validation successful!', 200);
        } else {
            return response('Validation attempt failed.', 404);
        }
    }
}