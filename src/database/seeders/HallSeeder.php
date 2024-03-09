<?php

namespace Database\Seeders;

use App\Models\Hall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $halls = [
            [
              'name' => 'Зал на Волочаевской',
              'addres' => 'Волочаевская 2а, П-3, этаж 2',
              'description' => 'Чистый комфортный зал.',
              'start_work_time' => '09:00',
              'end_work_time' => '22:00',
            ],
            [
                'name' => 'Зал на Маркса',
                'addres' => 'Проспект Маркса 113, этаж 1',
                'description' => 'Чистый комфортный зал.',
                'start_work_time' => '08:00',
                'end_work_time' => '20:00',
            ],
            [
                'name' => 'Зал на сухом логу',
                'addres' => 'Сухой Лог 15, этаж 6',
                'description' => 'Чистый комфортный зал.',
                'start_work_time' => '07:30',
                'end_work_time' => '22:00',
            ],
        ];
        foreach ($halls as $hall)
        {
            Hall::create($hall);
        }
    }
}
