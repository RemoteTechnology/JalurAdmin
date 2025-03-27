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
        Schema::create('user_abonements', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('abonement_id');
            $table->integer('price');
            $table->integer('remaining_workout_count');
            $table->boolean('expired')->default(false);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')
                ->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('abonement_id')->references('id')->on('abonements')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_abonements');
    }
};
