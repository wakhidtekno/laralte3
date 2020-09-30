<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember') ? true : false;

        if (!Auth::attempt(['email' => $validateData['email'], 'password' => $validateData['password']], $remember)) {
            return redirect()->back()->with('pesan', 'Email atau password tidak sesuai');
        }

        return redirect()->route('dashboard');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
