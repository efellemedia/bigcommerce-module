<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

	/*
    |--------------------------------------------------------------------------
    | API Credentials.
    |--------------------------------------------------------------------------
    | Credentials for BigCommerce API.
    |
    | Reference:
    |   https://developer.bigcommerce.com/api-docs/getting-started/authentication
    |
    */
   
    'client_id'    => env('BC_CLIENT_ID', ""),
    'secret'       => env('BC_SECRET', ""),
    'auth_token'   => env('BC_AUTH_TOKEN', ""),
    'base_uri'     => env('BC_ENDPOINT', ""),
    'cart_expires' => env('BC_CART_EXPIRES', time() + 60 * 60 * 24 * 30),  // 30 days from now
    
];