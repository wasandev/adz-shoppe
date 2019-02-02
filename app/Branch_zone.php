<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch_zone extends Model
{
    protected $table = 'branch_zone';

    protected $fillable = [
        'branch_code',
        'province_code',
        'amphur_code',
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'province_code');
    }

    public function amphur()
    {
        return $this->belongsTo('App\Amphur');
    }
}
