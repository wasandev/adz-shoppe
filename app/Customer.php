<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = [
        'customer_code',
        'customer_title',
        'province_code',
        'amphur_code',
        'customer_name',
        'customer_addr1',
        'customer_addr2',
        'customer_phone',
        'customer_fax',
        'customer_contact',
        'customer_start',
        'customer_taxid',
        'customer_flag',
        'customer_status',
        'insert_time',
        'credit_term',
        'ar_flag',
        'credit_amount',
        'tambol_code',
        'email',
        'mobilephone',
        'province_id',
        'amphur_id',
        'user_id',
    ];




    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'province_code');
    }

    public function amphur()
    {
        return $this->belongsTo('App\Amphur', 'amphur_code', 'amphur_code');
    }


    public function tambol()
    {
        return $this->belongsTo('App\tambol', 'tambol_code', 'tambol_code');
    }

    public function order_header()
    {
        return $this->hasMany('App\Order_header', 'customer_code', 'customer_code');
    }

    public function order_header_rec()
    {
        return $this->hasMany('App\Order_header', 'customer_recive_code', 'customer_code');
    }

}
