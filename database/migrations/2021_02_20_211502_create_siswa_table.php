<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id')->unsigned();
            $table->string('nama');
            $table->string('nis')->unique();
            $table->text('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
}
