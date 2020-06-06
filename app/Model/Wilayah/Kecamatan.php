<?php

namespace App\Model\Wilayah;

use Illuminate\Database\Eloquent\Model;
use App\Model\Wilayah\Kabupaten;

class Kecamatan extends Model
{
    protected $table = 'wilayah_kecamatan';
    public $timestamps = false;

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }
}
