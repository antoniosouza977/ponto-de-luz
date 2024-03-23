<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:product_categories|max:50',
            'product_type_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório.',
            'name.unique' => 'A categoria já existe.',
            'name.max' => 'Informe uma categoria com até 50 caracteres.',
            'product_type_id.required' => 'O tipo é obrigatório.',
        ];
    }
}
