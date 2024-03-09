<?php

namespace Database\Seeders;

use App\Models\Workout;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workouts = [
            [
                'type_workout_id' => 1,
                'name' => 'Йога для тела и ума',
                'description' => 'Тут должно быть описание...',
                'image' => 'uploads/ioga.png'
            ],
            [
                'type_workout_id' => 1,
                'name' => 'Пробуждающая йога',
                'description' => 'Тут должно быть описание...',
                'image' => 'uploads/ioga.png'
            ],
            [
                'type_workout_id' => 2,
                'name' => 'Лежание на иглах',
                'description' => 'Тут должно быть описание...',
                'image' => 'uploads/ioga.png'
            ],
            [
                'type_workout_id' => 3,
                'name' => 'Все против всех',
                'description' => 'Тут должно быть описание...',
                'image' => 'uploads/ioga.png'
            ],
        ];
        foreach ($workouts as $workout)
        {
            Workout::create($workout);
        }
    }
}
