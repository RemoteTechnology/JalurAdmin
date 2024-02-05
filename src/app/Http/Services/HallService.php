<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\HallServiceInterface;
use App\Models\Hall;
use Illuminate\Database\Eloquent\Collection;

class HallService implements HallServiceInterface
{
    public function create(array $hall): Hall
    {
        return Hall::create($hall);
    }
    public function show(int $id): Hall
    {
        return Hall::findOrFail($id);
    }
    public function all(): Collection
    {
        return Hall::all();
    }
    public function update(array $hall): bool
    {
        return $this->show($hall["id"])->update($hall);
    }
    public function delete(int $id): bool
    {
        return Hall::destroy($id);
    }
}
