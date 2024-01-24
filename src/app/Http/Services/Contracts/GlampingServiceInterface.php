<?php

namespace App\Http\Services\Contracts;

use App\Models\Glamping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\UploadedFile;

interface GlampingServiceInterface
{
    public function create(array $glamping, UploadedFile $fileLists): Glamping;
    public function show(int $id): Glamping;
    public function all(): Collection;
    public function update(array $glamping, UploadedFile $fileLists): Glamping;
    public function delete(int $id): bool;
}
