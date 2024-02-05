<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\ScheduleResource;
use App\Http\Services\ScheduleService;
use Illuminate\Http\Request;

class HallScheduleController extends Controller
{
    private ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->_scheduleService = $scheduleService;
    }
    public function index()
    {
        return ScheduleResource::collection($this->_scheduleService->all());
    }
    public function show(int $id)
    {
        return ScheduleResource::collection($this->_scheduleService->show($id));
    }
}
