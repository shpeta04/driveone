<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title',
        'slug',
        'brand',
        'model',
        'year',
        'mileage',
        'fuel_type',
        'transmission',
        'price',
        'description',
        'is_sold',

    ];

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
