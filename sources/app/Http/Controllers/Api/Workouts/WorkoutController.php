<?php

namespace App\Http\Controllers\Api\Workouts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\WorkoutResource;
use App\Http\Services\WorkoutService;

class WorkoutController extends Controller
{
    private WorkoutService $_workoutService;
    public function __construct(WorkoutService $workoutService)
    {
        $this->_workoutService = $workoutService;
    }
    public function index()
    {
        return WorkoutResource::collection($this->_workoutService->all());
    }
    public function show(int $id)
    {
        return new WorkoutResource($this->_workoutService->show($id));
    }
}
