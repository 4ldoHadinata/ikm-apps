<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterViewHasil extends Migration
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
            SUM(skala_likert.nilai) /((3.841 * COUNT(jenis_pelayanan.id) *0.5 * 0.5) / ((COUNT(jenis_pelayanan.id)) - 1) * 0.05*0.05 + 3.841*0.5*0.5) * (1/COUNT(kuesioner.id)) *25 AS nilai_akhir,
            ((3.841 * COUNT(jenis_pelayanan.id) *0.5 * 0.5) / ((COUNT(jenis_pelayanan.id)) - 1) * 0.05*0.05 + 3.841*0.5*0.5) AS jumlah_sampel,
            CASE 
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 0 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 25 THEN \'SANGAT KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 25 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 50 THEN \'KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 50 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 75 THEN \'BAIK\'
                ELSE \'SANGAT BAIK\'
            END AS hasil
            FROM 
                jenis_pelayanan, 
                skala_likert,
                kuesioner
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
        DB::connection()->getPdo()->exec('
        ALTER VIEW hasil AS
            SELECT 
            jenis_pelayanan.nama_pelayanan, 
            SUM(skala_likert.nilai) /((3.841 * COUNT(jenis_pelayanan.id) *0.5 * 0.5) / ((COUNT(jenis_pelayanan.id)) - 1) * 0.05*0.05 + 3.841*0.5*0.5) * (1/COUNT(kuesioner.id)) *25 AS nilai_akhir,
            ((3.841 * COUNT(jenis_pelayanan.id) *0.5 * 0.5) / ((COUNT(jenis_pelayanan.id)) - 1) * 0.05*0.05 + 3.841*0.5*0.5) AS jumlah_sampel,
            CASE 
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 0 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 25 THEN \'SANGAT KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 25 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 50 THEN \'KURANG\'
                WHEN SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 >= 50 && SUM(skala_likert.nilai) /(4 * COUNT(jenis_pelayanan.id)) * 100 < 75 THEN \'BAIK\'
                ELSE \'SANGAT BAIK\'
            END AS hasil
            FROM 
                jenis_pelayanan, 
                skala_likert,
                kuesioner
            WHERE 
                jenis_pelayanan.id = skala_likert.id_pelayanan
            GROUP BY 
                jenis_pelayanan.id, jenis_pelayanan.nama_pelayanan;
        ');
    }
}
