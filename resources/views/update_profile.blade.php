@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Update Details</h3>
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
   			

   			<div class="col-lg-5">

          <form class="form-horizontal" action="{{url('change_user_info')}}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
      <label class="control-label col-sm-2" for="name">Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter name" name="name" value="{{Auth::user()->name}}" required="1">
      </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{Auth::user()->email}}" required="1">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </form>
  <br>
  <a href="{{URL::to('/change_password')}}"><button type="submit" class="btn btn-info">Change Password</button></a>
   				

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
