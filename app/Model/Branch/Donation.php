<?php

namespace App\Model\Branch;

use Illuminate\Database\Eloquent\Model;
use App\Model\Branch\Branch;

class Donation extends Model
{
    //

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
