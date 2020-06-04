<?php

namespace App\Model\Article;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article\Article;

class Category extends Model
{
    //

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
