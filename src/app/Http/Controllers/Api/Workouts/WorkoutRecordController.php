<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\RecordCreateRequest;
use App\Http\Requests\Record\RecordUpdateRequest;
use App\Http\Resources\Hall\HallWorkoutRecordResource;
use App\Http\Services\RecordService;

class HallWorkoutRecordController extends Controller
{
    private RecordService $_recordService;
    public function __construct(RecordService $recordService)
    {
        $this->_recordService = $recordService;
    }
    public function index(int|null $user_id)
    {
        return HallWorkoutRecordResource::collection($this->_recordService->all($user_id));
    }
    public function show(int|null $id)
    {
        return new HallWorkoutRecordResource($this->_recordService->show($id));
    }
    public function create(RecordCreateRequest $request)
    {
        $request = $request->validated();
        return new HallWorkoutRecordResource($this->_recordService->create($request));
    }
    public function update(RecordUpdateRequest $request)
    {
        $request = $request->validated();
        return new HallWorkoutRecordResource($this->_recordService->update(
            $this->_recordService->show($request['id']),
            $request
        ));
    }
}
