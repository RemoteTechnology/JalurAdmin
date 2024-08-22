<?php

namespace App\Http\Controllers\Api\Workouts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\RecoilRequest;
use App\Http\Requests\Record\RecordCreateRequest;
use App\Http\Requests\Record\RecordUpdateRequest;
use App\Http\Resources\Hall\HallWorkoutRecordResource;
use App\Http\Services\BillingService;
use App\Http\Services\RecordService;
use App\Http\Services\WorkoutVisitionService;

class WorkoutRecordController extends Controller
{
    private RecordService $_recordService;
    private BillingService $_billingService;
    private WorkoutVisitionService $_workoutVisitionService;
    public function __construct(
        RecordService $recordService,
        BillingService $billingService,
        WorkoutVisitionService $workoutVisitionService
    )
    {
        $this->_recordService = $recordService;
        $this->_billingService = $billingService;
        $this->_workoutVisitionService = $workoutVisitionService;
    }
    public function index(int|null $user_id=null)
    {
        return HallWorkoutRecordResource::collection($this->_recordService->all($user_id));
    }
    public function show(int $id)
    {
        return new HallWorkoutRecordResource($this->_recordService->show($id));
    }
    public function create(RecordCreateRequest $request)
    {
        $request = $request->validated();
        return response()->json(
            new HallWorkoutRecordResource(
                $this->_workoutVisitionService->create(
                    $this->_billingService->create(
                        $this->_recordService->create($request)->contract,
                        $request
                    )->contract_id,
                    $request
                )
            )
        )->setStatusCode(201);
    }
    public function updateRemaining(RecordUpdateRequest $request)
    {
        $request = $request->validated();
        return new HallWorkoutRecordResource($this->_recordService->updateRemaining(
            $this->_recordService->show($request['id']),
            $request
        ));
    }
    public function recoil(RecoilRequest $request)
    {
        $context = $request->validated();
        $record = $this->_recordService->show($context['id']);
        return $this->_recordService
            ->recoil($context, $record, $this->_billingService->showByRecord($record->contract));
    }
}
