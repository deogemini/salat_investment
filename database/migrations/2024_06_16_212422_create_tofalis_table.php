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
        Schema::create('tofalis', function (Blueprint $table) {
            $table->id();
            $table->decimal('bei_rejareja', 8, 2);
            $table->integer('idadi_matofali_stock');
            $table->string('special_code')->nullable(); //
            $table->string('idadi_matofali_soldout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tofalis');
    }
};
