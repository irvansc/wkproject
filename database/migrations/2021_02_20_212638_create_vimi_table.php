<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVimiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vimi', function (Blueprint $table) {
            $table->id();
            $table->text('visi');
            $table->text('misi');
            $table->text('tujuan')->nullable();
            $table->timestamp('tanggal')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vimi');
    }
}
