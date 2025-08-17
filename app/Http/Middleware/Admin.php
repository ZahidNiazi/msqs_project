<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;


class Admin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next, $guard = null)
{
    if (\Auth::guard($guard)->check()) {
        if(\Auth::user()->level == 'Admin')
        {
            return $next($request);
        }
        return redirect()->route('home');
    } else {
        return redirect()->route('login');
    }
}
}
