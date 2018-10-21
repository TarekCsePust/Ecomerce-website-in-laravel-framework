@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Recharge Account</h3>
	</div>
</div>

@endsection

@section('content')

<br>
<div class="container">
 <div class="panel panel-default">
    <div class="panel-heading">{{Auth::user()->name}}</div>
    <div class="panel-body">
   		<div class="row">
   			

   			<div class="col-lg-7">

          <form class="form-horizontal" action="{{url('recharge')}}" method="POST">
              {{csrf_field()}}
    
    <div class="form-group">
      <label class="control-label col-lg-6" for="email">Secrite Number:</label>
      <div class="col-lg-6">
        <input type="text" class="form-control" id="pass" placeholder="Enter secrite number" name="sec_num">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-5">
        <button type="submit" class="btn btn-primary">Recharge</button>
      </div>
    </div>
  </form>
  
   				

   			</div>
   			
   		</div>

   		 
	</div>
 </div>
</div>
 


@endsection

@include('layouts.login')
@section('footer')

@include('layouts.footer')

@endsection
