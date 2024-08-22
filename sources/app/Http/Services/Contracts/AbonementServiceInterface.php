<?php

namespace App\Http\Services\Contracts;

use App\Models\Abonement;
use Illuminate\Database\Eloquent\Collection;

interface AbonementServiceInterface
{
    public function create(array $request): Abonement;
    public function show(int $id): Abonement;
    public function all(): Collection;
    public function update(Abonement $context, array $request): Abonement;
    public function delete(Abonement $context): bool;
}
