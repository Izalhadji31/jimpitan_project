<?php


namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
        'username' => 'required|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = User::create([
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'role' => 'user',
    ]);

        return redirect('/login')->with('success', 'Registrasi berhasil');
    }
}
