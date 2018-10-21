<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	
	 <link rel="icon" type="image/ico" href="{{asset('/storage/favicon.ico')}}">

	 <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" rel="stylesheet">

	 <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

	  <link href="{{ asset('vendors/nprogress/nprogress.css') }}"  rel="stylesheet">

	  <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}"  rel="stylesheet">

	  <link href="{{ asset('vendors/google-code-prettify/bin/prettify.min.css') }}"  rel="stylesheet">

	   <link href="{{ asset('vendors/switchery/dist/switchery.min.css') }}"  rel="stylesheet">

	    <link href="{{ asset('vendors/starrr/dist/starrr.css') }}"  rel="stylesheet">


	  <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"  rel="stylesheet">

	 <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">

	 <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">

	  <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">






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
<body class="nav-md">
 <div class="container body">
      <div class="main_container">
	
	
		
		@section('sidebar')
  		@show
	



		
			@section('content')
  			@show
		


		
			@section('footer')
  			@show
		


	</div>

</div>
	
	


			<!-- jQuery library -->

	

	
</body>
</html>