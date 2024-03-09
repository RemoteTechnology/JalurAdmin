<?php

namespace App\Http\Controllers\Form\Schedules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\ScheduleCreateRequest;
use App\Http\Requests\Schedule\ScheduleUpdateRequest;
use App\Http\Services\ScheduleService;

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
            return back()->with('success', 'Данные сохранены!');
        }
        return back()->with('success', 'Данные не удалось сохранить!');
    }
    public function update(ScheduleUpdateRequest $request)
    {
        $request = $request->validated();
        if ($this->_scheduleService->update($this->_scheduleService->show($request["id"]), $request))
        {
            return back()->with('success', 'Данные обновлены!');
        }
        return back()->with('success', 'Данные обновить не удалось!');
    }
    public function delete(int $id)
    {
        if ($this->_scheduleService->delete($id))
        {
            return back()->with('success', 'Данные удалены!');
        }
        return back()->with('success', 'Данные удалить не удалось!');
    }
}
