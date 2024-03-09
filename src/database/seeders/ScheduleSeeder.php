<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'hall_id' => 1,
                'workout_id' => 2,
                'couch_id' => 3,
                'schedule_time_id' => 1,
                'date' => '06.03.2024',
                'count_record' => 15
            ],
            [
                'hall_id' => 1,
                'workout_id' => 3,
                'couch_id' => 3,
                'schedule_time_id' => 3,
                'date' => '06.03.2024',
                'count_record' => 15
            ],
            [
                'hall_id' => 1,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 1,
                'date' => '06.03.2024',
                'count_record' => 10
            ],
            [
                'hall_id' => 2,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 4,
                'date' => '06.03.2024',
                'count_record' => 14
            ],
            [
                'hall_id' => 2,
                'workout_id' => 3,
                'couch_id' => 3,
                'schedule_time_id' => 3,
                'date' => '07.03.2024',
                'count_record' => 12
            ],
            [
                'hall_id' => 2,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 1,
                'date' => '07.03.2024',
                'count_record' => 10
            ],
            [
                'hall_id' => 1,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 4,
                'date' => '07.03.2024',
                'count_record' => 14
            ],
            [
                'hall_id' => 1,
                'workout_id' => 3,
                'couch_id' => 3,
                'schedule_time_id' => 3,
                'date' => '08.03.2024',
                'count_record' => 12
            ],
            [
                'hall_id' => 1,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 1,
                'date' => '08.03.2024',
                'count_record' => 10
            ],
            [
                'hall_id' => 2,
                'workout_id' => 1,
                'couch_id' => 2,
                'schedule_time_id' => 4,
                'date' => '08.03.2024',
                'count_record' => 14
            ],
        ];
        foreach ($schedules as $schedule)
        {
            Schedule::create($schedule);
        }
    }
}
