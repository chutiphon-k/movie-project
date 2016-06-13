<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Itim&subset=thai,latin' rel='stylesheet' type='text/css'>
    <!-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
    @yield('style')
	<style type="text/css">
		** {
		    box-sizing: border-box;
		    margin: 0;
		    padding: 0;
		}
		body {
			background-image: url({{asset('image/bg.jpg')}});
			background-repeat: no-repeat;
			background-position: center;
			background-attachment: fixed;
			background-size: 100%;
			/*background: #eee;*/
		}
		.container{
			font-family: 'Itim', cursive;
			font-size: 150%;
		}
	</style>
</head>
<body>
	<!-- <nav class="navbar navbar-default navbar-static-top"> -->
	<div class="container" style="height:150px;margin-bottom:10px;">
		<p class="navbar-text navbar-left" style="margin:8% 0% 0% 0%;"><a href='{{url("/")}}' class="navbar-link"><button style="border-radius: 10px;background-color:white;color:#129fff;">Home</button></a></p>
		<p class="navbar-text navbar-left" style="margin:8% 0% 0% 0%;"><a href='{{url("/movie/add")}}' class="navbar-link"><button style="border-radius: 10px;background-color:white;color:#129fff;">Upload</button></a></p>
		<p class="navbar-text navbar-left" style="margin:8% 0% 0% 0%;"><a href='{{url("/search")}}' class="navbar-link"><button style="border-radius: 10px;background-color:white;color:#129fff;">Search</button></a></p>

	    @if(Auth::check())
		    <!-- <p class="text-right" style="margin-top:10px;"><img src="{{Auth::user()->avatar}}" height="50" width="50"/></p> -->
		    <a href='{{url("/profile",[Auth::user()->id])}}'><p class="text-right" style="color:white;margin-top:3%;"><img src="{{Auth::user()->avatar}}" height="50" width="50"/>  {{Auth::user()->name}}</p> 
			<p class="navbar-text navbar-right" style="margin:0% 0% 0% 0%;"><a href='{{url("auth/logout")}}' class="navbar-link"><button style="border-radius: 10px;background-color:white;color:#129fff;">Logout</button></a></p>
	        <!-- <a class="btn btn-info" href="auth/logout" role="button">Logout with Facebook</a> -->
	    @else
			<p class="navbar-text navbar-right" style="margin:8% 0% 0% 0%;"><a href='{{url("auth/facebook")}}' class="navbar-link"><button style="border-radius: 10px;background-color:white;color:#129fff;">Login with facebook</button></a></p>
	        <!-- <a class="btn btn-info" href="auth/facebook" role="button">Login with Facebook</a> -->
	    @endif
	</div>
	<div class="container" style="background: white;padding-top:1%;padding-bottom:50px;border-radius: 10px;">
		@yield('content')
	</div>
	@yield('script')

</body>
</html>