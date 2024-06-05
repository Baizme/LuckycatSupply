<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWishlistsTable extends Migration
{
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('product_id')->references('id_produk')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
}

