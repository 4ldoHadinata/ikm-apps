<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkalaLikert extends Model
{
    protected $table = 'skala_likert';

    protected $fillable = ['id_pelayanan', 'nilai', 'id_soal'];

    public function pelayanan()
    {
        return $this->belongsTo(JenisPelayanan::class, 'id_pelayanan', 'id');
    }

    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class, 'id_soal', 'id');
    }
}
