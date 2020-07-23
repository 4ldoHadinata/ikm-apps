<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkalaLikert extends Model
{
    protected $table = 'skala_likert';

    protected $fillable = ['id_pelayanan', 'nilai'];

    public function pelayanan()
    {
        return $this->belongsTo(JenisPelayanan::class, 'id_pelayanan', 'id');
    }
}
