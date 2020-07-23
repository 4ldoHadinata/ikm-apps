<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW hasil AS
            SELECT 
                jenis_pelayanan.nama_pelayanan, 
                SUM(skala_likert.nilai) div(COUNT(jenis_pelayanan.id)) AS nilai_akhir
            FROM 
                jenis_pelayanan, 
                skala_likert 
            WHERE 
                jenis_pelayanan.id = skala_likert.id_pelayanan
            GROUP BY 
                jenis_pelayanan.id, jenis_pelayanan.nama_pelayanan;
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS hasil');
    }
}
