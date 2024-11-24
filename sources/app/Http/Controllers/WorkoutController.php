<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\TypeWorkoutService;
use App\Http\Services\WorkoutService;
use Illuminate\Support\Facades\Cache;

class WorkoutController extends Controller
{
    protected TypeWorkoutService $_typeWorkoutService;
    protected WorkoutService $_workoutService;
    public function __construct(TypeWorkoutService $typeWorkoutService, WorkoutService $workoutService)
    {
        $this->_typeWorkoutService = $typeWorkoutService;
        $this->_workoutService = $workoutService;
    }
    public function index()
    {
        return view("workouts.index", [
            "title"         => "Тренировки",
            'type_workouts' => Cache::get('workout_type'),
            "workouts"      => Cache::get('workout'),
        ]);
    }
    public  function show(int $id)
    {
        return view('workouts.show', [
           'title'         => 'Тренировки',
           'workout' => $this->_workoutService->show($id),
           'type_workouts' => Cache::get('workout_type')
        ]);
    }
}
