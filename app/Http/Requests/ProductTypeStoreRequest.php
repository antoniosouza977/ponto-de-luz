<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:product_types|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do tipo de produto é obrigatório.',
            'name.unique' => 'O tipo já existe.',
            'name.max' => 'Informe um tipo com até 50 caracteres.'
        ];
    }

}
