<?php

namespace Modules\Bigcommerce\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldsetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.namespace' => 'required',
            '*.fieldset'  => 'sometimes',
        ];
    }
}
