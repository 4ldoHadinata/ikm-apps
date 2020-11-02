<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPerUnsurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW hasil_per_unsur AS
        SELECT 
        jenis_pelayanan.nama_pelayanan, 
        ROUND(SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25, 2) AS nilai_akhir,
        ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5))) AS jumlah_sampel,
        kuesioner.soal,
            CASE 
            WHEN SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 <= 100 && SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 >= 88.31 THEN \'SANGAT BAIK\'
            WHEN SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 <= 88.30 && SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 >= 76.61 THEN \'BAIK\'
            WHEN SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 <= 76.60 && SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN skala_likert.nilai ELSE 0 END) /(ROUND((3.841 * SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) *0.5 * 0.5) / ((SUM(CASE WHEN skala_likert.id_soal = kuesioner.id and skala_likert.id_pelayanan = jenis_pelayanan.id THEN 1 ELSE 0 END) - 1) * (0.05*0.05) + (3.841*0.5*0.5)))) *25 >= 65.00 THEN \'KURANG BAIK\'
            ELSE \'TIDAK BAIK\'
        END AS hasil
        FROM 
            skala_likert,
            jenis_pelayanan,
            kuesioner
        WHERE
            skala_likert.id_pelayanan = jenis_pelayanan.id
            AND skala_likert.id_soal = kuesioner.id
        GROUP BY 
        jenis_pelayanan.id, jenis_pelayanan.nama_pelayanan, kuesioner.id, kuesioner.soal
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS hasil_per_unsur');
    }
}
