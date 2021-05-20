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
            $table->id('id');
            $table->string('nama', 25);
            $table->string('password');
            $table->string('email')->unique();
            $table->char('telp', 15);
            $table->text('alamat');
            $table->text('informasi')->nullable(true);
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
