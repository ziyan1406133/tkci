<?php

namespace App\Model\Wilayah;

use Illuminate\Database\Eloquent\Model;
use App\Model\Wilayah\Kecamatan;
use App\Model\Wilayah\Provinsi;

class Kabupaten extends Model
{
    protected $table = 'wilayah_kabupaten';
    public $timestamps = false;

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_id');
    }
}
