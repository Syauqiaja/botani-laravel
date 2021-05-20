<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogspotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogspots', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_blogspot');
            $table->text('isi_blogspot');
            $table->string('video')->nullable(true);
            $table->string('foto')->nullable(true);
            $table->bigInteger('id_penjual');
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
        Schema::dropIfExists('blogspots');
    }
}
