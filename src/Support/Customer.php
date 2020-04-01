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

use Cache;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Log;

class Customer
{
    /**
     * Get current BigCommerce Customer's group.
     *
     * @param  integer  $groupId
     * @return Collection
     */
    public function group($groupId)
    {
        if ($groupId) {
            try {
                $endpoint = 'v2/customer_groups/' . $groupId;
                $response = resolve('requestor')->request($endpoint, 'GET');
                $group    = $response->get('data');
                
                return collect($group);
            } catch (Exception $exception) {
                Log::error('[BigCommerce Cart Request]', [ 'message' => $exception->getMessage() ]);
            }
        }

        return false;
    }

	/**
     * Get customer login token for BigCommerce logins.
     *
     * @param  integer  $customerId
     * @return string
     */
    public function loginToken($customerId)
    {
        $iss    = config('bigcommerce.client_id');
        $iat    = time() + $this->getTimeOffset();
        $secret = config('bigcommerce.secret');

        $store_hash = config('bigcommerce.base_uri');
        $store_hash = explode('/', $store_hash);
        $store_hash = end($store_hash);
        $store_hash = trim($store_hash, '/');

        $payload = [
            'iss'         => $iss,
            'iat'         => $iat,
            'jti'         => bin2hex( random_bytes( 32 ) ),
            'operation'   => 'customer_login',
            'store_hash'  => $store_hash,
            'customer_id' => $customerId,
            'redirect_to' => '/',
            'request_ip'  => request()->server('SERVER_ADDR'),
        ];

        return JWT::encode($payload, $secret, 'HS256');
    }

    /**
     * [Helper]
     * Retrieve BigCommerce server time offset.
     * This is necessary for successful JWT requests.
     * 
     * @return int
     */
    private function getTimeOffset()
    {
        if (Cache::has('bigcommerce.time_offset')) {
            return Cache::get('bigcommerce.time_offset'); 
        }

        return Cache::remember('bigcommerce.time_offset', 3600, function () {
            try {
            	$response = resolve('requestor')->request('v2/time', 'GET');
        		$time     = $response->get('data')->time;
            } catch (Exception $exception) {
                $time = time();
            }

            return $time - time();
        }); 
    }
}