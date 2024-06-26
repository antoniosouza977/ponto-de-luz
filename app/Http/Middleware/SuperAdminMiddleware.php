<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if ($request->user() && $request->user()->is_admin) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}
