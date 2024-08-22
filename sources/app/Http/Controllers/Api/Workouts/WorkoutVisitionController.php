<?php

namespace App\Http\Controllers\Api\Workouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Workout\Visitions\WorcoutVisitionsCreateRequest;
use App\Http\Requests\Workout\Visitions\WorcoutVisitionsShowRequest;
use App\Http\Requests\Workout\Visitions\WorcoutVisitionsUpdateRequest;
use App\Http\Resources\Workouts\WorkoutVisitionsResource;
use App\Http\Services\WorkoutVisitionService;
use Illuminate\Http\Request;

class WorkoutVisitionController extends Controller
{
    private WorkoutVisitionService $workoutVisitionService;
    public function __construct(WorkoutVisitionService $workoutVisitionService)
    {
        $this->workoutVisitionService = $workoutVisitionService;
    }
    public function create(WorcoutVisitionsCreateRequest $request)
    {
        return new WorkoutVisitionsResource(
            $this->workoutVisitionService->create($request->validated())
        );
    }
    public function show(WorcoutVisitionsShowRequest $request)
    {
        $context = $request->validated();
        return new WorkoutVisitionsResource(
            $this->workoutVisitionService->show($context['id'])
        );
    }
    public function all()
    {
        return WorkoutVisitionsResource::collection(
            $this->workoutVisitionService->all()
        );
    }
    public function update(WorcoutVisitionsUpdateRequest $request)
    {
        $context = $request->validated();
        return new WorkoutVisitionsResource(
            $this->workoutVisitionService->update(
                $this->workoutVisitionService->show($context['id']),
                $context
            )
        );
    }
    public function delete(WorcoutVisitionsShowRequest $request)
    {
        $context = $request->validated();
        return response()->json(
            $this->workoutVisitionService->delete(
                $this->workoutVisitionService->show($context['id']),
            )
        )->setStatusCode(200);
    }
}
