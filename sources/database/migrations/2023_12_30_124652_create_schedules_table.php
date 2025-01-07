<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('hall_id');
            $table->integer('workout_id');
            $table->integer('couch_id');
            $table->integer('schedule_time_id');
            $table->timestamp('date');
            $table->integer('count_record')->default(15);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')
                ->nullable();

            $table->foreign('hall_id')
                ->references('id')
                ->on('halls');
            $table->foreign('workout_id')
                ->references('id')
                ->on('workouts');
            $table->foreign('couch_id')
                ->references('id')
                ->on('users');
            $table->foreign('schedule_time_id')
                ->references('id')
                ->on('schedule_times');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
