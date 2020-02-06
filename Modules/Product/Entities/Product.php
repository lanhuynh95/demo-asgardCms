<?php

namespace Modules\Product\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // use Translatable;

    protected $table = 'product__products';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'price',
        'image',
        'description'
    ];

    public function getFeaturedImagesAttribute()
    {
        return $this->filesByZone('image')->get();
    }
}
