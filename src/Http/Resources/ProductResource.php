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

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Relationship inclusions..
        $include    = $request->input('include');
        $inclusions = explode(",", $include);

        // Relationship exclusions..
        $exclude    = $request->input('exclude');
        $exclusions = explode(",", $exclude);

        $relationships = [
            'images'       => true and ! in_array('images', $exclusions),
            'videos'       => true and ! in_array('videos', $exclusions),
            'customfields' => true and ! in_array('customfields', $exclusions),
            'related'      => false or in_array('related', $inclusions),
            'variants'     => false or in_array('variants', $inclusions),
            'modifiers'    => false or in_array('modifiers', $inclusions),
            'options'      => false or in_array('options', $inclusions),
            'reviews'      => false or in_array('reviews', $inclusions),
            'rules'        => false or in_array('rules', $inclusions),
        ];

        return [
            'id'                      => (int) $this->id,
            'path'                    => $this->path(),

            'name'                    => $this->name,
            'description'             => $this->description,
            'sku'                     => $this->sku,
            'is_visible'              => (bool) $this->is_visible,
            'is_featured'             => (bool) $this->is_featured,
            'weight'                  => (int) $this->weight,
            'formatted_weight'        => $this->weight(),
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
            
            // Relationships
            'images'       => $this->when($relationships['images'], ProductImageResource::collection($this->images)),
            'videos'       => $this->when($relationships['videos'], ProductVideoResource::collection($this->videos)),
            'customfields' => $this->when($relationships['customfields'], ProductCustomFieldResource::collection($this->customfields)),
            'related'      => $this->when($relationships['related'], ProductResource::collection($this->related)),
            'variants'     => $this->when($relationships['variants'], ProductVariantResource::collection($this->variants)),
            'modifiers'    => $this->when($relationships['modifiers'], ProductModifierResource::collection($this->modifiers)),
            'options'      => $this->when($relationships['options'], ProductOptionResource::collection($this->options)),
            'reviews'      => $this->when($relationships['reviews'], ProductReviewResource::collection($this->reviews)),
            'rules'        => $this->when($relationships['rules'], ProductRuleResource::collection($this->rules)),
        ];
    }
}
