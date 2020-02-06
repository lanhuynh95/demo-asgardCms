<?php

namespace Modules\Product\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateProductRequest extends BaseFormRequest
{
    public function rules()
    {
        $request = request();
        $rule = [
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
        ];
        if(isset($request->image)) {
            $rule['image'] = 'image';
        }
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
