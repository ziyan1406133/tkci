<?php

namespace App\Model\Branch;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Model\Branch\Donation;
use App\Model\Wilayah\Provinsi;
use App\Model\Wilayah\Kabupaten;
use App\Model\Wilayah\Kecamatan;

class Branch extends Model
{
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'branch_name'
            ]
        ];
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'kabupaten_id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
