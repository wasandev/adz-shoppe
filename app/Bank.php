<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'bankcode',
        'bankname',
    ];

    public function bankacc()
    {
        return $this->HasMany('App\Bankacc');
    }
}
