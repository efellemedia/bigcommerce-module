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

class ProductOptionResource extends JsonResource
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
            'id'           => (int) $this->id,
            'name'         => $this->name,
            'display_name' => $this->display_name,
            'type'         => $this->type,
            'sort_order'   => (int) $this->sort_order,
            'values'       => ProductOptionValueResource::collection($this->values),
        ];
    }
}
