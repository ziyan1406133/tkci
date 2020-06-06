<?php

namespace App\Model\Accessory;

use Illuminate\Database\Eloquent\Model;
use App\Model\Accessory\Accessory;
use Cviebrock\EloquentSluggable\Sluggable;

class Seller extends Model
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

    public function accessories()
    {
        return $this->hasMany(Accessory::class);
    }
}
