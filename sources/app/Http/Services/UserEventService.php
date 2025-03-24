<?php

namespace App\Http\Services;

use App\Models\UserAbonement;

class UserEventService
{
    public function writeOff(array $request): bool
    {
        $userAbonement = UserAbonement::where('user_id', $request['user_id'])->where('expired', false)->first();

        // Проверка наличия у клиента действующего абонемента
        // Проверка на то, остались ли у клиента доступные занятия по данному абонементу
        if (!$userAbonement || $userAbonement->remaining_workout_count < 1)
        {
            return false;
        }

        // Списание занятия по данному абонементу
        $userAbonement->remaining_workout_count--;
        $userAbonement->save();

        return true;
    }
    
    public function return($request): bool
    {
        $userAbonement = UserAbonement::where('user_id', $request['user_id'])->where('expired', false)->first();

        // Проверка наличия у клиента действующего абонемента
        if (!$userAbonement)
        {
            return false;
        }

        // Возврат занятия по данноу абонементу
        $userAbonement->remaining_workout_count++;
        $userAbonement->save();

        return true;
    }
}