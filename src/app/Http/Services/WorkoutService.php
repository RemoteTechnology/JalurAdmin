<?php

namespace App\Http\Services;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Services\Contracts\WorkoutServiceInterface;
use App\Models\Workout;
use \Illuminate\Http\UploadedFile;

class WorkoutService implements WorkoutServiceInterface
{
    public function create(array $workout, UploadedFile $fileLists): Workout
    {
        $file = $fileLists->store('uploads', 'public');
        $model = new Workout();
        $model->name = $workout["name"];
        $model->description = $workout["description"];
        $model->images = "[{\"name\": \"{$file}\"}]";
        $model->type_workout_id = $workout["type_workout_id"];
        $model->save();
        return $model;
    }
    public function show(int $id): Workout
    {
        return Workout::find($id);
    }
    public function all(): Collection
    {
        return Workout::all();
    }
    public function update(array $workout, UploadedFile $fileLists): Workout
    {
        $file = $fileLists->store('uploads', 'public');
        $model = $this->show($workout["id"]);
        $model->name = $workout["name"];
        $model->description = $workout["description"];
        $model->images = "[{\"name\": \"{$file}\"}]";
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
