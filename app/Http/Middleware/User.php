<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class User
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
        if(\Auth::user()->level == 'User')
        {
            return $next($request);
        }
        return redirect()->route('dashboard');
    } else {
        $url = $request->url();
        $request->session()->put('url.intended',$url);
        return redirect()->route('login');
    }
}
}
