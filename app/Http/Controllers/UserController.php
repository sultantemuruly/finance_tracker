<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserController
{
    public function signup(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required','string', 'max:255'],
            'second_name' => ['required','string', 'max:255'],
            'email'      => ['required','email','max:255','unique:users,email'],
            'password'   => ['required', Password::min(8)],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'second_name' => $validated['second_name'],
            'email'      => $validated['email'],
            'password'   => $validated['password'], // gets hashed by the cast
        ]);

         return redirect('/');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login_email'      => ['required','email','max:255','unique:users,email'],
            'login_password'   => ['required', Password::min(8), 'confirmed'],
        ]);

        if (auth()->attempt(['email' => $incomingData['login_email'], 'password' => $incomingData['login_password']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }
}
