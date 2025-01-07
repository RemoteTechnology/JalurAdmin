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
        Schema::create('visitions', function (Blueprint $table) {
            $table->id();
            $table->uuid('contract_id');
            $table->date('visition_date');
            $table->enum('status', ['Пропущено', 'Посещено', 'Перенесено', 'Ожидает']);
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')
                ->nullable();

            $table->foreign('contract_id')
                ->references('contract')
                ->on('records')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitions');
    }
};
