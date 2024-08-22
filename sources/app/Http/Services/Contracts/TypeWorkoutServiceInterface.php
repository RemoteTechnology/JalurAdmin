<?php

namespace App\Http\Services\Contracts;
use App\Models\TypeWorkout;
use Illuminate\Database\Eloquent\Collection;

interface TypeWorkoutServiceInterface
{
    public function create(array $type_workout): TypeWorkout;
    public function show(int $id): TypeWorkout;
    public function all(): Collection;
    public function delete(int $id): bool|null;
}
