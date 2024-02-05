<?php

namespace App\Http\Services\Contracts;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Collection;

interface HallServiceInterface
{
    public function create(array $hall): Hall;
    public function show(int $id): Hall;
    public function all(): Collection;
    public function update(array $hall): bool;
    public function delete(int $id): bool;
}
