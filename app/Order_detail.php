<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table = 'order_detail';

    protected $fillable = [
        'order_header_no',
        'product_code',
        'order_detail_no',
        'od_qty',
        'od_unit_price',
        'unit_id',
        'prdrmk'
    ];

    public function order_header()
    {
        return $this->belongsTo('App\Order_header', 'order_header_no', 'order_header_no');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_code', 'product_code');
    }

    public function unit()
    {
        return $this->belongsTo('App\Unit', 'unit_id', 'unit_id');
    }
}
