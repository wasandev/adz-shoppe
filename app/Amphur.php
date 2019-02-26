<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amphur extends Model
{
    protected $table = 'amphur';

    protected $fillable = [
        'amphur_code',
        'amphur_name',
        'province_code',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'province_code');

    }

    public function tambol()
    {
        return $this->hasMany('App\Tambol');
    }

    public function customer()
    {
        return $this->hasMany('App\Customer', 'amphur_code', 'amphur_code');
    }
}
