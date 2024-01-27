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
        Schema::create('gharama_mashamba', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mashamba_id');
            $table->integer('kusafisha_shamba')->nullable();
            $table->integer('kulima_shamba')->nullable();
            $table->integer('mbegu_za_shamba')->nullable();
            $table->integer('kupanda_shamba')->nullable();
            $table->integer('kupalilia_shamba')->nullable();
            $table->integer('mifuko_ya_mbolea')->nullable();
            $table->integer('gharama_za_mbolea')->nullable();
            $table->integer('nauli_pikipiki')->nullable();
            $table->integer('wafanyakazi')->nullable();
            $table->integer('muda_msimu_mwaka')->nullable();
            $table->integer('total')->nullable();
            $table->timestamps();


            $table->foreign('mashamba_id')->references('id')->on('mashamba');

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
