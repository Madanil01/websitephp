<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
    return view('auth.login');
    }   

    public function authenticated(Request $request)
    {
        $credentials = $request->only('email', 'password');
         // $credentials = $request->validate([
            // 'email' => ['required', 'email'],
            // 'password' => ['required'],
        // ]);
    
        if (Auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/');
        }
    
        return back()->withErrors([
            'loginError' => 'Email atau password salah'
        ]);
    }
    public function logout()
    {
    Auth::logout();
    }

}
