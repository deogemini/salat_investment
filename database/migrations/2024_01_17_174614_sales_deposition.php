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

        Schema::create('sales_deposition', function (Blueprint $table) {
        $table->id();
        $table->string('depositer_name')->nullable();
        $table->string('bank_name')->nullable();
        $table->string('account_number')->nullable();
        $table->string('amount')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
