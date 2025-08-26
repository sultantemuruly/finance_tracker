<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $records = $request->user()
            ->records()              
            ->latest('date')
            ->paginate(10);         

        return view('dashboard', compact('records'));
    }
}