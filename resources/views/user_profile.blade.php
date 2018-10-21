@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Profile Details</h3>
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
   			<div class="col-lg-2 col-lg-offset-1">
   				  <img alt="..." src="{{asset('/storage/'.Auth::user()->image)}}" class="img-circle profile_img" height="100" width="130">
   				  <a href="{{URL::to('/update_photo')}}">Update Photo</a>
   			</div>

   			<div class="col-lg-5">
   				 <table class="table">
   
    <tbody>
      <tr>
        <td>Name</td>
        <td><b>{{Auth::user()->name}}</b></td>
       
      </tr>
      <tr>
        <td>Email</td>
        <td><b>{{Auth::user()->email}}</b></td>
     
      </tr>
      <tr>
        <td>Balance</td>
        <td><b>{{round(Auth::user()->valence,2)}} Tk</b></td>
       
      </tr>
      <tr>
        <td> <a href="{{URL::to('/update_profile')}}"><button type="button" class="btn btn-info">Update</button></a>
        <a href="{{URL::to('/order_products')}}"><button type="button" class="btn btn-success">Order Products</button></a>
       </td>
        
      </tr>

    </tbody>
  </table>

   			</div>
   			
   		</div>

   		 <a href="{{URL::to('/recharge_account')}}"><button type="button" class="pull-right  btn btn-success">Recharge Acount</button></a>
	</div>
 </div>
</div>
 


@endsection

@include('layouts.login')
@section('footer')

@include('layouts.footer')

@endsection
