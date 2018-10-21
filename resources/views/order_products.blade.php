@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Order Products</h3>
	</div>
</div>

@endsection

@section('content')

<br>
<div class="container">
 <div class="panel panel-default">
    <div class="panel-heading">{{Auth::user()->name}}</div>
    <div class="panel-body">
   		
    <h3 class="text-center">My Orders</h3>
    <br>
    <div  class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
      <table class="timetable_sub">
        <thead>
          <tr>
           
            <th>Product</th>
            <th>Quantity</th>
            <th>Product Name</th>
            <th>Price BDT</th>
            <th>Order Date</th>
            <th>Delevery Date</th>
          </tr>
        </thead>
        
          <tr class="" >
            
            <td class="invert-image"><a href="single.html"><img src="{{asset('/storage/a8.png')}}" alt=" " class="img-responsive" /></a></td>
            <td class="invert">
               <div class="quantity"> 
                <div class="quantity-select">     

                   

                     
                  
                  <div class="entry value"><span>2</span></div>
                  
                </div>
              </div>
            </td>
            
            <td class="invert">Court</td>

            <td class="invert">5000</td>
           <td class="invert">5-3-2018</td>
           <td class="invert">5-4-2018</td>


            
          </tr>
         
            
        
          
              
      </table>
    </div>
    
  















   		 
	</div>
 </div>
</div>
 


@endsection

@include('layouts.login')
@section('footer')

@include('layouts.footer')

@endsection
