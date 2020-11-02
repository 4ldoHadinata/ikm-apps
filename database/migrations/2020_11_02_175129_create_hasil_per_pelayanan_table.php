<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPerPelayananTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE VIEW hasil_per_pelayanan AS
        SELECT 
            nama_pelayanan, 
            ROUND(SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)), 2) as nilai_akhir,
            CASE 
            WHEN SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) <= 100 && SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) *25 >= 88.31 THEN \'SANGAT BAIK\'
            WHEN SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) <= 88.30 && SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) *25 >= 76.61 THEN \'BAIK\'
            WHEN SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) <= 76.60 && SUM(nilai_akhir/(SELECT COUNT(*) FROM kuesioner)) *25 >= 65.00 THEN \'KURANG BAIK\'
                ELSE \'TIDAK BAIK\'
            END AS hasil
        FROM `hasil_per_unsur`
        GROUP BY nama_pelayanan
      ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW IF EXISTS hasil_per_pelayanan');
    }
}
