@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Update Profile Photo</h3>
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
   			

   			<div class="col-lg-8">

          <form class="form-horizontal" action="{{url('change_photo')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
    
    <div class="form-group">
      <label class="control-label col-lg-6" for="email">Select Photo(*Maximum size 2 mb):</label>
      <div class="col-lg-6">
        <input type="file" class="form-control" id="pass"  name="photo">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-4 col-sm-5">
        <button type="submit" class="btn btn-primary">Update</button>
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
