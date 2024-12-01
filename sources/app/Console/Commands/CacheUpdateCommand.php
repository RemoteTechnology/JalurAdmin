<?php

namespace App\Console\Commands;

use App\Models\Glamping;
use App\Models\Hall;
use App\Models\Schedule;
use App\Models\TypeWorkout;
use App\Models\Workout;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Mockery\Exception;

class CacheUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cache-update-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            Cache::forget('glamping');
            Cache::rememberForever('glamping', function () {
                return Glamping::all();
            });

            Cache::forget('hall');
            Cache::rememberForever('hall', function () {
                return Hall::all();
            });

            Cache::forget('workout_type');
            Cache::rememberForever('workout_type', function () {
                return TypeWorkout::all();
            });

            Cache::forget('workout');
            Cache::rememberForever('workout', function () {
                return Workout::all();
            });

            Cache::forget('schedule');
            Cache::rememberForever('schedule', function () {
                return Schedule::all();
            });
            $this->info('Кэш успешно обновлён!');
        } catch (Exception $e) {
            $this->info('Ошибка обновления кэша!');
        }
    }
}
