<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::check()) {
            if (Auth::user()->level == "admin") {
                return redirect()->route('admin.dashboard');
            }
            elseif (Auth::user()->level == "user") {
                return $next($request);
            }
        }else{
            return redirect()->route('login');
        }
    }
}
