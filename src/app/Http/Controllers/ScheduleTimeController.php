<?php

namespace App\Http\Controllers;

use App\Http\Services\ScheduleTimeService;
use Illuminate\Http\Request;

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
