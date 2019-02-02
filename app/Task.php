<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function GuzzleHttp\Promise\task;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_active',
        'taskimage',
        'tasklink',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
