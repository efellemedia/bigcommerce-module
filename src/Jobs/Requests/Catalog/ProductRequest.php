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

class ProductRequest implements ShouldQueue
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
     * Note: Only 10 allowed when including `options` or `modifiers`.
     * 
     * @var integer
     */
    private $limit = 10;

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
     * @param  array   $query
     * @return void
     */
    public function __construct($id = null, $query = [])
    {
        $this->id        = $id;
        $this->endpoint .= ! is_null($id) ? "/" . $id : "";

        $this->query = array_merge([
            'include' => 'images,videos,custom_fields,reviews,options,modifiers,variants',
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

                dispatch(new ProductRequest($this->id, $newQuery));
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
        Product::updateOrCreate([ 'id' => $item->id ],
            [
                'name'                    => $item->name,
                'slug'                    => str_slug($item->name),
                'description'             => $item->description,
                'sku'                     => $item->sku,
                'is_visible'              => (bool) $item->is_visible,
                'is_featured'             => (bool) $item->is_featured,
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
                'inventory_tracking'      => $item->inventory_tracking,
            ]
        );

        // Categories..
        Product::find($item->id)->categories()->sync($item->categories);

        // Images..
        collect($item->images)->each(function($data, $key) use ($item) {
            (new ProductImageRequest($item->id))->createOrUpdate($data);
        });

        // Videos..
        collect($item->videos)->each(function($data, $key) use ($item) {
            (new ProductVideoRequest($item->id))->createOrUpdate($data);
        });

        // Custom fields..
        collect($item->custom_fields)->each(function($data, $key) use ($item) {
            (new ProductCustomFieldRequest($item->id))->createOrUpdate($data);
        });

        // Reviews..
        collect($item->reviews)->each(function($data, $key) use ($item) {
            (new ProductReviewRequest($item->id))->createOrUpdate($data);
        });

        // Complex rules..
        // Note: This call is costly cause it's one API call per product.
        dispatch(new ProductRuleRequest($item->id));

        // --------------------------------------------------------------
        // Modifiers..
        // --------------------------------------------------------------
        // Note: This call is costly cause it's one API call per product.
        // dispatch(new ProductModifierRequest($item->id));

        collect($item->modifiers)->each(function($data, $key) use ($item) {
            (new ProductModifierRequest($item->id))->createOrUpdate($data);
        });

        // --------------------------------------------------------------
        // Options..
        // --------------------------------------------------------------
        // Note: This call is costly cause it's one API call per product.
        // dispatch(new ProductOptionRequest($item->id));

        collect($item->options)->each(function($data, $key) use ($item) {
            (new ProductOptionRequest($item->id))->createOrUpdate($data);
        });

        // --------------------------------------------------------------
        // Variants..
        // --------------------------------------------------------------
        // Note: This call is costly cause it's one API call per product.
        // dispatch(new ProductVariantRequest($item->id));

        collect($item->variants)->each(function($data, $key) use ($item) {
            (new ProductVariantRequest($item->id))->createOrUpdate($data);
        });
        // --------------------------------------------------------------
    }
}
