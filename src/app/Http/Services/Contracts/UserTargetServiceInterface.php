<?php

namespace App\Http\Services\Contracts;

use App\Models\UserTarget;
use Illuminate\Database\Eloquent\Collection;

interface UserTargetServiceInterface
{
    public function create(array $target_collection): UserTarget;
    public function show(int $user_id): UserTarget|null;
    public function all(): Collection;
    public function update(UserTarget $target, array $target_collection): UserTarget;
}
