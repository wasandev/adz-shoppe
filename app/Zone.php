<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $table = 'zone';

    protected $fillable = [
        'zone_name',
    ];

    public function zonearea()
    {
        return $this->hasMany('App\Zonearea');
    }

    public function product_price()
    {
        return $this->hasMany('App\Product_price');
    }
}
