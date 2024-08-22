<?php

use App\Http\Controllers\BillingHistoryController;
use App\Http\Controllers\Form\AbonementFormController;
use App\Http\Controllers\AbonementController;
use App\Http\Controllers\Form\GlampingFormController;
use App\Http\Controllers\Form\HallFormController;
use App\Http\Controllers\Form\RecordFormController;
use App\Http\Controllers\Form\Schedules\ScheduleFormController;
use App\Http\Controllers\Form\Schedules\ScheduleTimeFormController;
use App\Http\Controllers\Form\UserFormController;
use App\Http\Controllers\Form\WorkoutFormController;
use App\Http\Controllers\GlampingController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Schedules\ScheduleController;
use App\Http\Controllers\Schedules\ScheduleTimeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 Route::get('/', [HomeController::class, 'index'])
     ->name('home')
     ->middleware('auth');

Route::prefix('workout')->group(function () {
    Route::prefix('form')->group(function () {
        /* Маршруты для типов */
        Route::prefix('type')->group(function () {
            Route::post('/create', [WorkoutFormController::class, 'type_create'])
                ->name('workout.form.type_create')
                ->middleware('auth');
            Route::post('/delete', [WorkoutFormController::class, 'type_delete'])
                ->name('workout.form.type_delete')
                ->middleware('auth');
        });
        /* END */
        Route::post('/create', [WorkoutFormController::class, 'create'])
            ->name('workout.form.create')
            ->middleware('auth');
        Route::post('/update', [WorkoutFormController::class, 'update'])
            ->name('workout.form.update')
            ->middleware('auth');
        Route::post('/delete', [WorkoutFormController::class, 'delete'])
            ->name('workout.form.delete')
            ->middleware('auth');
    });

    Route::get('/', [WorkoutController::class,'index'])
        ->name('workout.index')
        ->middleware('auth');
    Route::get('/show/{id}', [WorkoutController::class,'show'])
        ->name('workout.show')
        ->middleware('auth');
});

Route::prefix('hall')->group(function () {
    Route::prefix('form')->group(function () {
        Route::post('/create', [HallFormController::class,'create'])
            ->name('hall.form.create')
            ->middleware('auth');
        Route::post('/update', [HallFormController::class,'update'])
            ->name('hall.form.update')
            ->middleware('auth');
        Route::post('/delete', [HallFormController::class,'delete'])
            ->name('hall.form.delete')
            ->middleware('auth');
    });

    Route::get('/', [HallController::class,'index'])
        ->name('hall.index')
        ->middleware('auth');
    Route::get('/{id}', [HallController::class,'show'])
        ->name('hall.show')
        ->middleware('auth');
});

Route::prefix('glamping')->group(function () {
    Route::prefix('form')->group(function () {
        Route::post('/create', [GlampingFormController::class,'create'])
            ->name('glamping.form.create')
            ->middleware('auth');
        Route::post('/update', [GlampingFormController::class,'update'])
            ->name('glamping.form.update')
            ->middleware('auth');
        Route::post('/delete', [GlampingFormController::class,'delete'])
            ->name('glamping.form.delete')
            ->middleware('auth');
    });

    Route::get('/', [GlampingController::class,'index'])
        ->name('glamping.index')
        ->middleware('auth');
    Route::get('/info/{id}', [GlampingController::class,'info'])
        ->name('glamping.info')
        ->middleware('auth');
});
Route::prefix('record')->group(function () {
    Route::post('/create', [RecordFormController::class, 'create'])
        ->name('record.form.create')
        ->middleware('auth');
});
Route::prefix('record')->group(function () {
    Route::get('/', [BillingHistoryController::class,'index'])
        ->name('record.index')
        ->middleware('auth');
});
Route::prefix('schedule')->group(function () {
    Route::prefix('form')->group(function () {
        Route::post('/create', [ScheduleFormController::class, 'create'])
            ->name('schedule.form.create')
            ->middleware('auth');
        Route::post('/update', [ScheduleFormController::class, 'update'])
            ->name('schedule.form.update')
            ->middleware('auth');
        Route::post('/delete', [ScheduleFormController::class, 'delete'])
            ->name('schedule.form.delete')
            ->middleware('auth');
    });
    Route::prefix('time')->group(function () {
        Route::prefix('form')->group(function () {
            Route::post('/create', [ScheduleTimeFormController::class, 'create'])
                ->name('schedule.time.form.create')
                ->middleware('auth');
            Route::post('/delete', [ScheduleTimeFormController::class, 'delete'])
                ->name('schedule.time.form.delete')
                ->middleware('auth');
        });
        Route::get('/', [ScheduleTimeController::class, 'index'])
            ->name('schedule.time')
            ->middleware('auth');
    });
    Route::get('/', [ScheduleController::class, 'index'])
        ->name('schedule.index')
        ->middleware('auth');
    Route::get('/create/{hall_id}', [ScheduleController::class, 'create'])
        ->name('schedule.create')
        ->middleware('auth');
    Route::get('/info/{hall_id}/{schedule_id}/{schedule_time_id}/{couch_id}/{workout_id}', [ScheduleController::class, 'info'])
        ->name('schedule.info')
        ->middleware('auth');
    Route::get('/update/{hall_id}/{schedule_id}', [ScheduleController::class, 'update'])
        ->name('schedule.update')
        ->middleware('auth');
    // Расписание для конкретного зала
    Route::get('/{hall_id}/{day?}/{month?}/{year?}', [ScheduleController::class, 'for_hall'])
        ->name('schedule.for_hall')
        ->middleware('auth');
});
Route::prefix('user')->group(function () {
    Route::prefix('form')->group(function () {
        Route::post('/registration', [UserFormController::class, 'registration'])
            ->name('user.form.registration')
            ->middleware('auth');
        Route::post('/update', [UserFormController::class, 'update'])
            ->name('user.form.update')
            ->middleware('auth');
        Route::post('/auth', [UserFormController::class, 'auth'])->name('user.form.auth');
        Route::post('/logout', [UserFormController::class, 'logout'])
            ->name('user.form.logout')
            ->middleware('auth');
        Route::post('/reset', [UserFormController::class, 'reset'])
            ->name('user.form.reset');
        // Filter
        Route::get('/filter', [UserFormController::class, 'filter'])
            ->name('user.form.filter')
            ->middleware('auth');
    });
    Route::get('/registration', [UserController::class, 'registration'])
        ->name('user.registration')
        ->middleware('auth');
    Route::get('/info/{id}', [UserController::class, 'info'])
        ->name('user.info')
        ->middleware('auth');
    Route::get('/login', [UserController::class, 'login'])->name('user.login');
    Route::get('/reset', [UserController::class, 'reset'])->name('user.reset');
    Route::get('/{filter?}', [UserController::class, 'index'])
        ->name('user.index')
        ->middleware('auth');
});

Route::prefix('abonement')->group(function () {
    Route::prefix('form')->group(function () {
        Route::post('/create', [AbonementFormController::class, 'create'])->name('abonement.form.create');
        Route::post('/update', [AbonementFormController::class, 'update'])->name('abonement.form.update');
        Route::get('/delete/{id}', [AbonementFormController::class, 'delete'])->name('abonement.form.delete');
    });
    Route::get('/', [AbonementController::class, 'index'])->name('abonement.index');
    Route::get('/show/{id}', [AbonementController::class, 'show'])->name('abonement.show');
});
