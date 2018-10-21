@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner')

@endsection

@section('content')

<div class="container">
	<br>
	<h6 style="color: red"><b>*Before order product you have to need sufficeint valence in your account.</b></h6>
	<br>
	<div class="col-md-6">
		
	
  <h3>Shipping Address</h3>
  <form action="/action_page.php">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control"  placeholder="Enter name" name="name">
    </div>
    <div class="form-group">
      <label for="number">Mobline no:</label>
      <input type="Number" class="form-control"  placeholder="Enter mobile no" name="mobile">
    </div>

    <div class="form-group">
      <label for="name">Country:</label>
      <input type="text" class="form-control"  placeholder="Enter country" name="country">
    </div>

    <div class="form-group">
      <label for="name">City:</label>
      <input type="text" class="form-control"  placeholder="Enter city" name="city">
    </div>

    <div class="form-group">
      <label for="name">Area:</label>
      <input type="text" class="form-control"  placeholder="Enter area" name="area">
    </div>

    <div class="form-group">
      <label for="name">Address:</label>
      <textarea class="form-control" rows="5" name="address"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Order</button>
  </form>

  </div>
  <div class="col-md-5 col-lg-offset-1">
  	<h3>Checkout summary</h3>
  	<p>Payment Details</p>
  	<br>
  	<table class="table table-striped">
   
    <tbody>
      <tr>
        <td><b>Subtotal</b></td>
        <td>{{$total}} Tk</td>
        
      </tr>
      <tr>
        <td><b>Shipping</b></td>
        <td>0.0 Tk</td>
      </tr>
      <tr>
        <td><b>Total</b></td>
        <td>{{$total}} Tk</td>
      </tr>
      
    </tbody>
  </table>
  </div>
  <br>
</div>
<br>

@endsection

@section('footer')

@include('layouts.footer')

@endsection
