<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;

Route::middleware('auth')->group(function () {
    Route::post('/record', [RecordController::class, 'store'])->name('records.store');
    Route::delete('/delete/{record_id}', [RecordController::class, 'delete'])->name('records.delete');
    Route::get('/edit/{record_id}', [RecordController::class, 'showEditScreen'])->name('records.edit');
    Route::put('/edit/{record_id}', [RecordController::class, 'update'])->name('records.update');
    Route::post('/record/filter_by_type', [RecordController::class, 'filterByType'])->name('records.filter_by_type');
});
