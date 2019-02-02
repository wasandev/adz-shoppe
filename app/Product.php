<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = [
        'product_code',
        'product_name',
    ];



    public function product_price()
    {
        return $this->hasMany('App\Product_price', 'product_code', 'product_code');
    }
}