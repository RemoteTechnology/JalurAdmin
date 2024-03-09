<?php

namespace Database\Seeders;

use App\Models\UserTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $targets = [
            ['user_id' => 6, 'collection' => 'Хочу машину!'],
            ['user_id' => 10, 'collection' => 'Хочу похудеть!'],
            ['user_id' => 11, 'collection' => 'Хочу чай!'],
            ['user_id' => 12, 'collection' => 'Хочу гречку!'],
            ['user_id' => 13, 'collection' => 'Ну шоб эта девки сматрели!'],
            ['user_id' => 17, 'collection' => 'Похудеть!'],
            ['user_id' => 20, 'collection' => 'Что б эта больше двигаца!'],
            ['user_id' => 19, 'collection' => 'Хочу в туалет!'],
        ];
        foreach ($targets as $target)
        {
            UserTarget::create($target);
        }
    }
}
