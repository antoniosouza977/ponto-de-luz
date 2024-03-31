<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlavorStoreRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50|unique:flavors'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório',
            'name.max' => 'O nome deve ter no máximo :max caracteres',
            'name.unique' => 'Aroma já existe'
        ];
    }

}
