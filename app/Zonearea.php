<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zonearea extends Model
{
    protected $table = 'zonearea';

    protected $fillable = [
        'zone_id',
        'province_code',
        'amphur_code',
        'province_id',
        'amphur_id'
    ];

    public function zone()
    {
        return $this->belongsTo('App\Zone');
    }
    public function province()
    {
        return $this->belongsTo('App\Province');
    }
    public function amphur()
    {
        return $this->belongsTo('App\Amphur');
    }
}
