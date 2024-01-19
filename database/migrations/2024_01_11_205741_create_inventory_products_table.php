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
        Schema::create('inventory_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_description');
            $table->unsignedBigInteger('product_category_id'); // Foreign key column
            $table->decimal('retail_price', 10, 2);
            $table->decimal('whole_sale_price', 10, 2)->nullable();
            $table->integer('quantity_in')->nullable();
            $table->integer('quantity_now')->nullable();
            $table->integer('reference_number')->nullable();
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('product_category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_products');
    }
};
