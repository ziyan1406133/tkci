<?php

namespace App\Model\Branch;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public $timestamps = false;

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regency_id');
    }
}
