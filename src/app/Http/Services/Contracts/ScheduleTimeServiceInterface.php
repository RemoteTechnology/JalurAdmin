<?php

namespace App\Http\Services\Contracts;

use App\Models\ScheduleTime;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleTimeServiceInterface
{
    public function create(array $time_workout): ScheduleTime;
    public function show(int $id): ScheduleTime;
    public function all(): Collection;
    public function delete(int $id): bool|null;
}
