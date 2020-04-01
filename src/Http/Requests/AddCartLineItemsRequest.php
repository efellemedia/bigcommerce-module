<?php

/*
 * This file is part of the FusionCMS application.
 *
 * (c) efelle creative <appdev@efelle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Modules\Bigcommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartLineItemsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'line_items'                                  => 'required|array',
            'line_items.*.quantity'                       => 'required_with:line_items|numeric',
            'line_items.*.product_id'                     => 'required_with:line_items|numeric',
            'line_items.*.variant_id'                     => 'numeric',
            'line_items.*.list_price'                     => 'numeric',
            'line_items.*.option_selections.option_id'    => 'numeric',
            'line_items.*.option_selections.option_value' => 'string',

            'gift_certificates'                   => 'array',
            'gift_certificates.*.name'            => 'required_with:gift_certificates|string',
            'gift_certificates.*.theme'           => 'required_with:gift_certificates|string|in:Birthday,Boy,Celebration,Christmas,General,Girl',
            'gift_certificates.*.amount'          => 'required_with:gift_certificates|numeric|min:1|max:1000',
            'gift_certificates.*.quantity'        => 'required_with:gift_certificates|numeric|min:1',
            'gift_certificates.*.sender'          => 'required_with:gift_certificates|array',
            'gift_certificates.*.sender.name'     => 'required_with:gift_certificates|string',
            'gift_certificates.*.sender.email'    => 'required_with:gift_certificates|email',
            'gift_certificates.*.recipient'       => 'required_with:gift_certificates|array',
            'gift_certificates.*.recipient.name'  => 'required_with:gift_certificates|string',
            'gift_certificates.*.recipient.email' => 'required_with:gift_certificates|email',
            'gift_certificates.*.message'         => 'required_with:gift_certificates|string|max:200',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
