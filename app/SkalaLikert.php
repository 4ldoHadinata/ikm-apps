<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkalaLikert extends Model
{
    protected $table = 'skala_likert';

    protected $fillable = ['id_pelayanan', 'id_responden', 'id_soal', 'nilai'];

    public function pelayanan()
    {
        return $this->belongsTo(JenisPelayanan::class, 'id_pelayanan', 'id');
    }

    public function responden()
    {
        return $this->belongsTo(Responden::class, 'id_responden', 'id');
    }

    public function kuesioner()
    {
        return $this->belongsTo(Kuesioner::class, 'id_soal', 'id');
    }
}
