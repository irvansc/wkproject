<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToEktrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ektras', function (Blueprint $table) {
            $table->enum('status', ['wajib', 'pilihan'])->nullable()->after('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ektras', function (Blueprint $table) {
            $table->enum('status', ['wajib', 'pilihan'])->nullable()->after('keterangan');
        });
    }
}