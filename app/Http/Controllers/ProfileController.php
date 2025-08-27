<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUsers(Request $request)
    {
        $users = User::all();
        return view('profile', compact('users'));
    }
}
