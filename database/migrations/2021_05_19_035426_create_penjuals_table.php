<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjuals', function (Blueprint $table) {
            $table->id('id_penjual');
            $table->string('nama_penjual', 25);
            $table->string('password_penjual');
            $table->string('email_penjual')->unique();
            $table->char('telp_penjual', 15);
            $table->text('alamat_penjual');
            $table->text('informasi_penjual')->nullable(true);
            $table->tinyInteger('rate')->default(3);
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
        Schema::dropIfExists('penjuals');
    }
}
