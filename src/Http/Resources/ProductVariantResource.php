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

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                      => (int) $this->id,
            'sku'                     => $this->sku,
            'is_visible'              => (bool) $this->is_visible,
            'is_featured'             => (bool) $this->is_featured,
            'weight'                  => (int) $this->weight,
            'width'                   => (int) $this->width,
            'height'                  => (int) $this->height,
            'depth'                   => (int) $this->depth,
            'price'                   => (double) $this->price,
            'cost_price'              => (double) $this->cost_price,
            'retail_price'            => (double) $this->retail_price,
            'sale_price'              => (double) $this->sale_price,
            'calculated_price'        => (double) $this->calculated_price,
            'inventory_level'         => (int) $this->inventory_level,
            'inventory_warning_level' => (int) $this->inventory_warning_level,
            'inventory_tracking'      => $this->inventory_tracking,
        ];
    }
}
