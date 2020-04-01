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

use Exception;
use Illuminate\Support\Facades\Log;

class GenerateWebhooks
{
    /**
     * Instantiate a new job.
     * 
     * @param array $hooks
     */
    public function __construct($hooks = [])
    {
        $this->hooks = $hooks;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $response = resolve('requestor')->request('v2/hooks', 'GET');
        $webhooks = $response->get('data');
        $webhooks = collect($webhooks)->map(function ($value, $key) {
            return $value->scope;
        })->toArray();

        $missing = array_diff($this->hooks, $webhooks);

        foreach ($missing as $scope)
        {
            resolve('requestor')->request('v2/hooks', 'POST', [
                'body' => json_encode([
                    'scope'       => $scope,
                    'destination' => rtrim(config('app.url'), '/') . '/bigcommerce/webhooks',
                    'is_active'   => true
                ])
            ]);
        }
    }

    /**
     * The job failed to process.
     *
     * @param  Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        Log::error('[BigCommerce API Request]', ['message' => $exception->getMessage()]);
    }
}
