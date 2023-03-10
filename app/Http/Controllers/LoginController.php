<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->intended('welcome');
        }

        return back()->withErrors([
            'email' => 'An error accured during login attempt, please try again.',
        ])->onlyInput('email');
    }
}
