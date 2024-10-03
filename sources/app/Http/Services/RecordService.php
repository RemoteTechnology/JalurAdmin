<?php

namespace App\Http\Services;
use App\Http\Services\Contracts\RecordServiceInterface;
use App\Models\Billing;
use App\Models\Record;
use App\Models\User;
use App\Models\Visition;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;

class RecordService implements RecordServiceInterface
{
    protected ScheduleService $_scheduleService;
    public function __construct(ScheduleService $scheduleService)
    {
        $this->_scheduleService = $scheduleService;
    }
    public function create(array $request) : Record|null
    {
        $record = new Record();
        $record->contract = Str::uuid();
        $record->user_id = $request['user_id'];
        $record->schedule_id = $request['schedule_id'];
        $record->total_training = $request['total_training'] ?? 1;
        $record->remaining_training = 0;
        $record->save();
        return $record;
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
            return Record::where('user_id', '=', $user_id)->get();
        }
        return Record::all();
    }
    public function updateRemaining(Record $record, array $request) : Record
    {
        $record->user_id = $request['user_id'];
        $record->schedule_id = $request['schedule_id'];
        $record->total_training = $request['total_training'];
        $record->remaining_training = $request['remaining_training'];
        $record->save();
        return $record;
    }

    public function getDateBinary(mixed $payments): array
    {
        $latestDate = null;
        for ($i=0; $i < count($payments); $i++)
        {
            if ($payments[$i]['created_at'] > $latestDate)
            {
                $latestDate = $payments[$i]['created_at'];
                return $payments[$i];
            }
        }
        return $payments;
    }

    public function recoil(array $request, Record $record, Billing $billing): mixed
    {
        $countDay = $request['recoil_training'];
        // TODO: Сделать запрос на возврат к Юкассе
        foreach (explode(',', $request['schedule_day']) as $item_day)
        {
            $date = new \DateTime($item_day);
            if ($countDay > 0 && strtotime(Visition::where([
                'contract_id' => $record->contract,
                'visition_date' => $date->format('Y-m-d')
            ])->first()->visition_date) > strtotime(date('Y-m-d')))
            {
                // Вычитаем 1 день записи
                if ($record->total_training > 0)
                {
                    $record->total_training = $record->total_training - 1;
                    $record->save();

                    // Удаление из посещений (будущих)
                    foreach (Visition::where(['contract_id' => $record->contract])->get() as $visition)
                    {
                        if (
                            $date->format('Y-m-d') === $visition->visition_date &&
                            $visition->status === "Ожидает"
                        )
                        {
                            $visition->delete();
                        }
                    }
                }
            }
            else
            {
                return ["message" => "Невозможно отменить запись!"];
            }
        }
        $billing->payments = $billing->payments[strlen($billing->payments) - 1] . ', ' . $request['payments'] . ']';
        return ["message" => "Запись отменена!"];
    }

    public function delete(Record $record) {
        return $record->delete();
    }

    public function getUser(int $user_id) {
        return Record::where(['user_id' => $user_id])->first();
    }
}
