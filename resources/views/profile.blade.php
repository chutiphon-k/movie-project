@extends('layouts.bgpage')

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/movie.css')}}">
@stop

@section('content')
	<div class="page-header text-center">
		<h1>Profile</h1>
		<h1>{{$profile->name}}</h1>
	</div>
	<div class="text-center"><img src='{{$profile->avatar}}' style="width:200px;height:200px;"></div>
	<!-- <div>{{$profile->email}}</div> -->
	<h1>My reviews</h1>
	    <div class="box box--container">
	      <div class="box box--chat">
	        <ul id="chat-history">
	        	@foreach($reviews as $review)
	        		<li class="message message--me"><a href='{{url("/movie/show",[$review->movie->id])}}'><img src='{{url($review->movie->pic)}}' style="width:40px;height:40px;"></a> <b style="color:#2491F9;">{{$review->movie->name}}</b> : {{$review->info}}<b style="float: right;font-size:70%;color:white;">{{$review->created_at->diffForHumans()}}</b></li>
	        	@endforeach
	        </ul>
	      </div>
	    </div>
@stop
