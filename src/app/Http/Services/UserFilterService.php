<?php

namespace App\Http\Services;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class UserFilterService
{
    public array $users = array();
    public function filter(array $request): Collection
    {

        $users =  DB::table('users');
        if ($request['first_name'] !== null) {
            $users->when($request['first_name'], function ($query, $first_name) {
                return $query->where('first_name', $first_name);
            });
        }
        if ($request['last_name'] !== null) {
            $users->when($request['last_name'], function ($query, $last_name) {
                return $query->where('last_name', $last_name);
            });
        }
        if ($request['phone'] !== null) {
            $users->when($request['phone'], function ($query, $phone) {
                return $query->where('phone', $phone);
            });
        }
        if ($request['age'] !== null && $request['age'] != 0) {
            $users->when($request['age'], function ($query, $age) {
                return $query->where('age', $age);
            });
        }
        return new Collection($users->when($request['gender'], function ($query, $gender) { return $query->where('gender', $gender); })
            ->when($request['role'], function ($query, $role) { return $query->where('role', $role); })->get());
    }
    public function filter_records(Collection $users): Collection
    {
        $currentDate = new DateTime();
        $records_for_schedule = DB::table('records')->select();
        foreach ($users as $user)
        {
            $records_for_schedule->leftJoin('users', 'records.user_id', '=', 'users.id')
                    ->where('users.id', '=', $user->id);
        }
        $records_for_schedule->leftJoin('schedules', 'records.schedule_id', '=', 'schedules.id')
            ->where('schedules.date', '>=', $currentDate->format('Y-m-d'));
        return new Collection($records_for_schedule->get());
    }
}
