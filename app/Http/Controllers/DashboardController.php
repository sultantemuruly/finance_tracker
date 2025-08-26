<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController
{
    public function index(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route('home');
        }

        return view('dashboard');
    }
}
