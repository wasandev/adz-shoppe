<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_group extends Model
{
    protected $table = 'product_group';

    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany('App\product');
    }
}
