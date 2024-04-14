<?php

namespace Database\Seeders;

use App\Models\Record;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $records = [
            [
                'contract' => '532174ac-3ec4-45ad-aab4-e0d8aef93054', // Подразумевается Str::uuid()
                'user_id' => 6,
                'schedule_id' => 5,
                'total_training' => 10,
                'remaining_training' => 5
            ],
            [
                'contract' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'user_id' => 7,
                'schedule_id' => 5,
                'total_training' => 10,
                'remaining_training' => 3
            ],
            [
                'contract' => '2c10ff5d-b004-476f-9ea0-ddcff57df792',
                'user_id' => 8,
                'schedule_id' => 5,
                'total_training' => 2,
                'remaining_training' => 1
            ],
            [
                'contract' => 'f1c4d552-8fd2-4dcb-95df-9db7aabc32fa',
                'user_id' => 10,
                'schedule_id' => 6,
                'total_training' => 1,
                'remaining_training' => 0
            ],
        ];
        foreach ($records as $record)
        {
            Record::create($record);
        }
    }
}
