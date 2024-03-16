<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class AuthController extends Controller
{
    public function showLoginForm(): Response
    {
        return inertia()->render('Auth/Login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {

        if (Auth::attempt($request->only(['email', 'password'], $request['remember']))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back();
    }

    public function logout(Request $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}
