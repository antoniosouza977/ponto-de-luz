<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function athorize(): true
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email obrigatório.',
            'email.email' => 'Email inválido.',
            'password.required' => 'Senha obrigatória.',
            'password.min' => 'A senha deve ter no minimo :min digitos.'
        ];
    }

}
