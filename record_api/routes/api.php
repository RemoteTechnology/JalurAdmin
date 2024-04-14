<?php

use App\Http\Controllers\Api\RecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('record')->group(function () {
    Route::post('/create', [RecordController::class, 'create'])->name('api.workout.record.create');
    Route::get('/{id?}', [RecordController::class, 'index'])->name('api.workout.record.index');
    Route::get('/show/{id}', [RecordController::class, 'show'])->name('api.workout.record.show');
    Route::prefix('update')->group(function () {
        Route::put('/remaining', [RecordController::class, 'updateRemaining'])->name('api.workout.record.update.remaining');
    });
    Route::post('/recoil', [RecordController::class, 'recoil'])->name('api.workout.record.recoil');
});
