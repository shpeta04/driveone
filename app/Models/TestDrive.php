<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestDrive extends Model
{
    protected $fillable = [
        'car_id',
        'name',
        'email',
        'phone',
        'preferred_date',
        'preferred_time',
        'message',
        ];

    public function car(){
        return $this->belongsTo(Car::class);
    }

}
