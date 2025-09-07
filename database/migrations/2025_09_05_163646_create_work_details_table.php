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
        Schema::create('work_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('work_schedule_id')->constrained('work_schedules')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('worker_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_details');
    }
};
