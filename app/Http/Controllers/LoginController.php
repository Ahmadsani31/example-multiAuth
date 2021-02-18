<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Session;

class LoginController extends Controller
{
    public function loginShow()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            // if (Auth::user()->level == 'admin') {
            //     return redirect()->route('admin.dashboard');
            // }elseif (Auth::user()->level == 'user') {
            //     return redirect()->route('user.dashboard');
            // }else {
            //     return redirect()->route('login');
            // }

            switch (Auth::user()->level) {
                case 'admin':
                    $this->redirectTo = view('/admin/dashboard');
                    return $this->redirectTo;
                    break;
                case 'user':
                    $this->redirectTo = view('/user/dashboard');
                    return $this->redirectTo;
                    break;
                default:
                $this->redirectTo = view('/login');
                return $this->redirectTo;
                    break;
            }
           
        }

        return view('login');
    }
    

    public function loginStore(Request $request)
    {
        $rules = [
            'username'                 => 'required',
            'password'              => 'required|string'
        ];
 
        $messages = [
            'username.required'        => 'Username wajib diisi',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
 
        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if (Auth::user()->level == "admin") {
                return redirect()->route('admin.dashboard')->with('success','Login Berhasil');;
            }elseif (Auth::user()->level == "user") {
                return redirect()->route('user.dashboard');
            }else {
                return redirect()->route('login');
            }
        }
    //     if(auth()->attempt(array('username' => $data['username'], 'password' => $data['password'])))
    //         {


    // //     if ($guard == 'admin') {
    // //         if (Auth::guard($guard)->check()) {
    // //                return redirect('/admin/index');
    // //         }
    // //    }else if($guard == 'siswa') {
    // //         if (Auth::guard($guard)->check()) {
    // //                return redirect('/siswa/index');
    // //         }
    // //    }else{
    // //        if (Auth::guard($guard)->check()) {
    // //     return redirect('/loginShow');
    // //         }

    //         //     if (auth()->user()->level == 'admin') {
    //         //         return redirect()->route('admin.dashboard');
    //         //     }else if (auth()->user()->level == 2){
    //         //         return redirect()->route('siswa.index');
    //         //     }
    //         // }else{
    //         //     return redirect()->route('login')
    //         //         ->with('error','Email-Address And Password Are Wrong.');
    //         // }
            
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
