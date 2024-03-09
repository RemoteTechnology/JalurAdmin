<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Services\ScheduleTimeService;

class ScheduleTimeController extends Controller
{
    protected ScheduleTimeService $_scheduleTimeService;
    public function __construct(ScheduleTimeService $scheduleTimeService)
    {
        $this->_scheduleTimeService = $scheduleTimeService;
    }
    public function index()
    {
        return view('schedule.time', [
            "title"             => "Расписание",
            "schedule_times"    => $this->_scheduleTimeService->all()
        ]);
    }
}
