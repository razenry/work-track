<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled']);
            $table->unsignedBigInteger('qty');
            $table->foreignId('leader_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('work_type_id')->constrained('work_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_schedules');
    }
};
