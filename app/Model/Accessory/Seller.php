<?php

namespace App\Model\Accessory;

use Illuminate\Database\Eloquent\Model;
use App\Model\Accessory\Accessory;

class Seller extends Model
{
    //
    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }
}
