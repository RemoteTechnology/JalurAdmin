<?php

namespace App\Http\Services\Contracts;

use App\Models\Visition;
use Illuminate\Database\Eloquent\Collection;

interface WorkoutVisitionServiceInterface
{
    public function create(string $contract_id, array $context): Collection;
    public function show(int $id): Visition;
    public function all(): Collection;
    public function update(Visition $workout_visition, array $context): Visition;
    public  function delete(Visition $workout_visition): bool;
}
