<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisPelayanan extends Model
{
    protected $table= 'jenis_pelayanan';

    protected $fillable = ['nama_pelayanan', 'id_bidang'];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang', 'id');
    }
}
