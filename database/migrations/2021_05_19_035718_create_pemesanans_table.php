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
            $table->id('id_pemesanan');
            $table->bigInteger('id_produk');
            $table->bigInteger('id_pelanggan');
            $table->string('bukti_path');
            $table->string('ekspedisi');
            $table->date('batas_pembayaran');
            $table->text('alamat_pengiriman');
            $table->date('tanggal_pemesanan');
            $table->bigInteger('id_penjual');
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
