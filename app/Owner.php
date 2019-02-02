<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $table = 'owner';

    protected $fillable = [
        'owner_code',
        'owner_name',
        'owner_add1',
        'owner_phone',
        'owner_use_flag',
        'owner_mobile',
        'owner_flag',
        'owner_remark',
        'owner_idcode',
        'owner_taxid',
        'owner_accno',
        'owner_bank',
        'owner_bankbrn',
        'owner_paydate',
        'owner_accname',
    ];

    public function car()

    {
        return $this->HasMany('App\Car');

    }
}
