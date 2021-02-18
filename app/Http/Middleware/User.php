<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->level == "admin") {
            return redirect()->route('admin.dashboard');
        }
        if (Auth::user()->level == "user") {
            return $next($request);   
        }
        if (Auth::check()) {
            return redirect()->route('login');
        }
    }
}
