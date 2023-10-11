<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Auth\RegisterService;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller

{
    protected $service;

    public function __construct(RegisterService $registerService)
    {
        $this->service = $registerService;
    }
    public function showForm()
    {
        return inertia('Auth/Register');
    }

    public function registerNewUser(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            return back()->withErrors(['message' => 'Usuário já cadastrado.'],'user');
        }

        $validator = Validator::make(
            $request->all(),
            $this->service->getRules(),
            $this->service->getMessages()
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create($request->all());

        Auth::login($user);

        return to_route('home');
    }
}
