<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login(): View
    {    
        return view('user.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',//admin@gmail.com
            'password' => 'required',//password admin123123
            
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('user/dashboard');
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
   
}
