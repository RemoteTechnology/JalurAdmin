<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Schedule\ScheduleTimeResource;
use App\Http\Services\ScheduleTimeService;
use Illuminate\Http\Request;

class ScheduleTimeController extends Controller
{
    public ScheduleTimeService $_scheduleTimeService;
    public function __construct(ScheduleTimeService $scheduleTimeService)
    {
        $this->_scheduleTimeService = $scheduleTimeService;
    }
    public function index()
    {
        return response()->json(
            ScheduleTimeResource::collection(
                $this->_scheduleTimeService->all()
            )
        )->setStatusCode(200);
    }
    public function show(int $id)
    {
        return response()->json(
            new ScheduleTimeResource($this->_scheduleTimeService->show($id))
        )->setStatusCode(200);
    }
}
