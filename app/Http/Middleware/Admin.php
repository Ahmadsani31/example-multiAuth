<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check()) {
            if (Auth::user()->level == "admin") {
                return $next($request);
            }elseif(Auth::user()->level == "user"){
                return redirect()->route('user.dashboard');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
