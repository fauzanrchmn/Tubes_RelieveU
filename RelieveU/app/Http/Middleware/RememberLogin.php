<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class RememberLogin
{
    public function handle($request, Closure $next)
    {
        // Check if user is not logged in and a remember cookie exists
        if (!Auth::check() && $cookie = Cookie::get('remember_user')) {
            // Attempt to log the user in using the cookie value
            Auth::loginUsingId(decrypt($cookie));
        }

        return $next($request);
    }
}
