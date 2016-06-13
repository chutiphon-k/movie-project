<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	protected $fillable = [
        'name','pic','info','teaser_url','in_theater'
    ];

    public function reviews(){
    	return $this->hasMany('App\Review');
    }

    public function users(){
    	return $this->belongsToMany('App\User','reviews');
    }
}
