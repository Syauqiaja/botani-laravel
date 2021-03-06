<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('jenis_kelamin', 1);
            $table->string('password');
            $table->char('telepon', 30)->nullable();
            $table->string('foto_profil');
            $table->string('quote');
            $table->text('alamat');
            $table->tinyInteger('role');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    //
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
