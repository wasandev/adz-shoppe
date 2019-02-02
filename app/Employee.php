<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'employee_code',
        'employee_name',
        'user_id',
        'branch_code',
        'branch_id'
    ];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
