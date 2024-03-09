<?php

namespace App\Http\Controllers\Form\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\Time\ScheduleTimeCreateRequest;
use App\Http\Requests\Schedule\Time\ScheduleTimeDeleteRequest;
use App\Http\Services\ScheduleTimeService;

class ScheduleTimeFormController extends Controller
{
    protected ScheduleTimeService $_scheduleTimeService;
    public function __construct(ScheduleTimeService $scheduleTimeService)
    {
        $this->_scheduleTimeService = $scheduleTimeService;
    }
    public function create(ScheduleTimeCreateRequest $request)
    {
        $request = $request->validated();
        if ($this->_scheduleTimeService->create($request))
        {
            return back()->with("success","Время расписания успешно добавлено!");
        }
        return back()->with("error","Время расписания не добавлено!");
    }
    // public function update()
    // {
    //     if ($this->_scheduleTimeService->update($request))
    //     {
    //         return redirect()
    //         ->route("user.index")
    //         ->with("success","Пользователь успешно добавлен!");
    //     }
    //     return redirect()
    //     ->route("user.index")
    //     ->with("success","Пользователь успешно добавлен!");
    // }
    public function delete(ScheduleTimeDeleteRequest $request)
    {
        $request = $request->validated();
        if ($this->_scheduleTimeService->delete($request["id"]))
        {
            return back()->with("success","Время расписания успешно удалено!");
        }
        return back()->with("success","Время расписания не возможно удалить!");
    }
}
