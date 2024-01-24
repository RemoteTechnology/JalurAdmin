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
        $this->_typeWorkoutService->create($workout_type);
        return back()->with("success","Тип тренировки успешно добавлен!");
    }

    public function type_delete(WorkoytTypeDeleteRequest $request)
    {
        $workout_type = $request->validated();
        $this->_typeWorkoutService->delete($workout_type["id"]);
        return back()->with("success","Тип тренировки успешно удалён!");
    }
    public function create(Request $request_files, WorkoutCreateRequest $request)
    {
        $workout = $request->validated();
        $this->_workoutService->create($workout, $request_files->file('images'));
        return back()->with("success","Данные добавлены успешно!");
    }
    public function update(WorkoutUpdateRequest $request, Request $request_files)
    {
        $workout = $request->validated();
        $this->_workoutService->update($workout, $request_files->file('images'));
        return back()->with("success","Данные успешно обновлены!");
    }
    public function delete(WorkoutDeleteRequest $request)
    {
        $workout = $request->validated();
        $this->_workoutService->delete($workout["id"]);
        return back()->with("success","Данные успешно удалены!");
    }
}
