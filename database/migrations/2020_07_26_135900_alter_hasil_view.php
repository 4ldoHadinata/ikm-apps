<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterHasilView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::connection()->getPdo()->exec('
        ALTER VIEW hasil AS
            SELECT 
            jenis_pelayanan.nama_pelayanan, 
            SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 AS nilai_akhir,
            CASE 
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 0 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 25 THEN \'SANGAT KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 25 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 50 THEN \'KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 50 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 75 THEN \'BAIK\'
                ELSE \'SANGAT BAIK\'
            END AS hasil
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
        DB::statement('
        ALTER VIEW hasil AS
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
}
