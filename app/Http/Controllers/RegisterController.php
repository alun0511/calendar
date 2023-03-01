<?php

namespace App\Http\Controllers;
use App\Models\User;
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

        $credentials = $request->only('email','username', 'password');

        User::create(['email' => $credentials['email'], 'name' => $credentials['username'], 'password' => Hash::make($credentials['password'])]);
        return redirect('/');
    }
}
