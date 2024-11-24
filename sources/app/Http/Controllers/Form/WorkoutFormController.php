<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workout\Type\WorkoytTypeCreateRequest;
use App\Http\Requests\Workout\Type\WorkoytTypeDeleteRequest;
use App\Http\Requests\Workout\WorkoutCreateRequest;
use App\Http\Requests\Workout\WorkoutUpdateRequest;
use App\Http\Requests\Workout\WorkoutDeleteRequest;
use App\Http\Services\TypeWorkoutService;
use App\Http\Services\WorkoutService;
use Illuminate\Http\Request;
use \Illuminate\Http\UploadedFile;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Cache;

class WorkoutFormController extends Controller
{
    private TypeWorkoutService $_typeWorkoutService;
    private WorkoutService $_workoutService;
    public function __construct(TypeWorkoutService $typeWorkoutService, WorkoutService $workoutService)
    {
        $this->_typeWorkoutService = $typeWorkoutService;
        $this->_workoutService = $workoutService;
    }
    public function type_create(WorkoytTypeCreateRequest $request)
    {
        $workout_type = $request->validated();
        if ($this->_typeWorkoutService->create($workout_type)) {
            Cache::forget('workout_type');
            Cache::remember('workout_type', null, function () {
                return $this->_typeWorkoutService->all();
            });
        }

        return back()->with("success","Тип тренировки успешно добавлен!");
    }

    public function type_delete(WorkoytTypeDeleteRequest $request)
    {
        try {
            $workout_type = $request->validated();
            if ($this->_typeWorkoutService->delete($workout_type["id"])) {
                Cache::forget('workout_type');
                Cache::remember('workout_type', null, function () {
                    return $this->_typeWorkoutService->all();
                });
            }
            return back()->with("success", "Тип тренировки успешно удалён!");
        } catch(QueryException) {
            return back()->with("error", "Тип тренировки удалить не удалось, возможно есть присвоеные типы тренировкам!");
        }


    }
    public function create(Request $request_files, WorkoutCreateRequest $request)
    {
        $workout = $request->validated();
        try {
            if (empty($request_files['images'])) {
                return back()->with("error","Выберите файл!");
            }
            if ($this->_workoutService->create($workout, $request_files["images"] ? $request_files->file('images') : null)) {
                Cache::forget('workout');
                Cache::remember('workout', null, function () {
                    return $this->_workoutService->all();
                });
            }
        }
        catch (\TypeError)
        {
            return $request_files["image"] ? back()->with("error","Ошибка добавления данных!") : back()->with("error","Укажите изображение<br>Это поле обязательно!");
        }
        return back()->with("success","Данные добавлены успешно!");
    }
    public function update(Request $request_files, WorkoutUpdateRequest $request)
    {
        $workout = $request->validated();
        if ($this->_workoutService->update($workout, $request_files["image"] ? $request_files->file('image') : null))
        {
            Cache::forget('workout');
            Cache::remember('workout', null, function () {
                return $this->_workoutService->all();
            });
        }
        return back()->with("success","Данные успешно обновлены!");
    }
    public function delete(WorkoutDeleteRequest $request)
    {
        $workout = $request->validated();
        if ($this->_workoutService->delete($workout["id"])) {
            Cache::forget('workout');
            Cache::remember('workout', null, function () {
                return $this->_workoutService->all();
            });
        }
        return back()->with("success","Данные успешно удалены!");
    }
}
