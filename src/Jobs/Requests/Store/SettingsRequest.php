<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Jobs\Requests\Store;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Modules\Bigcommerce\Models\Store;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SettingsRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * API request endpoint.
     * 
     * @var string
     */
    private $endpoint = "v2/store";

    /**
     * Request method.
     * 
     * @var string
     */
    private $method = "GET";

    /**
     * Request query.
     * 
     * @var array
     */
    private $query = [];

    /**
     * Create a new job instance.
     *
     * @param  integer $id
     * @param  array   $query
     * @return void
     */
    public function __construct($query = [])
    {
        $this->query = $query;
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $response = resolve('requestor')->request($this->endpoint, $this->method, [
            'query' => $this->query,
        ]);
        
        $settings = collect($response->get('data'));

        $settings->each(function($value, $key) {
            $this->createOrUpdate($key, $value);
        });
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

    /**
     * Create or update database entry.
     *
     * @param  Collection $item
     * @return void
     */
    public function createOrUpdate($key, $value)
    {
        return Store::updateOrCreate(['key' => $key],
            [
                'key'   => $key,
                'value' => $value,
            ]
        );
    }
}
