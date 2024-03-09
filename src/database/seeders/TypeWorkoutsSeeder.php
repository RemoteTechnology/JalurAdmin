<?php

namespace Database\Seeders;

use App\Models\TypeWorkout;
use Illuminate\Database\Seeder;

class TypeWorkoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type_workouts = [
            ['name' => 'Хатха-Йога'],
            ['name' => 'Расслабончик'],
            ['name' => 'Заруба'],
        ];
        foreach ($type_workouts as $type_workout)
        {
            TypeWorkout::create($type_workout);
        }
    }
}
