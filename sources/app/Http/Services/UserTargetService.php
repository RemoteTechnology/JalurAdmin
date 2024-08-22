<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\UserTargetServiceInterface;
use App\Models\UserTarget;
use Illuminate\Database\Eloquent\Collection;

class UserTargetService implements UserTargetServiceInterface
{
    public function create(array $target_collection): UserTarget
    {
        return UserTarget::create($target_collection);
    }
    public function show(int $user_id): UserTarget|null
    {
        return UserTarget::where('user_id',  $user_id)->first();
    }
    public function all(): Collection
    {
        return UserTarget::all();
    }
    public function update(UserTarget $target, array $target_collection): UserTarget
    {
        $target->collection = $target_collection["collection"];
        $target->save();
        return $target;
    }
}
