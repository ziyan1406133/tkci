<?php

namespace App\Model\Accessory;

use Illuminate\Database\Eloquent\Model;
use App\Model\Accessory\Seller;

class Accessory extends Model
{
    //
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
