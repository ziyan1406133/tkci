<?php

namespace App\Model\Accessory;

use Illuminate\Database\Eloquent\Model;
use App\Model\Accessory\Seller;
use Cviebrock\EloquentSluggable\Sluggable;

class Accessory extends Model
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

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
