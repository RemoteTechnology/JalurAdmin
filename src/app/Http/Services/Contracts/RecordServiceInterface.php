<?php

namespace App\Http\Services\Contracts;

use App\Models\Billing;
use App\Models\Record;
use App\Models\Visition;
use Illuminate\Database\Eloquent\Collection;

interface RecordServiceInterface
{
    public function create(array $request) : Record|null;
    public function show(int $id) : Record;
    public function all(int|null $user_id=null) : Collection;
    public function updateRemaining(Record $record, array $request) : Record;
    public function recoil(array $request, Record $record, Billing $billing): mixed;
}
