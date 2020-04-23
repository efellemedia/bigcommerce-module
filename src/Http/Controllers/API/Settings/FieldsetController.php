<?php

namespace Modules\Bigcommerce\Http\Controllers\API\Settings;

use Fusion\Models\Setting;
use Fusion\Http\Controllers\Controller;
use Modules\Bigcommerce\Http\Requests\FieldsetRequest;

class FieldsetController extends Controller
{
	/**
     * Update fieldset settings.
     *
     * @param  FieldsetRequest $request
     * @return void
     */
    public function update(FieldsetRequest $request)
    {
        $attributes = $request->validated();

        Setting::where('handle','bigcommerce_fieldsets')
            ->update([ 'value' => $attributes]);

        collect($attributes)->each(function ($item) {
            $model     = resolve($item['namespace']);
            $extension = $model->getExtension();


            if ($item['fieldset']) {
                resolve($item['namespace'])->attachFieldset($item['fieldset']);
            } else {
                resolve($item['namespace'])->detachFieldset();
            }
        });
    }
}