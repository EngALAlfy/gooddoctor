<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    function login(LoginRequest $request){
        $credentials = $request->validated();

        if (Auth::attempt($credentials , $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        $this->error('auth.failed');

        return back()->withInput();
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
