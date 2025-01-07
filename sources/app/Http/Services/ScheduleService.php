<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\ScheduleServiceInterface;
use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

class ScheduleService implements ScheduleServiceInterface
{
    protected WorkoutService $_workoutService;
    protected UserService $_userService;
    protected ScheduleTimeService $_scheduleService;
    public function __construct(WorkoutService $workoutService, UserService $userService, ScheduleTimeService $scheduleTimeService)
    {
        $this->_workoutService = $workoutService;
        $this->_userService = $userService;
        $this->_scheduleService = $scheduleTimeService;
    }
    public function create(array $schedule): Schedule
    {
        return Schedule::create($schedule);
    }
    public function show(int $id): Schedule
    {
        return Schedule::find($id);
    }
    public function showByDate(int $hall_id, string $day): Collection
    {
        $schedule = new Collection(Schedule::where('hall_id', '=', $hall_id)
            ->where('date', '=', $day)
            ->get());
        $schedule->sortBy('date');
        foreach ($schedule as $value)
        {
            $value['workout']           = $this->_workoutService->show((int)$value['workout_id']);
            $value['coucher']           = $this->_userService->show((int)$value['couch_id']);
            $value['schedule_time']     = $this->_scheduleService->show((int)$value['schedule_time_id']);
        }
        $schedule->sortBy('start_time');
        return $schedule;
    }
    public function all(): Collection
    {
        return Schedule::all();
    }
    public function update(Schedule $schedule, array $request): Schedule
    {
        $schedule->hall_id              = $request["hall_id"];
        $schedule->workout_id           = $request["workout_id"];
        $schedule->couch_id             = $request["couch_id"];
        $schedule->schedule_time_id     = $request["schedule_time_id"];
        $schedule->date                 = $request["date"];
        $schedule->save();
        return $schedule;
    }
    public function delete(int $id): bool
    {
        $model = Schedule::find($id);
        return $model->delete($id);
    }
}
