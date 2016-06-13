<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\User;

use App\Movie;

use App\Review;

use Log;

class ProfileController extends Controller
{

    public function __construct(){
    	$this->middleware('auth');
    }

    function showProfile($id){
        $profile = User::find($id);
        $reviews = $profile->reviews()
                    ->orderBy('created_at','desc')
                    ->get();
    	return view('profile',['profile'=>$profile,'reviews'=>$reviews]);	
    }
}

