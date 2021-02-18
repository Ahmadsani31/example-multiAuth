<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
            return $next($request);
        }
        if (Auth::user()->level == "user") {
            return redirect()->route('user.dashboard');
        }
        if (Auth::check()) {
            return redirect()->route('login');
        }

    }
}
