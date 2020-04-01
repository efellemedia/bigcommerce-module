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

class UpdateCartLineItemRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'line_item'                                => 'required|array',
            'line_item.quantity'                       => 'required_with:line_item|numeric',
            'line_item.product_id'                     => 'required_with:line_item|numeric',
            'line_item.variant_id'                     => 'numeric',
            'line_item.list_price'                     => 'numeric',
            'line_item.option_selections.option_id'    => 'numeric',
            'line_item.option_selections.option_value' => 'string',

            'gift_certificate'                 => 'array',
            'gift_certificate.name'            => 'required_with:gift_certificate|string',
            'gift_certificate.theme'           => 'required_with:gift_certificate|string|in:Birthday,Boy,Celebration,Christmas,General,Girl',
            'gift_certificate.amount'          => 'required_with:gift_certificate|numeric|min:1|max:1000',
            'gift_certificate.quantity'        => 'required_with:gift_certificate|numeric|min:1',
            'gift_certificate.sender'          => 'required_with:gift_certificate|array',
            'gift_certificate.sender.name'     => 'required_with:gift_certificate|string',
            'gift_certificate.sender.email'    => 'required_with:gift_certificate|email',
            'gift_certificate.recipient'       => 'required_with:gift_certificate|array',
            'gift_certificate.recipient.name'  => 'required_with:gift_certificate|string',
            'gift_certificate.recipient.email' => 'required_with:gift_certificate|email',
            'gift_certificate.message'         => 'required_with:gift_certificate|string|max:200',
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
