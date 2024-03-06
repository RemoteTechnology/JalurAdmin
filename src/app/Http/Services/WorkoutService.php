<?php

namespace App\Http\Services;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Services\Contracts\WorkoutServiceInterface;
use App\Models\Workout;
use \Illuminate\Http\UploadedFile;

class WorkoutService implements WorkoutServiceInterface
{
    public function create(array $workout, UploadedFile|null $fileLists): Workout
    {
        try {
            $file = $fileLists->store('uploads', 'public');
        }
        catch (\TypeError)
        {
            $file = null;
        }
        $model = new Workout();
        $model->name = $workout["name"];
        $model->description = $workout["description"];
        $model->image = $file;
        $model->type_workout_id = $workout["type_workout_id"];
        $model->save();
        return $model;
    }
    public function show(int $id): Workout|null
    {
        return Workout::find($id);
    }
    public function all(): Collection
    {
        return Workout::all();
    }
    public function update(array $workout, UploadedFile|null $fileLists): Workout
    {
        $model = $this->show($workout["id"]);
        $model->name = $workout["name"];
        $model->description = $workout["description"];
        if (!is_null($fileLists))
        {
            $model->images = $fileLists->store('uploads', 'public');
        }
        $model->type_workout_id = $workout["type_workout_id"];
        $model->save();
        return $model;
    }
    public function delete(int $id): bool
    {
        $model = $this->show($id);
        return $model->delete();
    }
}
