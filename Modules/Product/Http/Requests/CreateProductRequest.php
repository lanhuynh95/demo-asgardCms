<?php

namespace Modules\Product\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateProductRequest extends BaseFormRequest
{
    public function rules()
    {
        $rule = [
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required',
        ];
        return $rule;
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
