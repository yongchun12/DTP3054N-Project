<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        #Return to login.blade.php
        return view('login');
    }

    public function forget_password(Request $request)
    {
        #Return to forget_password.blade.php
        return view('forget_password');
    }

    public function login_post(Request $request)
    {
        #Validation
        if(Auth::attempt(['email' => $request -> email, 'password' => $request -> password], true)) {

            if(Auth::User()->is_role == '1'){
                return redirect()->intended('admin/dashboard');
            }else{
                return redirect('/')->with('error', 'No HR Available');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }

    }
}

?>
