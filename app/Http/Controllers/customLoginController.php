<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\userLoket;
use Illuminate\Support\Facades\Auth;

class customLoginController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){

        if (Auth::guard('users')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->intended('/admin');
        }elseif (Auth::guard('userLoket')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect()->intended('/userLoket');
        }



    }

    public function logouts(){

     
        if (Auth::guard('users')->check()) {
            Auth::guard('users')->logout();
        } elseif(Auth::guard('userLoket')->check()) {
            Auth::guard('userLoket')->logout();
        }

        return redirect('/');
        
    }

}
