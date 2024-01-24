<?php

namespace App\Http\Services\Contracts;

use App\Models\Schedule;
use Illuminate\Database\Eloquent\Collection;

interface ScheduleServiceInterface
{
    public function create(array $schedule): Schedule;
    public function show(int $id): Schedule;
    public function showByDate(int $hall_id, string $day): Collection;
    public function all(): Collection;
    public function update(Schedule $schedule, array $request): Schedule;
    public function delete(int $id): bool;
}
