<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Hall\ScheduleResource;
use App\Http\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ScheduleController extends Controller
{
    private ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->_scheduleService = $scheduleService;
    }
    public function index()
    {
        return ScheduleResource::collection(Cache::get('schedule'));
    }
    public function show(int $id)
    {
        return new ScheduleResource($this->_scheduleService->show($id));
    }
}
