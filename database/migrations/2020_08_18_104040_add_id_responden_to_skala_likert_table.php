<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdRespondenToSkalaLikertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skala_likert', function (Blueprint $table) {
            $table->integer('id_responden')->after('id_pelayanan')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skala_likert', function (Blueprint $table) {
            $table->dropColumn('id_responden');
        });
    }
}
