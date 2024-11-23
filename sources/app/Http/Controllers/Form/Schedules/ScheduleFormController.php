<?php

namespace App\Http\Controllers\Form\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\ScheduleCreateRequest;
use App\Http\Requests\Schedule\ScheduleUpdateRequest;
use App\Http\Services\ScheduleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ScheduleFormController extends Controller
{
    private ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->_scheduleService = $scheduleService;
    }
    public function create(ScheduleCreateRequest $request)
    {
        $request = $request->validated();
        if ($this->_scheduleService->create($request))
        {
            Cache::forget('schedule');
            Cache::remember('schedule', null, function () {
                return $this->_scheduleService->all();
            });
            return back()->with('success', 'Данные сохранены!');
        }
        return back()->with('success', 'Данные не удалось сохранить!');
    }
    public function update(ScheduleUpdateRequest $request)
    {
        $request = $request->validated();
        if ($this->_scheduleService->update($this->_scheduleService->show($request["id"]), $request))
        {
            Cache::forget('schedule');
            Cache::remember('schedule', null, function () {
                return $this->_scheduleService->all();
            });
            return back()->with('success', 'Данные обновлены!');
        }
        return back()->with('success', 'Данные обновить не удалось!');
    }
    public function delete(Request $request)
    {
        if ($this->_scheduleService->delete($request->id))
        {
            Cache::forget('schedule');
            Cache::remember('schedule', null, function () {
                return $this->_scheduleService->all();
            });
            return redirect()->route('schedule.index')->with('success', 'Данные удалены!');
        }
        return back()->with('success', 'Данные удалить не удалось!');
    }
}
