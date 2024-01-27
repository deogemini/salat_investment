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

        Schema::create('mashamba', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->string('buying_cost')->nullable();
            $table->string('size')->nullable();
            $table->string('date_of_buying')->nullable();
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
