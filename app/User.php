<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','facebook_id','avatar'
    ];
    
    protected $hidden = [
        'remember_token',
    ];

    public function reviews(){
        return $this->hasMany('App\Review');
    }

    public function movies(){
        return $this->belongsToMany('App\Movie','reviews');
    }
}