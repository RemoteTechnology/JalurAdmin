<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TypeWorkoutsSeeder::class,
            WorkoutsSeeder::class,
            ScheduleTimesSeeder::class,
            HallSeeder::class,
            GlampingSeeder::class,
            ScheduleSeeder::class,
            RecordSeeder::class,
            UserTargetSeeder::class,
            BillingSeeder::class,
            VisitionSeeder::class,
            AbonementSeeder::class,
        ]);
    }
}
