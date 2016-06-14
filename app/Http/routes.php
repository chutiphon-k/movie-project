<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'MovieController@getAllMovie');

Route::get('login', array('uses' => function(){
  return redirect('/');
}));

Route::get('/movie/add', 'MovieController@addMovie');

Route::post('/movie/store', 'MovieController@store');

Route::get('/movie/delete', 'MovieController@delete');

Route::get('/movie/show/{id}', 'MovieController@showMovie');

Route::get('/profile/{id}', 'ProfileController@showProfile');

Route::post('/storeReview', 'MovieController@storeReview');

Route::get('/search', function () {
    return view('search');
});

Route::get('auth/logout', 'Auth\AuthController@logout');
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');