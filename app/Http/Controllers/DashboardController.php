<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user();

    if (!$user) {
        \Log::info('USER NULL');
        return redirect('/login')->with('error', 'Silakan login dulu!');
    }

    \Log::info('USER OK', [$user]);

    if ($user->role === 'admin') {
        return view('dashboard', ['role' => 'admin']);
    } else {
        return redirect()->route('jimpitan.user');
    }
}


}
