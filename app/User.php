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
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function items() {
        return $this->hasMany('App\Inventory');
    }

    public function restocks() {
        return $this->hasMany('App\Restock');
    }

    public function recipes() {
        return $this->hasMany('App\Recipe');
    }

    public function reviews() {
        return $this->hasMany('App\Review');
    }
}
