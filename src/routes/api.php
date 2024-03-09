<?php

use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\Users\UserController;
use App\Http\Controllers\Api\Users\UserTargetController;
use App\Http\Controllers\Api\Workouts\WorkoutController;
use App\Http\Controllers\Api\Workouts\WorkoutRecordController;
use App\Http\Controllers\Api\Workouts\WorkoutTypeController;
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
    Route::post('auth', [UserController::class, 'auth'])->name('api.user.auth');
    Route::prefix('code')->group(function () {
        Route::get('{phone}', [UserController::class, 'send_code'])->name('api.user.send_code');
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('target')->group(function () {
            Route::post('/create', [UserTargetController::class, 'create'])->name('api.user.target.create');
            Route::get('/show/{user_id}', [UserTargetController::class, 'show'])->name('api.user.target.show');
            Route::put('/update', [UserTargetController::class, 'update'])->name('api.user.target.update');
        });

        Route::get('logout/{id}', [UserController::class, 'logout'])->name('api.user.logout');
        Route::put('update', [UserController::class, 'update'])->name('api.user.update');
        Route::get('show/{id}', [UserController::class, 'show'])->name('api.user.show');
        Route::get('show/role/{role}', [UserController::class, 'findByRole'])->name('api.user.show.by.role');
    });
});
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('hall')->group(function () {
        Route::get('/', [HallController::class, 'index'])->name('api.hall.index');
        Route::get('/show/{id}', [HallController::class, 'show'])->name('api.hall.show');
    });

    Route::prefix('schedule')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('api.hall.schedule.index');
        Route::get('/show/{id}', [ScheduleController::class, 'show'])->name('api.hall.schedule.show');
    });

    Route::prefix('workout')->group(function () {
        Route::prefix('type')->group(function () {
            Route::get('/', [WorkoutTypeController::class, 'index'])->name('api.hall.workout.type.index');
            Route::get('/show/{id}', [WorkoutTypeController::class, 'show'])->name('api.hall.workout.type.show');
        });
        Route::get('/', [WorkoutController::class, 'index'])->name('api.hall.workout.index');
        Route::get('/show/{id}', [WorkoutController::class, 'show'])->name('api.hall.workout.show');
    });

    Route::prefix('record')->group(function () {
        Route::post('/create', [WorkoutRecordController::class, 'create'])->name('api.hall.workout.record.create');
        Route::get('/{id?}', [WorkoutRecordController::class, 'index'])->name('api.hall.workout.record.index');
        Route::get('/show/{id}', [WorkoutRecordController::class, 'show'])->name('api.hall.workout.record.show');
        Route::prefix('update')->group(function () {
            Route::put('/remaining', [WorkoutRecordController::class, 'updateRemaining'])->name('api.hall.workout.record.update.remaining');
        });
    });
});
