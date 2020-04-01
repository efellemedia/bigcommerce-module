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

class ProductModifierValueResource extends JsonResource
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
            'id'         => (int) $this->id,
            'label'      => $this->label,
            'is_default' => (bool) $this->is_default,
            'value_data' => $this->value_data,
            'adjusters'  => $this->adjusters,
            'sort_order' => (int) $this->sort_order,
        ];
    }
}
