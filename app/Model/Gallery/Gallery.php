<?php

namespace App\Model\Gallery;

use App\Model\Gallery\Image;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
