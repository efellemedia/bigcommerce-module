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
use Modules\Bigcommerce\Models\ProductVariant;

class ProductVariantRequest implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * API request endpoint.
     * 
     * @var string
     */
    private $endpoint = "v3/catalog/variants";

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
     * Product ID (optional).
     *
     * @var integer|null
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
     * @param  integer $id
     * @param  array $query
     * @return void
     */
    public function __construct($productId = null, $id = null, array $query = [])
    {
        $this->productId = $productId;
        $this->id        = $id;

        if (! is_null($productId)) {
            $this->endpoint = "v3/catalog/products/" . $productId . "/variants";

            if (! is_null($id)) {
                $this->endpoint .= "/" . $id;
            }
        }

        $this->query = array_merge([
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

                dispatch(new ProductVariantRequest($this->productId, $this->id, $newQuery));
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
        if (! empty($item->option_values)) {
            collect($item->option_values)->map(function($option, $key) use ($item) {
                $this->createOrUpdateVariant($item, $option);
            });
        } else {
            $this->createOrUpdateVariant($item);
            
        }
    }

    /**
     * Create or update database entry.
     * [Helper]
     *
     * @param  Collection  $item
     * @param  Collection  $options
     * @return void
     */
    private function createOrUpdateVariant($item, $option = null)
    {
        ProductVariant::updateOrCreate([ 'id' => $item->id ],
            [
                'product_id'              => $item->product_id,
                'option_id'               => $option->option_id ?? null,
                'option_value_id'         => $option->id ?? null,
                'sku'                     => $item->sku,
                'weight'                  => $item->weight,
                'width'                   => $item->width,
                'height'                  => $item->height,
                'depth'                   => $item->depth,
                'price'                   => $item->price,
                'cost_price'              => $item->cost_price,
                'retail_price'            => $item->retail_price,
                'sale_price'              => $item->sale_price,
                'calculated_price'        => $item->calculated_price,
                'inventory_level'         => $item->inventory_level,
                'inventory_warning_level' => $item->inventory_warning_level,
            ]
        );
    }
}
