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

class ProductReviewResource extends JsonResource
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
            'id'            => (int) $this->id,
            'name'          => $this->name,
            'title'         => $this->title,
            'text'          => $this->text,
            'status'        => $this->status,
            'rating'        => (int) $this->rating,
            'date_created'  => $this->date_created,
            'date_modified' => $this->date_modified,
            'date_reviewed' => $this->date_reviewed,
        ];
    }
}
