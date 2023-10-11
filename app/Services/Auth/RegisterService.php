<?php

namespace App\Services\Auth;

class RegisterService
{
    public function getRules() : array
    {
        return [
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required|min:8'
            ];
    }

    public function getMessages() : array
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'email.required' => 'Email é obrigatório.',
            'password.required' => 'Senha é obrigatória.',
            'password.min' => 'Senha precisa ter 8 dígitos.'
        ];
    }
}
