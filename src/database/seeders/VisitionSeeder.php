<?php

namespace Database\Seeders;

use App\Models\Visition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workout_visitions = [
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-05',
                'status' => 'Пропущено',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-06',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-07',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-06',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-09',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-10',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-11',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-12',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-13',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '532174ac-3ec4-45ad-aab4-e0d8aef93054',
                'visition_date' => '2024-03-14',
                'status' => 'Ожидает',
            ],
            // ............................................................................
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-05',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-06',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-07',
                'status' => 'Перенесено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-08',
                'status' => 'Посещено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-09',
                'status' => 'Пропущено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-10',
                'status' => 'Перенесено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-11',
                'status' => 'Пропущено',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-12',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-13',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '94b99d78-de37-476b-b3de-6b8e7d7bd5b7',
                'visition_date' => '2024-03-14',
                'status' => 'Ожидает',
            ],
            // ............................................................................
            [
                'contract_id' => '2c10ff5d-b004-476f-9ea0-ddcff57df792',
                'visition_date' => '2024-03-12',
                'status' => 'Ожидает',
            ],
            [
                'contract_id' => '2c10ff5d-b004-476f-9ea0-ddcff57df792',
                'visition_date' => '2024-03-13',
                'status' => 'Ожидает',
            ],
            // ............................................................................
            [
                'contract_id' => 'f1c4d552-8fd2-4dcb-95df-9db7aabc32fa',
                'visition_date' => '2024-03-09',
                'status' => 'Перенесено',
            ],
        ];

        foreach ($workout_visitions as $visition)
        {
            Visition::create($visition);
        }
    }
}
