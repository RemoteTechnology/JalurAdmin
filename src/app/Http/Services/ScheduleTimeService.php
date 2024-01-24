<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\ScheduleTimeServiceInterface;
use App\Models\ScheduleTime;
use Illuminate\Database\Eloquent\Collection;

class ScheduleTimeService implements ScheduleTimeServiceInterface
{
    public function create(array $time_workout): ScheduleTime
    {
        return ScheduleTime::create($time_workout);
    }
    public function show(int $id): ScheduleTime
    {
        return ScheduleTime::find($id);
    }
    public function all(): Collection
    {
        return ScheduleTime::all();
    }
    public function delete(int $id): bool|null
    {
        return ScheduleTime::destroy($id);
    }
}
