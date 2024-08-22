<?php

use App\Http\Controllers\Api\AbonementController;
use App\Http\Controllers\Api\HallController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\ScheduleTimeController;
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

Route::get('/', function () {
    return "Welcome in API!";
});

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
        Route::get('/', [ScheduleController::class, 'index'])->name('api.schedule.index');
        Route::get('/show/{id}', [ScheduleController::class, 'show'])->name('api.schedule.show');
        Route::prefix('time')->group(function () {
            Route::get('/', [ScheduleTimeController::class, 'index'])->name('api.schedule.time.index');
            Route::get('/show/{id}', [ScheduleTimeController::class, 'show'])->name('api.schedule.time.show');
        });
    });

    Route::prefix('workout')->group(function () {
        Route::prefix('type')->group(function () {
            Route::get('/', [WorkoutTypeController::class, 'index'])->name('api.workout.type.index');
            Route::get('/show/{id}', [WorkoutTypeController::class, 'show'])->name('api.workout.type.show');
        });
        Route::get('/', [WorkoutController::class, 'index'])->name('api.workout.index');
        Route::get('/show/{id}', [WorkoutController::class, 'show'])->name('api.workout.show');
    });
    // TODO: эту залупу вынести в отдельный сервис
    Route::prefix('record')->group(function () {
        Route::post('/create', [WorkoutRecordController::class, 'create'])->name('api.workout.record.create');
        Route::get('/{id?}', [WorkoutRecordController::class, 'index'])->name('api.workout.record.index');
        Route::get('/show/{id}', [WorkoutRecordController::class, 'show'])->name('api.workout.record.show');
        Route::prefix('update')->group(function () {
            Route::put('/remaining', [WorkoutRecordController::class, 'updateRemaining'])->name('api.workout.record.update.remaining');
        });
        Route::post('/recoil', [WorkoutRecordController::class, 'recoil'])->name('api.workout.record.recoil');
    });
    //
    Route::prefix('abonement')->group(function () {
        Route::get('/', [AbonementController::class, 'all'])->name('api.abonement.index');
        Route::get('/show/{id}', [AbonementController::class, 'show'])->name('api.abonement.show');
    });
});

/*
[{"id": "22e12f66-000f-5000-8000-18db351245c7", "paid": true, "test": false, "amount": {"value": "1000.00", "currency": "RUB"}, "status": "waiting_for_capture", "metadata": {}, "recipient": {"account_id": "100500", "gateway_id": "100700"}, "created_at": "2018-07-18T10:51:18.139Z", "expires_at": "2018-07-25T10:52:00.233Z", "refundable": false, "description": "Заказ №1", "income_amount": {"value": "1.97", "currency": "RUB"}, "payment_method": {"id": "22e12f66-000f-5000-8000-18db351245c7", "card": {"last4": "4444", "first6": "555555", "card_type": "MasterCard", "expiry_year": "2022", "issuer_name": "Sberbank", "expiry_month": "07", "issuer_country": "RU"}, "type": "bank_card", "saved": false, "title": "Bank card *4444"}, "authorization_details": {"rrn": "10000000000", "auth_code": "000000", "three_d_secure": {"applied": true}}}]
*/