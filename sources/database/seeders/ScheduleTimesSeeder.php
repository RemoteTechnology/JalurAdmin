<?php

namespace Database\Seeders;

use App\Models\ScheduleTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleTimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedule_times = [
            ['start_time' => '09:00'],
            ['start_time' => '10:40'],
            ['start_time' => '11:30'],
            ['start_time' => '11:45'],
            ['start_time' => '12:50'],
            ['start_time' => '16:00'],
            ['start_time' => '17:30'],
            ['start_time' => '18:20'],
            ['start_time' => '20:50'],
        ];
        foreach ($schedule_times as $schedule_time)
        {
            ScheduleTime::create($schedule_time);
        }
    }
}
