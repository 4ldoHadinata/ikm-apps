<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    protected $table = 'responden';

    protected $fillable = ['nama', 'nik', 'jenis_kelamin', 'usia', 'pendidikan', 'pekerjaan'];
}
