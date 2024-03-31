<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductUpdateRequest extends FormRequest
{

    public function authorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:50',
            'price' => 'required',
            'stock_quantity' => 'required',
            'status' => 'required',
            'categories_ids' => 'array',
            'flavors_ids' => 'array',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',
            'price.required' => 'Preço obrigatório.',
            'stock_quantity.required' => 'Estoque obrigatório.',
            'status.required' => 'Status obrigatório.',
            'categories_ids.array' => 'Categoria obrigatória.',
            'flavors_ids.array' => 'Aroma obrigatório.',
        ];
    }

}
