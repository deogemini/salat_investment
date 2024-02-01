<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('gharama_mashamba', function (Blueprint $table) {
            // Change the column type from integer to string
            $table->string('muda_msimu_mwaka')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gharama_mashamba', function (Blueprint $table) {
        });
    }
};
