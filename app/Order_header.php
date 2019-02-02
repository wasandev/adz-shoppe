<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_header extends Model
{
    protected $table = 'order_header';
    protected $casts = [
        'order_header_date' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d',
        'systime' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'car_registe',
        'order_header_no',
        'customer_code',
        'employee_code',
        'customer_recive_code',
        'order_header_date',
        'order_header_print_one',
        'order_header_bill_flag',
        'order_header_cancel_flag',
        'order_header_recive_flag',
        'order_header_payment_flag',
        'waybill_no',
        'checker',
        'dbn_flag',
        'branch_code',
        'branch_rec',
        'order_date',
        'order_rmk',
        'tranflag',
        'payflag',
        'brncar',
        'recdate',
        'recname',
        'brnsendflag',
        'brnrecdate',
        'brnrecflag',
        'systime',
        'empedit',
        'brnrecname',
        'orderamount',
        'serviceamt',
        'serviceflag',
        'servicerecflag',
        'orderrefno',
        'fromdb',
        'recempcode',
        'pricetype',
    ];


    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_code', 'customer_code');
    }

    public function customer_recieve()
    {
        return $this->belongsTo('App\Customer', 'customer_recive_code', 'customer_code');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_code', 'branch_code');
    }
    public function branch_rec()
    {
        return $this->belongsTo('App\Branch', 'branch_rec', 'branch_code');
    }

    public function order_detail()
    {
        return $this->hasMany('App\Order_detail', 'order_header_no', 'order_header_no');
    }
}
