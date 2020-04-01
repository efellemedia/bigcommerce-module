<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Resources;

use Modules\Bigcommerce\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $items = collect($this->resource->get('line_items')->physical_items);
    
        $items->map(function($item) {
            $item->product = (new ProductResource(Product::find($item->product_id)));

            return $item;
        });

        $this->resource->get('line_items')->physical_items = $items;

        return $this->resource->toArray();
    }
}
