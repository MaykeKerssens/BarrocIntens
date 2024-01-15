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
        Schema::create('appointment_repair_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')
                ->references('id')
                ->on('appointments');
            $table->foreignId('repair_request_id')
                ->references('id')
                ->on('repair_requests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_repair_requests');
    }
};
