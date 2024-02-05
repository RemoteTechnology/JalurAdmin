<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\RecordServiceInterface;
use App\Models\Record;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class RecordService implements RecordServiceInterface
{
    protected ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->_scheduleService = $scheduleService;
    }
    public function create(array $request) : Record|null
    {
        return Record::create($request);

    }
    public function show(int $id) : Record
    {
        return Record::find($id);
    }
    public function showForUser(int $schedule_id): Collection
    {
        $data = array();
        foreach (Record::where("schedule_id", "=", $schedule_id)->get() as $record)
        {
            array_push($data, User::find($record->user_id));
        }
        return new Collection($data);
    }
    public function all(int|null $user_id=null) : Collection
    {
        if (!is_null($user_id))
        {
            return Record::where('user_id', '=', $user_id);
        }
        return Record::all();
    }
    public function update(Record $record, array $request) : Record
    {
        $record->user_id = $request['user_id'];
        $record->schedule_id = $request['schedule_id'];
        $record->save();
        return $record;
    }
}
