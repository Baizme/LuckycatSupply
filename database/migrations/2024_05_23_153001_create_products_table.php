<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('id_produk');
            $table->string('product_name');
            $table->string('product_size');
            $table->enum('promo', ['yes', 'no']);
            $table->integer('price');
            $table->text('product_description');
            $table->string('product_photo')->nullable();
            $table->enum('product_type', ['sepatu', 'aksesoris', 'baju']);
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
}
