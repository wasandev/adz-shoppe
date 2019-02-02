<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bankacc extends Model
{
    protected $table = 'bankacc';

    protected $fillable = [
        'bacccode',
        'bankbrn',
        'baccname',
        'bacctype',
        'bankcode',
        'bank_id'
    ];

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
}
