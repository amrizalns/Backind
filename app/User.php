<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    protected $fillable = [
        'name', 'email', 'password','address','phone_number','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
      return $this->belongsTo(roles::class, 'id_roles');
    }

    public function business(){
        return $this->hasMany(business::class, 'id_user');
    }

    public function booking(){
        return $this->hasMany(booking_detail::class, 'id_user');
    }

    public function reviews(){
        return $this->hasMany(review::class,'id_user');
    }
}
