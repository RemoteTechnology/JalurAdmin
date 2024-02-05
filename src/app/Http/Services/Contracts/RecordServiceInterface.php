<?php

namespace App\Http\Services\Contracts;

use App\Models\Record;
use Illuminate\Database\Eloquent\Collection;

interface RecordServiceInterface
{
    public function create(array $request) : Record|null;
    public function show(int $id) : Record;
    public function all(int|null $user_id=null) : Collection;
    public function update(Record $record, array $request) : Record;
}
