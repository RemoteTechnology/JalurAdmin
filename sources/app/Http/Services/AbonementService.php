<?php

namespace App\Http\Services;

use App\Http\Services\Contracts\AbonementServiceInterface;
use App\Models\Abonement;
use App\Models\UserAbonement;
use App\Models\Record;
use Illuminate\Database\Eloquent\Collection;

    class AbonementService implements AbonementServiceInterface
{

    public function create(array $abonement): Abonement
    {   
        return Abonement::create($abonement);
    }

    public function show(int $id): Abonement
    {
        return Abonement::find($id);
    }

    public function all(): Collection
    {
        return Abonement::all();
    }

    public function update(Abonement $context, array $request): Abonement
    {
        $context->title = key_exists('title', $request) && !is_null($request['title']) ? $request['title'] : $context->title;
        $context->price = key_exists('price', $request) &&
            !is_null($request['price']) &&
            $request['price'] > 0 ? $request['price'] : $context->price;
        $context->time_of_action = key_exists('time_of_action', $request) ? $request['time_of_action'] : $context->time_of_action;
        $context->avaible_workout_count = key_exists('avaible_workout_count', $request) ? $request['avaible_workout_count'] : $context->avaible_workout_count;
        $context->save();
        return $context;
    }

    public function sell(array $request): bool
    {
        // Проверка на наличие действующего абонемента у клиента
        if(UserAbonement::where('user_id', $request['user_id'])->where('expired', false)->first())
        {
            return false;
        }

        $abonement = Abonement::find($request['abonement_id']);

        // Создание связи между клиентом и купленным им абонементом посредством записи в связующую таблицу
        $userAbonement = new UserAbonement();
        $userAbonement->user_id = $request['user_id'];
        $userAbonement->abonement_id = $request['abonement_id'];
        $userAbonement->price = $request['price'];
        $userAbonement->remaining_workout_count = $abonement->avaible_workout_count;
        $userAbonement->save();

        return true;
    }

    public function delete(Abonement $context): bool
    {
        return $context->delete();
    }
}
