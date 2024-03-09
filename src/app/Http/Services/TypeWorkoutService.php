<?php

namespace App\Http\Services;

use App\Http\Resources\Hall\WorkoutTypeResource;
use App\Http\Services\Contracts\TypeWorkoutServiceInterface;
use App\Models\TypeWorkout;
use Illuminate\Database\Eloquent\Collection;

class TypeWorkoutService implements TypeWorkoutServiceInterface
{
    public function create(array $type_workout): TypeWorkout
    {
        return TypeWorkout::create($type_workout);
    }
    public function show(int $id): TypeWorkout
    {
        return TypeWorkout::find($id);
    }
    public function all(): Collection
    {
        return TypeWorkout::all();
    }
    public function delete(int $id): bool|null
    {
        $model = $this->show($id);
        return$model->delete();
    }
}
