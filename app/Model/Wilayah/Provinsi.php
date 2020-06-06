<?php

namespace App\Model\Wilayah;

use Illuminate\Database\Eloquent\Model;
use App\Model\Wilayah\Kabupaten;

class Provinsi extends Model
{
    protected $table = 'wilayah_provinsi';
    public $timestamps = false;

    public function kabupaten()
    {
        return $this->hasMany(Kabupaten::class, 'provinsi_id');
    }
}
