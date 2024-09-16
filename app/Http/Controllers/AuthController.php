<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        // Redirect to home if already logged in
        if (Auth::check()) {
            // dd(Auth::user());
            return redirect('/admin/home');
        }

        return view('auth.login ');
    }

    /**
     * Handle the authentication attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated(Request $request)
    {
        // Validate the input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate();

            // Redirect to the intended page or the home page
            return redirect()->intended('/admin/home');
        }

        // If authentication fails, return back with error
        return back()->withErrors([
            'loginError' => 'Email atau password salah',
        ]);
    }

    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to login page after logout
        return redirect('/login');
    }

    public function register()
    {
        if (Auth::check()) {
            return redirect('/admin/home');
        }

        return view('auth.register');
    }

    // Handle the registration process
    public function storeRegistration(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // Default role is 'user'
        ]);

        // Automatically log the user in after registration
        Auth::login($user);

        // Redirect to the intended page or home
        return redirect()->intended('/admin');
    }
}
// class AuthController extends Controller
// {
//     public function login()
//     {
//     return view('auth.login');
//     }   

//     public function authenticated(Request $request)
//     {
//         $credentials = $request->only('email', 'password');
//          // $credentials = $request->validate([
//             // 'email' => ['required', 'email'],
//             // 'password' => ['required'],
//         // ]);
        
//         if (Auth()->attempt($credentials)) {
//             $request->session()->regenerate();
//             return redirect('/');
//         }
    
//         return back()->withErrors([
//             'loginError' => 'Email atau password salah'
//         ]);
//     }
//     public function logout()
//     {
//     Auth::logout();
    
//     }

// }
