<?php

use App\Http\Controllers\Api\HallWorkoutRecordController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\HallScheduleController;
use App\Http\Controllers\Api\HallWorkoutController;
use App\Http\Controllers\Api\HallWorkoutTypeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserTargetController;
use App\Http\Controllers\Api\BillingController;
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


Route::prefix('user')->group(function () {
    Route::post('create', [UserController::class, 'create'])->name('api.user.create');
    Route::prefix('code')->group(function () {
        Route::get('{phone}', [UserController::class, 'send_code'])->name('api.user.send_code');
    });
    Route::prefix('target')->group(function () {
        Route::post('/create', [UserTargetController::class, 'create'])->name('api.user.target.create');
        Route::get('/show/{user_id}', [UserTargetController::class, 'show'])->name('api.user.target.show');
        Route::post('/update', [UserTargetController::class, 'update'])->name('api.user.target.update');
    });
    Route::post('auth', [UserController::class, 'auth'])->name('api.user.auth');
    Route::get('logout/{id}', [UserController::class, 'logout'])->name('api.user.logout');
    Route::put('update', [UserController::class, 'update'])->name('api.user.update');
    Route::get('show/{id}', [UserController::class, 'show'])->name('api.user.show');
    Route::get('show/role/{role}', [UserController::class, 'findByRole'])->name('api.user.show.by.role');
});

Route::prefix('hall')->group(function () {
    Route::get('/', [HallController::class, 'index'])->name('api.hall.index');
    Route::get('/show/{id}', [HallController::class, 'show'])->name('api.hall.show');
    Route::prefix('schedule')->group(function () {
        Route::get('/', [HallScheduleController::class, 'index'])->name('api.hall.schedule.index');
        Route::get('/show/{id}', [HallScheduleController::class, 'show'])->name('api.hall.schedule.show');
    });
    Route::prefix('workout')->group(function () {
        Route::get('/', [HallWorkoutController::class, 'index'])->name('api.hall.workout.index');
        Route::get('/show/{id}', [HallWorkoutController::class, 'show'])->name('api.hall.workout.show');
        Route::prefix('record')->group(function () {
            Route::post('/create', [HallWorkoutRecordController::class, 'create'])->name('api.hall.workout.record.create');
            Route::get('/', [HallWorkoutRecordController::class, 'index'])->name('api.hall.workout.record.index');
            Route::get('/show/{id}', [HallWorkoutRecordController::class, 'show'])->name('api.hall.workout.record.show');
            Route::post('/update', [HallWorkoutRecordController::class, 'update'])->name('api.hall.workout.record.update');
        });
        Route::prefix('type')->group(function () {
            Route::get('/', [HallWorkoutTypeController::class, 'index'])->name('api.hall.workout.type.index');
            Route::get('/show/{id}', [HallWorkoutTypeController::class, 'show'])->name('api.hall.workout.type.show');
        });
    });
});
