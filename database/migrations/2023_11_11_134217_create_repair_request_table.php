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
        Schema::create('repair_request', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
            ->references('id')
            ->on('products');
            $table->foreignId('company_id')
            ->references('id')
            ->on('companies');
            $table->text('note');
            $table->date('start_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_request');
    }
};