<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Jobs\Requests\Catalog;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Bigcommerce\Models\ProductRule;

class ProductRuleRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * API request endpoint.
     * 
     * @var string
     */
    private $endpoint = "v3/catalog/products/{product_id}/complex-rules";

    /**
     * Request method.
     * 
     * @var string
     */
    private $method = "GET";

    /**
     * Request query - page number.
     * 
     * @var integer
     */
    private $page = 1;

    /**
     * Request query - limit.
     * 
     * @var integer
     */
    private $limit = 100;

    /**
     * Product ID.
     *
     * @var integer
     */
    private $productId;

    /**
     * Request query.
     * 
     * @var array
     */
    private $query = [];

    /**
     * Create a new job instance.
     *
     * @param  integer $productId
     * @param  array   $query
     * @return void
     */
    public function __construct($productId, array $query = [])
    {
        $this->productId = $productId;
        $this->endpoint  = str_replace('{product_id}', $productId, $this->endpoint);
        $this->query     = array_merge([
            'page'    => $this->page,
            'limit'   => $this->limit
        ], $query);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        $response   = resolve('requestor')->request($this->endpoint, $this->method, [ 'query' => $this->query ]);
        $items      = $response->get('data');
        $pagination = $response->get('pagination');

        $items->each(function($item, $key) {
            $this->createOrUpdate($item);
        });

        // BigCommerce only allows a max of 250 items to be pulled at a time.
        // We'll use the `pagination` value to cycle through the next set..
        if (! is_null($pagination)) {
            if ($pagination->hasMorePages()) {
                $newQuery = $this->query;
                $newQuery['page'] = $pagination->currentPage() + 1;

                dispatch(new ProductRuleRequest($this->productId, $newQuery));
            }
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

    /**
     * Create or update database entry.
     *
     * @param  Collection $item
     * @return void
     */
    public function createOrUpdate($item)
    {
        ProductRule::updateOrCreate([ 'id' => $item->id ],
            [
                'product_id'                  => $item->product_id,
                'image_url'                   => $item->image_url,
                'enabled'                     => (bool) $item->enabled,
                'stop'                        => (bool) $item->stop,
                'price_adjuster'              => $item->price_adjuster,
                'weight_adjuster'             => $item->weight_adjuster,
                'conditions'                  => $item->conditions,
                'purchasing_disabled'         => (bool) $item->purchasing_disabled,
                'purchasing_disabled_message' => $item->purchasing_disabled_message,
                'purchasing_hidden'           => (bool) $item->purchasing_hidden,
                'sort_order'                  => $item->sort_order,
            ]
        );
    }
}
