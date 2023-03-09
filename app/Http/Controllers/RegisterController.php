<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:rfc',
            'username' => 'required|string|min:3',
            'password' => 'required|string|min:8'
        ]);

        $credentials = $request->only('email', 'username', 'password');

        try {
            User::create(['email' => $credentials['email'], 'name' => $credentials['username'], 'password' => Hash::make($credentials['password'])]);
            return redirect('/');
        } catch (QueryException $e) {
            return back()->withErrors([
                'email' => 'This email is already in use, please log in with it or try a different one',
            ])->onlyInput('email');
        }
    }
}
