<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        $this->error('auth.failed');

        return back()->withInput();
    }


    function demoLogin()
    {
        $user = User::where('email', 'demo')->first();
        if ($user) {
            Auth::login($user);
            return redirect()->intended('/');
        }

        $this->error("all.no_demo_user");

        return back();
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
