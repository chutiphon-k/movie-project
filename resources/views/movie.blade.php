@extends('layouts.bgpage')

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/movie.css')}}">
@stop

@section('script')
	<script src="{{url('assets/js/movie.js')}}"></script>
@stop

@section('content')
		<div class="page-header text-center"><h1>{{$movie->name}}</h1></div>
		<div class="row">
		  <div class="col-md-4 text-center"><img src='{{url("$movie->pic")}}' style="width:184px;height:284px;border: 2px solid black;"></div>
		  <div class="col-md-8 text-left" style="border: 5px solid #eee;height:284px;width:720px;overflow: auto;"><div style="margin:10px">&emsp;{{$movie->info}}</div></div>
		</div>
		<br>
		<div class="row">
		  <div class="text-center"><iframe width="640" height="360" src="{{$movie->teaser_url}}" frameborder="0" allowfullscreen></iframe></div>
	    <div class="box box--container">
	      <div class="box box--chat">
	        <ul id="chat-history">
	        	@foreach($reviews as $review)
	        		<li class="message message--me">
	        			<a href='{{url("/profile",[$review->user_id])}}'><img src='{{url("$review->avatar")}}' style="width:40px;height:40px;"></a>
	        			<b style="color:#2491F9;">{{$review->name}}</b> : {{$review->info}} 
	        			<b style="float: right;font-size:70%;color:white;">{{$review->created_at->diffForHumans()}}</b>
	        		</li>
	        	@endforeach
	        </ul>
	        <form id="chat-form">
	          <div>
		          <input type="hidden" value="{{$movie->id}}" id="movie_id">
		          <input type="hidden" value="{{Auth::user()->id}}" id="user_id">
		          <input type="hidden" value="{{Auth::user()->avatar}}" id="user_avatar">	          	
		          <input type="hidden" value="{{Auth::user()->name}}" id="user_name">	          		          	
	          </div>
	          <input type="text" id="chat-message" autocomplete="off" placeholder="Enter message here..." class="box">
	        </form>
	      </div>
	    </div>
		</div>
@stop
