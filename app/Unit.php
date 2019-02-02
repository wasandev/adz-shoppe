<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $fillable = [
        'unit_id',
        'unit_name',
    ];

    public function product_price()
    {
        return $this->hasMany('App\Product_price');
    }
}
