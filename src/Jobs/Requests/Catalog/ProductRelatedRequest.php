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
use Modules\Bigcommerce\Models\Product;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProductRelatedRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * API request endpoint.
     * 
     * @var string
     */
    private $endpoint = "v3/catalog/products";

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
     * ID of resource (optional)
     * 
     * @var integer|null
     */
    private $id;

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
     * @param  array $query
     * @return void
     */
    public function __construct($id = null, $query = [])
    {
        $this->id        = $id;
        $this->endpoint .= ! is_null($id) ? "/" . $id : "";

        $this->query = array_merge([
            'include_fields' => 'related_products',
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

        if (! is_null($this->id)) {
            $this->createOrUpdate($items);
        } else {
            $items->each(function($item, $key) {
                $this->createOrUpdate($item);
            });
        }

        // BigCommerce only allows a max of 250 items to be pulled at a time.
        // We'll use the `pagination` value to cycle through the next set..
        if (! is_null($pagination)) {
            if ($pagination->hasMorePages()) {
                $newQuery = $this->query;
                $newQuery['page'] = $pagination->currentPage() + 1;

                dispatch(new ProductRelatedRequest($this->id, $newQuery));
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
        Product::find($item->id)->related()->sync(
            collect($item->related_products)
                ->filter(function($value, $key) {
                    return $value > 0;
                })
        );
    }
}
