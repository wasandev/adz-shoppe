<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'customer_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function employee()
    {
        return $this->hasOne('App\Employee');
    }

    public function customer()
    {
        return $this->hasOne('App\Customer', 'customer_code', 'customer_code');
    }

    public function isAdmin()
    {
        $admin_emails = [
            'wasandev@gmail.com'
        ];

        return in_array($this->email, $admin_emails);
    }
}
