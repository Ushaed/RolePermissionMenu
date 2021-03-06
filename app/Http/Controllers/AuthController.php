<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->except('_token');
        if (auth()->attempt($credentials)){
            return redirect()->route('dashboard');
        }
        return redirect()->back();

    }
    public function dashboard(){
        return view('Auth.dashboard');
    }

    public function home()
    {
        return view('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
