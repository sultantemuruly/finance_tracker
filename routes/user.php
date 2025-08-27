<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/sign-up', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/user/upload_image/{user_id}', [UserController::class, 'uploadImage'])->name('user.upload_image');
