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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->integer('age')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('role', ['Администратор', 'Клиент', 'Тренер']);
            $table->enum('gender', ['Мужчина', 'Женщина']);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->integer('size_cloth')->nullable();
            $table->char('phone', 18)->unique(); // Пример:  +7 (999) 999-99-99
<<<<<<< HEAD
            $table->string('email')->unique()->nullable();
=======
            $table->string('email',)->unique()->nullable();
>>>>>>> 1e4ff48d77f85eaa3b989ed4268b405f6d5d558e
            $table->string('code')->nullable();
            $table->string('password_admin')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
