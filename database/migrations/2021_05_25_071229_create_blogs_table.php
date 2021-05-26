<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama_blog');
            $table->text('isi_blog');
            $table->string('video')->nullable(true);
            $table->string('foto')->nullable(true);
            $table->bigInteger('id_toko')->nullable(true);
            $table->bigInteger('id_user');
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
        Schema::dropIfExists('blogs');
    }
}
