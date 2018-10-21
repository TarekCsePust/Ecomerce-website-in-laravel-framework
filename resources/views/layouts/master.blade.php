<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); }
	</script>

	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" media="all">
	 <link href="{{ asset('css/rating.css') }}" rel="stylesheet" media="all">
	 <link href="{{ asset('css/style.css') }}" rel="stylesheet" media="all">
	 <link href="{{ asset('css/flexslider.css') }}" rel="stylesheet" media="screen">
	 <link href="{{asset('css/pignose.layerslider.css') }}" rel="stylesheet" media="all">
	 <script src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
	 <script src="{{ asset('js/imagezoom.js') }}"></script>
	 <script src="{{ asset('js/jquery.flexslider.js') }}"></script>
	 <script src="{{ asset('js/simpleCart.min.js') }}"></script>
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="{{ asset('js/bootstrap-3.1.1.min.js') }}"></script>
	 <link href="{{ asset('fonts') }}" rel='stylesheet' type='text/css'>
	  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>
	 <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<!--
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	 <link rel="stylesheet" type="text/css" 
  	 href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  	 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script type="text/javascript" 
		 src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	
		<script 
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


-->

</head>
<body>
	
	<div class="container-fluid">
		<div class="row">
		@section('header')
  		@show
		</div>

		<div class="row">
		@section('banner')
  		@show
		</div>


		<div class="row">
			@section('content')
  			@show
		</div>

		<div class="row">
			@section('footer')
  			@show	  
		</div>

	</div>
	
	


			<!-- jQuery library -->

	

	
</body>
</html>