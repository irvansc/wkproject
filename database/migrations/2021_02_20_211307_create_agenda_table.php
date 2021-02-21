<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->text('deskripsi')->nullable();
            $table->date('mulai')->nullable();
            $table->date('selesai')->nullable();
            $table->string('tempat')->nullable();
            $table->string('waktu')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('author')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agenda');
    }
}
