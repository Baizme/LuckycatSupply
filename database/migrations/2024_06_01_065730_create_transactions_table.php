<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->decimal('total_harga', 10, 2);
            $table->timestamp('tanggal_transaksi')->useCurrent();
            $table->string('email', 255);
            $table->string('no_hp', 20);
            $table->text('alamat');
            $table->string('metode_pembayaran', 20);
            $table->enum('kurir', ['JNE', 'JNT', 'Anteraja']);
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_produk')->references('id_produk')->on('products')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
