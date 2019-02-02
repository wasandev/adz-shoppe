<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'name',
        'description',
        'is_published',
        'postimage',
        'postlink',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
