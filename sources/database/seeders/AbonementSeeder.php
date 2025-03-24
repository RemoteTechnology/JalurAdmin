<?php

namespace Database\Seeders;

use App\Models\Abonement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbonementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abonements = [
            ['title' => 'Разовое занятие', 'price' => 500, 'time_of_action' => 1, 'avaible_workout_count' => 1],
            ['title' => '8 занятий ', 'price' => 3760, 'time_of_action' => 30, 'avaible_workout_count' => 8],
            ['title' => '12 занятий', 'price' => 5400, 'time_of_action' => 40, 'avaible_workout_count' => 12],
            ['title' => '16 занятий', 'price' => 6880, 'time_of_action' => 50, 'avaible_workout_count' => 16],
            ['title' => '24 занятий', 'price' => 9600, 'time_of_action' => 90, 'avaible_workout_count' => 24],
        ];
        foreach ($abonements as $abonement)
        {
            Abonement::create($abonement);
        }
    }
}
