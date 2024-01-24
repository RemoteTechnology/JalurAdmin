<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\GlampingServiceInterface;
use App\Models\Glamping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

class GlampingService implements GlampingServiceInterface
{
    public function create(array $glamping, UploadedFile $fileLists): Glamping
    {
        $file = $fileLists->store('uploads', 'public');
        $model = new Glamping();
        $model->name = $glamping['name'];
        $model->description = $glamping['description'];
        $model->images = "[{\"name\": \"{$file}\"}]";
        $model->date = $glamping['date'];
        $model->time = $glamping['time'];
        $model->save();
        return $model;
    }
    public function show(int $id): Glamping
    {
        return Glamping::find($id);
    }
    public function all(): Collection
    {
        return Glamping::all();
    }
    public function update(array $glamping, UploadedFile|null $fileLists): Glamping
    {
        $model = $this->show($glamping["id"]);
        $model->name = $glamping['name'];
        $model->description = $glamping['description'];
        $model->images = $fileLists ? "[{\"name\": " . $fileLists->store('uploads', 'public') . "\"}]" : $model->images;
        $model->date = $glamping['date'];
        $model->time = $glamping['time'];
        $model->save();
        return $model;
    }
    public function delete(int $id): bool
    {
        return $this->show($id)->delete();
    }
}
