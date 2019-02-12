<?php

namespace App;


//use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //use Searchable;
    protected $casts = [
        'order_header_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'order_header_no',
        'order_header_date',
        'customer_code',
        'cname',
        'customer_recive_code',
        'sname',
        'car_registe',
        'branchname',
        'branchphone',
        'order_status',
        'amphur_name',
        'province_name',
    ];
}
