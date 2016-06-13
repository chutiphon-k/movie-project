@extends('layouts.bgpage')

@section('content')
	<div class="page-header text-center"><h1>Movie</h1></div>
	<div class="row">
	@foreach($movies as $movie)
		<div class="col-md-3 text-center" style="margin-top:10px;margin-bottom:10px;">
			<a href='{{url("movie/show",[$movie->id])}}' style="color: inherit;text-decoration: none;">
			 	<div style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">{{$movie->name}}</div>
				<img src='{{url("$movie->pic")}}' style="width:184px;height:273px;border: 2px solid black;">
			</a>
		</div>
	@endforeach
	</div>
	<div class="row">
		<div class="text-center">{!! $movies->render() !!}</div>
	</div>
@stop