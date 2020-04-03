<?php

namespace Modules\Bigcommerce\Traits;

use Cache;
use Closure;
use Exception;
use Illuminate\Support\Arr;
use GuzzleHttp\Client as GuzzleHttpClient;

trait Requestable {

    /**
     * Cache tags.
     *
     * @var array
     */
    private $cacheTags = [];

    /**
     * Expiration of cache in minutes.
     *
     * @var  integer
     */
    private $cacheLimit = 60;

    /**
     * Connection timeout setting.
     *
     * @var integer
     */
    private $timeout = 10;

    /**
     * HTTP error settings.
     *
     * @var boolean
     */
    private $httpErrors = false;

    /**
     * Request accept type.
     *
     * @var string
     */
    private $acceptType = 'application/json';

    /**
     * Request content type.
     *
     * @var string
     */
    private $contentType = 'application/json';

    /**
     * Set accept type for request.
     * 
     * @param  string $contentType
     * @return self
     */
    public function setAcceptType($acceptType)
    {
        $this->acceptType = $acceptType;

        return $this;
    }

    /**
     * Set content type for request.
     * 
     * @param  string $contentType
     * @return self
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Make HTTP Request using Guzzle.
     *
     * @param  String  $uri      - Request URI
     * @param  String  $method   - Request method
     * @param  Array   $options  - Request parameters
     * @return Collection
     */
    private function makeRequest($uri, $method = 'GET', array $options = [])
    {
        if (strtolower($method) === 'get') {
            return $this->getRequest($uri, $method, $options);
        }

        return $this->connectionAndRequest($method, $uri, $options);
    }

    /**
     * HTTP Request - GET Resource.
     * Cache GET requests for faster response times.
     *
     * @param  String  $uri      - Request URI
     * @param  String  $method   - Request method
     * @param  Array   $options  - Request parameters
     * @return Collection
     */
    private function getRequest($uri, $method = 'GET', array $options = [])
    {
        $cacheKey = $this->generateCacheKey($uri, $options);

        return Cache::tags($this->cacheTags)
            ->remember($cacheKey, $this->cacheLimit, function() use ($method, $uri, $options) {
                return $this->connectionAndRequest($method, $uri, $options);
        });
    }

    /**
     * HTTP Request helper.
     * Connect to API and request response.
     *
     * @param  String  $method   - Request method
     * @param  String  $uri      - Request URI
     * @param  Array   $options  - Request parameters
     * @return Collection
     */
    private function connectionAndRequest($method, $uri, array $options = [])
    {
        try {
            $response = $this->connection()->request($method, $uri, $options);
            $response = $this->handleResponse($method, $uri, $response, $options);
        } catch(Exception $exception) {
            return collect([
                'status' => 500,
                'reason' => $exception->getMessage()
            ]);
        }

        return $response;
    }

    /**
     * Create HTTP connection instance.
     *
     * @return GuzzleHttpClient
     */
    private function connection()
    {
        if (is_null($this->auth['client_id'])) {
            throw new Exception('Client ID must be provided');
        }

        if (is_null($this->auth['auth_token'])) {
            throw new Exception('OAuth Token must be provided');
        }

        if (is_null($this->auth['base_uri'])) {
            throw new Exception('Endpoint must be provided');
        }

        $client = new GuzzleHttpClient([
            'base_uri'    => rtrim($this->auth['base_uri'], '/') . '/',
            'timeout'     => $this->timeout,
            'http_errors' => $this->httpErrors,
            'headers'     => [
                'X-Auth-Client' => $this->auth['client_id'],
                'X-Auth-Token'  => $this->auth['auth_token'],
                'Accept'        => $this->acceptType,
                'Content-Type'  => $this->contentType,
            ]
        ]);

        return $client;
    }

    /**
     * Handle HTTP request response.
     *
     * @param  String  $method
     * @param  String  $uri
     * @param  Stream  $response
     * @param  array   $options
     * @return Collection
     */
    private function handleResponse($method, $uri, $response, $options)
    {
        $arr     = explode('/', $uri);
        $version = head($arr);
        
        return collect([
            'version'  => $version,
            'uri'      => $uri,
            'method'   => $method,
            'status'   => $response->getStatusCode(),
            'reason'   => $response->getReasonPhrase(),
            'options'  => $options,
            'body'     => json_decode($response->getBody())
        ]);
    }

    /**
     * Handle non-200 responses.
     * Record errors in error log.
     *
     * @param  Stream $response
     * @return void
     */
    private function handleError($response)
    {
        $status  = $response->get('status');
        $reason  = $response->get('reason');
        $uri     = $response->get('uri');
        $method  = $response->get('method');
        $options = $response->get('options');

        switch ($status) {
            case 400:
                throw new Exception("[" . $status . "] - " . $reason);
            case 404:
                throw new Exception("[" . $status . "] - `" . $uri . "` " . $reason);
            case 405:
                throw new Exception("[" . $status . "] - " . $reason . ": " . $method);
            default:
                throw new Exception("[" . $status . "] - " . $reason);
        }
    }

    /**
     * Generate unique cache key.
     *
     * @param  String  $uri      - Request URI
     * @param  Array   $options  - Request parameters
     * @return String
     */
    private function generateCacheKey($uri, array $options = [])
    {
        $options = Arr::dot($options);
        $options = array_filter($options);

        if (count($options) > 0) {
            $opts = [];

            foreach ($options as $key => $value) {
                $opts[] = $key . '=' . $value;
            }

            $key = $uri . implode('-', $opts);
        } else {
            $key = $uri;
        }

        return implode('_', $this->cacheTags) . '_' . md5($key);
    }
}