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
        Schema::create('matumizi_inputs', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->unsignedBigInteger('matumizi_type_id');
            $table->timestamps();
            $table->foreign('matumizi_type_id')->references('id')->on('matumizi_types');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matumizi_inputs');
    }
};
