<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tambol extends Model
{
    protected $table = 'tambol';

    protected $fillable = [
        'tambol_code',
        'tambol_name',
        'amphur_code',
        'province_code',
        'province_id',
        'amphor_id',
    ];

    public function province()
    {
        return $this->belongsTo('App\Province');

    }

    public function amphur()
    {
        return $this->belongsTo('App\Amphur');

    }
}
