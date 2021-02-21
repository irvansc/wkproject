<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kelas_id')->unsigned();
            $table->string('nip')->unique()->nullable();
            $table->string('nama_guru');
            $table->string('mapel');
            $table->string('tmp_lahir');
            $table->string('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->string('telp')->nullable();
            $table->string('jenkel')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('guru');
    }
}
