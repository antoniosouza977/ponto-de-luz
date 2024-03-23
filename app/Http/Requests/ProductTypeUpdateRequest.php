<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductTypeUpdateRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do tipo de produto é obrigatório.',
            'name.max' => 'Informe um tipo com até 50 caracteres.'
        ];
    }

}
