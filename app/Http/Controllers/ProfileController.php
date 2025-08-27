<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Models\Record;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showUsers(Request $request)
    {
        $users = User::all();
        return view('profiles.index', compact('users'));
    }

    public function showUserProfile(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $records = Record::where('user_id', $id)->latest('date')->paginate(10);

        return view('profiles.show', compact('user', 'records'));
    }
}
