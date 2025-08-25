<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class UserController
{
    public function signup(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'first_name')],
            'second_name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'second_name')],
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:30']
        ]);
        
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated); 
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'login_email' => ['required', 'email'],
            'login_password' => ['required']
        ]);

        if (auth()->attempt(['email' => $validated['login_email'], 'password' => $validated['login_password']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
