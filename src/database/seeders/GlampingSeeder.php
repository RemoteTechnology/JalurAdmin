<?php

namespace Database\Seeders;

use App\Models\Glamping;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlampingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $glampings = [
            [
                'name' => 'Поездка на луга',
                'description' => 'Посидим, чайку попьём, потреним, не обламывайся!',
                'image' => 'uploads/glamping.png',
                'date' => '11.09.2024',
                'time' => '07:14'
            ],
            [
                'name' => 'Благословление гор',
                'description' => 'Посидим в горах, подышим',
                'image' => 'uploads/glamping.png',
                'date' => '05.05.2024',
                'time' => '09:00'
            ],
            [
                'name' => 'Копание картошки',
                'description' => 'Целых 3 дня, 15 га и нам ни кто не помешает!',
                'image' => 'uploads/glamping.png',
                'date' => '01.09.2024',
                'time' => '08:50'
            ],
        ];
        foreach ($glampings as $glamping)
        {
            Glamping::create($glamping);
        }
    }
}
