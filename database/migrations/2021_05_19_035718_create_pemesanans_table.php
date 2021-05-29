<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_produk');
            $table->bigInteger('id_user');
            $table->bigInteger('id_toko');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('ekspedisi')->nullable();
            $table->int('kuantitas');
            $table->bigInteger('total_harga');
            $table->date('batas_pembayaran');
            $table->text('alamat_pengiriman')->nullable();
            $table->date('tanggal_pemesanan');
            $table->date('tanggal_pembayaran')->nullable();
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
        Schema::dropIfExists('pemesanans');
    }
}
