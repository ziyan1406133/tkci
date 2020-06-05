<?php

namespace App\Model\Gallery;

use Illuminate\Database\Eloquent\Model;
use App\Model\Gallery\Gallery;

class Image extends Model
{
    //
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
