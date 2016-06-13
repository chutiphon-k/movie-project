<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
    	'movie_id','user_id','info','feel'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function movie(){
    	return $this->belongsTo('App\Movie');
    }
}
