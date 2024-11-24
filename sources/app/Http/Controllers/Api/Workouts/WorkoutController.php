<?php

namespace App\Http\Controllers\Api\Workouts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\WorkoutResource;
use App\Http\Services\WorkoutService;
use Illuminate\Support\Facades\Cache;

class WorkoutController extends Controller
{
    private WorkoutService $_workoutService;
    public function __construct(WorkoutService $workoutService)
    {
        $this->_workoutService = $workoutService;
    }
    public function index()
    {
        return WorkoutResource::collection(Cache::get('workout'));
    }
    public function show(int $id)
    {
        return new WorkoutResource($this->_workoutService->show($id));
    }
}
