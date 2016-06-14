action='{{url("/movie/show",[$movie->id])}}'


@extends('layouts.bgpage')

@section('style')
    <link rel="stylesheet" href="{{url('assets/css/movie.css')}}">
@stop

@section('script')
	<script>
	      $('#chat-form').submit(function() {
			var review_message = $('#chat-message').val();
			if(review_message){
	            var dataReview = {};
	            dataReview.movie_id = {{$movie->id}};
	            dataReview.user_id = {{Auth::user()->id}};
	            dataReview.info = review_message;

                $.ajax({
                	url: '{{url("/storeReview")}}',
                	type: "post",
                	data: {'dataReview': dataReview},
		   		})
		   		.done(function(result){
					var person = {
					    a: '{{url("/profile",[Auth::user()->id])}}',
					    b: '{{url(Auth::user()->avatar)}}',
					    e: ' {{Auth::user()->name}}',
					    c: review_message,
					    d: result
					};
					var template = '<li class="message message--me">'+
				        			'<a href=@{{a}}><img src=@{{b}} style="width:40px;height:40px;"></a>'+
				        			'<b style="color:#2491F9;">@{{e}}</b> : @{{c}}'+
				        			'<b style="float: right;font-size:70%;color:white;">@{{d}}</b>'+
					        		'</li>';
					var html = Mustache.to_html(template, person);
					$('#chat-history').prepend(html);

				})
				.fail(function() {
				    alert( "error" );
				});
	            $('#chat-history')[0].scrollDown = $('#chat-history')[0].scrollHeight;
		      }
	          $(this)[0].reset();
	          return false;
	      });
	</script>
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
	          <input type="text" id="chat-message" autocomplete="off" placeholder="Enter message here..." class="box">
	        </form>
	      </div>
	    </div>
		</div>
@stop
