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
        Schema::create('tofali_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('matofali_stock_id');
            $table->double('quantity');
            $table->double('total_cost');
            $table->timestamps();


            $table->foreign('matofali_stock_id')->references('id')->on('tofalis');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tofali_sales');
    }
};
