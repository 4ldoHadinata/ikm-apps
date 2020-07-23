<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifySkalaLikertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skala_likert', function (Blueprint $table) {
            $table->dropColumn('jumlah_responden');
            $table->dropColumn('nilai_akhir');
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
            $table->integer('jumlah_responden')->after('nilai');
            $table->integer('nilai_akhir')->after('jumlah_responden');
        });
    }
}
