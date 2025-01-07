<?php

namespace App\Http\Services\Contracts;

use App\Models\Workout;
use \Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Collection;

interface WorkoutServiceInterface
{
    public function create(array $workout, UploadedFile $fileLists): Workout;
    public function show(int $id);
    public function all(string $status): Collection;
    public function update(array $workout, UploadedFile $fileLists): Workout;
    public function delete(int $id): bool;
}
