<?php

namespace App\Model\Article;

use Illuminate\Database\Eloquent\Model;
use App\Model\Article\Article;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
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
                'source' => 'name'
            ]
        ];
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class)->where('status', 'Published');
    }
}
