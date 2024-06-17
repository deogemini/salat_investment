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
        Schema::create('matumizi_cements', function (Blueprint $table) {
            $table->id();
            $table->string('jina_cement')->nullable();
            $table->double('quantity_in')->nullable();
            $table->double('buying_price')->nullable();
            $table->double('quantity_out')->nullable();
            $table->double('quantity_remaining')->nullable();
            $table->double('total_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matumizi_cements');
    }
};
