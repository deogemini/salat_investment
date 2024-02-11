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
        Schema::table('sales_deposition', function (Blueprint $table) {
        $table->unsignedBigInteger('bank_account_id');
        $table->foreign('bank_account_id')->references('id')->on('bank_accounts');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sales_deposition', function (Blueprint $table) {
        });
    }
};
