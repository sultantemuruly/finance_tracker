<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/sign-up', [UserController::class, 'signup']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/record',   [RecordController::class, 'store'])->name('records.store');
    Route::delete('/delete/{record_id}',   [RecordController::class, 'delete'])->name('records.delete');
    Route::put('/edit/{record_id}',   [RecordController::class, 'edit'])->name('records.edit');
    Route::get('/edit/{record_id}', [RecordController::class, 'showEditScreen'])->name('posts.edit');
    Route::put('/edit/{record_id}', [RecordController::class, 'update'])->name('posts.update');
});
