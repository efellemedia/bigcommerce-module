<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Jobs;

use Modules\Bigcommerce\Traits\Requestable;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class Requestor
{
	use Requestable;

	/**
	 * Auth Credentials.
	 * 
	 * @var array
	 */
	protected $auth;

	public function __construct()
	{
		$this->cacheTags = ['bigcommerce'];
		$this->auth      = [
			'client_id'  => config('bigcommerce.client_id'),
			'auth_token' => config('bigcommerce.auth_token'),
			'base_uri'   => config('bigcommerce.base_uri'),
		];
	}

	/**
     * Make Request.
     * Returns response in form of Collection.
     *
     * @param  string  $endpoint
     * @param  string  $method
     * @param  array   $options
     * @return Collection
     */
	public function request($endpoint, $method = "GET", array $options = [])
	{
		$response = $this->makeRequest($endpoint, $method, $options);
		$status   = $response->get('status');
		
		if ($status >= 200 && $status <= 299) {
			return $this->mapResource($response, $options);
		}

		return $this->handleError($response);
	}

	/**
     * Prepare & serve resource.
     *
     * @param  Collection  $response
     * @param  array       $options
     * @return mixed
     */
	private function mapResource($response, array $options = [])
	{
		list($data, $pagination) = $this->parseResponse($response, $options);

		if (! is_null($pagination)) {
			return $this->mapCollection($data, $pagination);
		}

		return collect(['data' => $data]);
	}

	/**
     * Prepare & serve collection resource.
     *
     * @param  Collection $data
     * @param  mixed      $pagination
     * @return mixed
     */
    private function mapCollection($data, $pagination)
    {
    	if (! is_null($pagination)) {
			$pagination = new Paginator(
				$data,
				$pagination->total,
				$pagination->per_page,
				$pagination->current_page,
				[
					'path' => url()->current()
				]
			);
		}

		return collect(['data' => $data, 'pagination' => $pagination]);
    }

	/**
     * Parse response based on API version.
     * 
     * @param  Collection  $response
     * @param  array       $options
     * @return array
     */
    private function parseResponse($response, array $options = [])
    {
        $version = $response->get('version');
		$body    = $response->get('body');
		
        switch ($version) {
            case 'v2':
            	if (is_array($body)) {
            		$data       = collect($body);
            		$pagination = (object) [
            			'total'        => $options['total']          ?? $data->count(),
            			'per_page'     => $options['query']['limit'] ?? 250,
            			'current_page' => $options['query']['page']  ?? 1
            		];
            	} else {
            		$data       = collect([$body])->first();
            		$pagination = null;
            	}
            break;
			default:
				if (isset($body->meta->pagination)) {
					$data = collect($body->data);
				} elseif (isset($body->data)) {
					$data = collect([$body->data])->first();
				} else {
					$data = $body;
				}
				
				$pagination = isset($body->meta->pagination) ? $body->meta->pagination : null;
            break;
        }

        return [ $data, $pagination ];
    }
}