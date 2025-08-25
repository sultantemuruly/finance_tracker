<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Validation\Rules\Password;

class UserController
{
    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required','string','max:255'],
            'second_name' => ['required','string','max:255'],
            'email'      => ['required','email','max:255','unique:users,email'],
            'password'   => ['required', Password::min(8), 'confirmed'],
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'second_name' => $validated['second_name'],
            'email'      => $validated['email'],
            'password'   => $validated['password'], // gets hashed by the cast
        ]);

         return redirect()->route('/')->with('status', 'Welcome, '.$user->first_name.'!');
    }
}
