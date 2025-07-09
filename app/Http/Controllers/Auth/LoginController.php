<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }
}
