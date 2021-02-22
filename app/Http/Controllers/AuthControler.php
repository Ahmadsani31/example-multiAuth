<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{
    public function wellcome()
    {
        if (Auth::check()) {
            if (Auth::user()->level == "admin") {
                return redirect()->route('user.dashboard');
            }elseif(Auth::user()->level == "user"){
                return redirect()->route('user.dashboard');
            }
        }else{
            return redirect()->route('login');
        }
        return view('login');
    }
}
