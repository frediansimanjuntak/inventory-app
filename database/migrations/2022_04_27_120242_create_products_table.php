<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('stock');
            
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')
                ->references('id')->on('product_categories')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_location_id');
            $table->foreign('product_location_id')
                ->references('id')->on('product_locations')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
