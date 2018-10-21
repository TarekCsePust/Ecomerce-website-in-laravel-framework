@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>

@endsection

@section('content')
<!-- check out -->
<div class="checkout">
	<br>
	
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div  class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Price BDT</th>
					</tr>
				</thead>
				{{csrf_field()}}
				    <?php $c=1 ?>
  				    @foreach($cart_products as $cart_product)
					<tr class="rem{{$c}}" >
						<td class="invert-closeb">
							<div class="rem">
								<div class="remove{{$c}}">
									<a   class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove"></span></a>
								 </div>
							</div>
							
						</td>
						<td class="invert-image"><a href="single.html"><img src="{{asset('/storage/'.$cart_product['image'])}}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">     

								    @if($cart_product['offere_price']>0)      
								    <div class="single_price" style="display: none;">{{$cart_product['offere_price']}}</div>
								    @else
								    <div class="single_price" style="display: none;">{{$cart_product['actual_price']}}</div>
								    @endif

								     <div class="no" style="display: none;">{{$c}}</div>

									<div class="entry value-minus">&nbsp;</div>
									<div class="entry value"><span>{{$cart_product['quantity']}}</span></div>
									<div class="entry value-plus active">&nbsp;</div>
								</div>
							</div>
						</td>
						<input type="hidden" id="pro_id{{$c}}" value="{{$cart_product['id']}}">
						<td class="invert">{{$cart_product['name']}}</td>

						@if($cart_product['offere_price']>0)
						<td id="price{{$c}}" class="invert">{{$cart_product['offere_price']*$cart_product['quantity']}}</td>
						@else
						<td id="price{{$c}}" class="invert">{{$cart_product['actual_price']*$cart_product['quantity']}}</td>
						@endif


						<script>$(document).ready(function(c) {
								var i=<?php echo $c ?>;
								$(".remove"+i+"").on('click', function(c){

									var tk = $("#price"+i+"").text();
									var total = $("#total").text();
									console.log(total);
									var rem = total-tk;
									$("#total").text(Number(rem).toFixed(2));

									$(".rem"+i+"").fadeOut('slow', function(c){
										$(".rem"+i+"").remove();
									});


									var id = $("#pro_id"+i+"").val();

									console.log(id);


									$.post('http://localhost:8000/removeCart',{'id':id,'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					$('#Cart_quantity').text(data);
					//$('#products').hide();
	               //location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text
	          	          });





									


									});	  
								});
						   </script>
					</tr>
					<?php $c++ ?>
  					@endforeach
		       {{csrf_field()}}
				
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'),
										 price = $(this).parent().find('.single_price'),
										 n = $(this).parent().find('.no'),
										 newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
										var n =Number(n.text());
										console.log(n);
										var p = $("#price"+n+"").text();
										var sp=price.text();
										var c = Number(p)+Number(sp);
										$("#price"+n+"").text(c);

										var total = $("#total").text();
									console.log(total);
									var rem = Number(total)+Number(sp);
									$("#total").text(Number(rem).toFixed(2));


									var id = $("#pro_id"+n+"").val();


									//console.log(id);
									addPro(id)
									/*$.post('http://localhost:8000/addPro',{'id':id,'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					//$('#Cart_quantity').text(data);
					//$('#products').hide();
	               //location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });*/










										//console.log(price.text());

									});

			function addPro(id)
			{//console.log("yy");
				console.log("hel"+id);
				$.post('addCart',{'id':id,'_token':$('input[name=_token]').val()},function(data){
								console.log(data);
								//$('#Cart_quantity').text(data);
				          // location.reload();
				          //$("#items").load(location.href + ' #items');
				          //console.log(data);
				          //console.log(data["text"]);
				          });
			}

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'),
										     price = $(this).parent().find('.single_price'), n = $(this).parent().find('.no'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1){

										 divUpd.text(newVal);
										var n =Number(n.text());
										console.log(n);
										var p = $("#price"+n+"").text();
										var sp=price.text();
										var c = Number(p)-Number(sp);
										$("#price"+n+"").text(c);

										var total = $("#total").text();
									console.log(total);
									var rem = Number(total)-Number(sp);
									$("#total").text(Number(rem).toFixed(2));



									var id = $("#pro_id"+n+"").val();


									//console.log(id);
									removePro(id);
									/*$.post('http://localhost:8000/removePro',{'id':id,'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					//$('#Cart_quantity').text(data);
					//$('#products').hide();
	               //location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });*/





										}
									});


									function removePro(id)
			{//console.log("yy");
				console.log("helrem"+id);
				$.post('removeproCart',{'id':id,'_token':$('input[name=_token]').val()},function(data){
								console.log(data);
								//$('#Cart_quantity').text(data);
				          // location.reload();
				          //$("#items").load(location.href + ' #items');
				          //console.log(data);
				          //console.log(data["text"]);
				          });
			}

									</script>
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>


				</div>

				<div class="pull-right">
					
					<h4><b>Total- <span id="total">{{$total}}</span> BDT</b></h4>
					
				</div>
				<br>
				<br>
				<br>
				<br>
				<div class="pull-right" >
					<a href="{{url('/shipping')}}" style="color:red; font-size: 25px;">Checkout<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
				</div>
			
				
				<div class="clearfix"> </div>
			</div>
	</div>
</div>


<script type="text/javascript">

			

			

			function empty_cart()
			{//console.log("yy");
				$.post('http://localhost:8000/emptyCart',{'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					$('#Cart_quantity').text(data);
					//$('#products').hide();
	               location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });
			}
				</script>

<!-- //check out -->





@endsection

@include('layouts.login')
@section('footer')

@include('layouts.footer')

@endsection
