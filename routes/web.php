<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::post('/sign-up', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
