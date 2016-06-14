<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use App\Review;

use App\Movie;

use App\User;

use Log;

class MovieController extends Controller
{
    public function __construct(){
    	$this->middleware('auth',['except'=>['getAllMovie']]);
    }

	function getAllMovie(){
		$movies = Movie::orderBy('created_at','desc')->paginate(12);
		return view('home',compact('movies'));
    }

    function addMovie(){
    	return view('addmovie');
    }

    function store(Request $request){
		$name = $request->input('name');
		$info = $request->input('info');
		$teaser = $request->input('teaser');
		$teaser = "https://www.youtube.com/embed/".substr($teaser,((strpos($teaser,"h?v=") | (strpos($teaser,".be/"))))+4)."?rel=0";
		$public_path = '';
		$image_name = '';
		if($request->hasFile('image')){
			$image_filename = $request->file('image')->getClientOriginalName(); 
			$image_name = date('Ymd-His-').$image_filename;
			$public_path = 'image/movie/';
			$destination = base_path() . "/public/" . $public_path; 
			$request->file('image')->move($destination, $image_name); 
		}

		Movie::create([
			'name' => $name,
			'pic' => $public_path.$image_name,
			'info' => $info,
			'teaser_url' => $teaser
		]);
    	return redirect('/movie/add');
    }

    function showMovie($id){
    	$movie = Movie::find($id);
    	$reviews = $movie->reviews()
    				->join('users','reviews.user_id','=','users.id')
					->select('user_id','name','info','avatar','reviews.created_at')
    				->orderBy('created_at','desc')
    				->get();
    	return view('movie',['movie'=>$movie,'reviews'=>$reviews]);
    }

    function storeReview(Request $request){
    	$dataReview = $request->input('dataReview');
		$x = Review::create([
			'movie_id' => $dataReview['movie_id'],
			'user_id' => $dataReview['user_id'],
			'info' => $dataReview['info'],
			'feeling' => 1
		]);
		return $x->created_at->diffForHumans();
    }

    function delete(Request $request){
    	$id = $request->input('id');
    	$movie = Movie::find($id);
    	$movie->reviews()->delete();
    	$movie->delete();
    	return "OK";
    }


}
