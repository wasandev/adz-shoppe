<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_price extends Model
{
    protected $table = 'product_price';

    protected $fillable = [
        'product_code',
        'product_name',
        'amphur_code',
        'province_code',
        'price_a',
        'unit_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_code', 'product_code');
    }

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'Province_code');
    }
    public function amphur()
    {
        return $this->belongsTo('App\Amphur', 'amphur_code', 'amphur_code');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'unit_id');
    }
}
