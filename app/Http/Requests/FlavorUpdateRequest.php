<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlavorUpdateRequest extends FormRequest
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
            'name.required' => 'Nome obrigatório',
            'name.max' => 'O nome deve ter no máximo :max caracteres'
        ];
    }

}
