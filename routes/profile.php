<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'showUsers'])->name('show_users');
    Route::get('/profile/{user_id}', [ProfileController::class, 'showUserProfile'])->name('show_user_profile');
});
