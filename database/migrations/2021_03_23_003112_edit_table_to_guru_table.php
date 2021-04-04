<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditTableToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->text('fb')->nullable()->after('photo');
            $table->text('ig')->nullable()->after('fb');
            $table->text('twitter')->nullable()->after('ig');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->text('fb')->nullable()->after('photo');
            $table->text('ig')->nullable()->after('fb');
            $table->text('twitter')->nullable()->after('ig');
        });
    }
}