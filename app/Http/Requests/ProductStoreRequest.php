<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductStoreRequest extends FormRequest
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
            'categories_ids' => 'required'
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
            'categories_ids.required' => 'Categoria obrigatória.',
        ];
    }

    public function passedValidation(): void
    {
        $price = Str::replace('.','', $this->input('price'));
        $price = ['price' => (float) Str::replace(',','.', $this->input('price'))];
        $this->replace(array_merge($this->except('price'), $price));
    }

}
