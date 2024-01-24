<?php

namespace App\Http\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface UserFilterServiceInterface
{
    public function filter(array $request): Collection;
}
