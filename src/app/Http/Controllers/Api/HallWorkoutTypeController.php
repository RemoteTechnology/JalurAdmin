<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\WorkoutTypeResource;
use App\Http\Services\TypeWorkoutService;
use Illuminate\Http\Request;

class HallWorkoutTypeController extends Controller
{
    private TypeWorkoutService $_typeWorkoutService;
    public function __construct(TypeWorkoutService $typeWorkoutService)
    {
        $this->_typeWorkoutService = $typeWorkoutService;
    }
    public function index()
    {
        return WorkoutTypeResource::collection($this->_typeWorkoutService->all());
    }
    public function show($id)
    {
        return new WorkoutTypeResource($this->_typeWorkoutService->show($id));
    }
}
