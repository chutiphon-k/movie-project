@extends('layouts.bgpage')

@section('content')
<form enctype="multipart/form-data" action="{{url('/movie/store')}}" method="post">
	<div class="block">
	    <label style="display: inline-block;text-align: middle;">Name : </label>
  		<input type="text" name="name"><br>
	</div>
  	<label style="display: inline-block;">Select a file: </label><input type="file" name="image">
	<label style="display: table-cell;vertical-align: middle;">Informaion : </label><textarea rows="4" cols="50" name="info"></textarea><br>
	Teaser : <input type="text" name="teaser"><br>
	Directed :<br>
	Generes :<br>
	In Theater : <br>	
  	<input type="submit">
</form>
@stop