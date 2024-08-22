<?php

namespace App\Http\Controllers\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Services\AutoCalendarFormatterService;
use App\Http\Services\HallService;
use App\Http\Services\RecordService;
use App\Http\Services\ScheduleService;
use App\Http\Services\ScheduleTimeService;
use App\Http\Services\UserService;
use App\Http\Services\WorkoutService;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    private Carbon $carbon;
    private AutoCalendarFormatterService $_autoCalendarFormatterService;
    private HallService $_hallService;
    private WorkoutService $_workoutService;
    private UserService $_userService;
    private ScheduleService $_scheduleService;
    private ScheduleTimeService $_scheduleTimeService;
    private RecordService $_recordService;
    public function __construct(
        AutoCalendarFormatterService $autoCalendarFormatterService,
        HallService $hallService,
        WorkoutService $workoutService,
        UserService $_userService,
        ScheduleService $scheduleService,
        ScheduleTimeService $scheduleTimeService,
        RecordService $recordService
    )
    {
        $this->_autoCalendarFormatterService = $autoCalendarFormatterService;
        $this->_hallService = $hallService;
        $this->_workoutService = $workoutService;
        $this->_userService = $_userService;
        $this->_scheduleService = $scheduleService;
        $this->_scheduleTimeService = $scheduleTimeService;
        $this->_recordService = $recordService;
        $this->carbon = Carbon::now();
    }
    public function index()
    {
        return view('schedule.index', [
            "title"             => "Расписание",
            "halls"             => $this->_hallService->all(),
        ]);
    }
    public function for_hall(int $hall_id, int|null $day=null, int|null $month=null, int|null $year=null)
    {
        if (is_null($day) && is_null($month) && is_null($year))
        {
            $schedules = $this->_autoCalendarFormatterService->calendar($hall_id, $this->carbon->day, $this->carbon->month, $this->carbon->year);
        }
        else
        {
            $schedules = $this->_autoCalendarFormatterService->calendar($hall_id, $day, $month, $year);
        }
        return view("schedule.for_hall", [
            "title"             => "Расписание",
            "hall_id"           => $hall_id,
            "halls"             => $this->_hallService->all(),
            "schedules"         => $schedules,
        ]);
    }
    public function create(int $hall_id)
    {
        return view("schedule.create", [
            "title"             => "Расписание",
            "hall"              => $this->_hallService->show($hall_id),
            "workouts"          => $this->_workoutService->all(),
            "couches"           => $this->_userService->findByRole("Тренер"),
            "schedule_times"    => $this->_scheduleTimeService->all()
        ]);
    }
    public function info(int $hall_id, int $schedule_id, int $schedule_time_id, int $couch_id, int $workout_id)
    {
        return view("schedule.info", [
            "title"             => "Расписание",
            "schedule_id"       => $schedule_id,
            "users"             => $this->_userService->findByRole('Клиент'),
            "hall"              => $this->_hallService->show($hall_id),
            "schedule"          => $this->_scheduleService->show($schedule_id),
            "schedule_time"     => $this->_scheduleTimeService->show($schedule_time_id),
            "coucher"           => $this->_userService->show($couch_id),
            "workout"           => $this->_workoutService->show($workout_id),
            "clients"           => $this->_recordService->showForUser($schedule_id)
        ]);
    }
    public function update(int $hall_id, int $schedule_id)
    {
        return view("schedule.update", [
            "title"             => "Расписание",
            "schedule_id"       => $schedule_id,
            "schedule"              => $this->_scheduleService->show($schedule_id),
            "hall"              => $this->_hallService->show($hall_id),
            "workouts"          => $this->_workoutService->all(),
            "couches"           => $this->_userService->findByRole("Тренер"),
            "schedule_times"    => $this->_scheduleTimeService->all(),
            "current_schedule_time"     => $this->_scheduleTimeService->show(
                $this->_scheduleService->show($schedule_id)->schedule_time_id
            )
        ]);
    }
}
