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

class ProductRuleResource extends JsonResource
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
            'id'                          => (int) $this->id,
            'image_url'                   => $this->image_url,
            'enabled'                     => (bool) $this->required,
            'stop'                        => (bool) $this->required,
            'purchasing_disabled'         => (bool) $this->purchasing_disabled,
            'purchasing_hidden'           => (bool) $this->purchasing_hidden,
            'purchasing_disabled_message' => $this->purchasing_disabled_message,
            'price_adjuster'              => $this->price_adjuster,
            'weight_adjuster'             => $this->weight_adjuster,
            'conditions'                  => $this->conditions,
            'sort_order'                  => (int) $this->sort_order,
        ];
    }
}
