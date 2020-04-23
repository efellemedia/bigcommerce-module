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

use Fusion\Http\Resources\FieldsetResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
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
            'parent'   => true and ! in_array('parent', $exclusions),
            'children' => false or in_array('children', $inclusions),
        ];

        $resource = [
            'id'          => (int) $this->id,
            'name'        => $this->name,
            'description' => $this->description,
            'image_url'   => $this->image_url,
            'is_visible'  => (bool) $this->is_visible,
            
            // Relationships
            'parent'      => $this->when($relationships['parent'], $this->parent),
            'children'    => $this->when($relationships['children'], CategoryResource::collection($this->children)),
        ];

        // Fieldset
        if ($this->fieldset) {
            $resource['fieldset'] = new FieldsetResource($this->fieldset);

            foreach ($this->fields as $field) {
                $resource[$field->handle] = $this->extension->{$field->handle} ?? $field->default;
            }
        }

        return $resource;
    }
}
