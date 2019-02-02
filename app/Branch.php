<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';

    protected $fillable = [
        'branch_code',
        'branch_name',
        'branch_add',
        'branch_tel',
        'branch_fax',
    ];

    public function branch_zone()
    {
        return $this->hasMany('App\Branch_zone', 'branch_code', 'branch_code');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee');
    }

    public function order_header()
    {
        return $this->hasMany('App\Order_header', 'branch_code', 'branch_code');
    }

    public function order_header_rec()
    {
        return $this->hasMany('App\Order_header', 'branch_rec', 'branch_code');
    }

}
