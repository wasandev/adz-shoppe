<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';

    protected $fillable = [
        'car_regist',
        'car_flag',
        'owner_code',
    ];

    public function owner()

    {
        return $this->belongsTo('App\Owner');

    }
}
