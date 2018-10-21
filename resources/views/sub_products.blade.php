@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

<!-- banner top -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="{{URL::to('/')}}">Home <span class="sr-only">(current)</span></a></li>

					<?php $c = count($categories); ?>
					@for($i=0;$i<$c;$i++)

							<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$categories[$i]->category_name}} <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html">

<img alt="" src="{{asset('/storage/'.$categories[$i]->category_image)}}">



											</a>
									</div>
									<?php 
									$counter = count($subcats[$i]);
									$k = ceil($counter/6);
									$j=0;
									 ?>
									@for($n=0;$n<$k;$n++)
									 <?php $tru=1 ?>
									<div class="col-sm-3 multi-gd-img">

							<ul class="multi-column-dropdown">
								@while($j<$counter)
								<li><a href="{{url('show_products/'.$subcats[$i][$j]['id'])}}">{{$subcats[$i][$j]['name']}}</a></li>
								<?php $j++; ?>
								@if($j%6==0)
									<?php break; ?>
								@endif
								@endwhile
								
								</ul>
									</div>
									@endfor
								
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>

					@endfor




				


					
					
					<li class=" menu__item"><a class="menu__link" href="#">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="{{URL::to('/checkout')}}">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								 <span id="Cart_quantity" >{{$cart_quan}}</span> items</div>
								
							</h3>
						</a>
						<p><a href="javascript:;" onclick="empty_cart()">Empty Cart</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->


<!-- banner -->
<div class="banner-grid">
	<div id="visual">
			<div class="slide-visual">
				<!-- Slide Image Area (1000 x 424) -->
				<ul class="slide-group">
					<li>
					<img alt="Dummy Image" src="{{asset('/storage/ba1.jpg')}}" class="img-responsive">
					</li>
					<li>
						<img alt="Dummy Image" src="{{asset('/storage/ba2.jpg')}}" class="img-responsive">
					</li>
					<li>
						<img alt="Dummy Image" src="{{asset('/storage/ba3.jpg')}}" class="img-responsive">
					</li>
				</ul>

				<!-- Slide Description Image Area (316 x 328) -->
				<div class="script-wrap">
					<ul class="script-group">
						<li><div class="inner-script">

<img alt="Dummy Image" src="{{asset('/storage/baa1.jpg')}}" class="img-responsive">

							

						</div></li>
						<li><div class="inner-script">

							<img alt="Dummy Image" src="{{asset('/storage/baa2.jpg')}}" class="img-responsive">

						</div></li>
						<li><div class="inner-script">

							<img alt="Dummy Image" src="{{asset('/storage/baa3.jpg')}}" class="img-responsive">
						</div></li>
					</ul>
					<div class="slide-controller">
						<a href="#" class="btn-prev">

<img alt="Prev Slide" src="{{asset('/storage/btn_prev.png')}}">
						</a>
						<a href="#" class="btn-play">
<img alt="Start Slide" src="{{asset('/storage/btn_play.png')}}">

							

						</a>
						<a href="#" class="btn-pause">
<img alt="Pause Slide" src="{{asset('/storage/btn_pause.png')}}">


							
						</a>
						<a href="#" class="btn-next">
							<img alt="Next Slide" src="{{asset('/storage/btn_next.png')}}">
							
						</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	
	<script src="{{asset('js/pignose.layerslider.js')}}" type="text/javascript"></script>
	<script type="text/javascript">
	//<![CDATA[
		$(window).load(function() {
			$('#visual').pignoseLayerSlider({
				play    : '.btn-play',
				pause   : '.btn-pause',
				next    : '.btn-next',
				prev    : '.btn-prev'
			});
		});
	//]]>
	</script>

</div>
<!-- //banner -->

@endsection

@section('content')
<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		
		<br>
		 <script src="{{ asset('js/easyResponsiveTabs.js') }}"></script>
		
		<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});
							
		</script>
		<div class="sap_tabs">
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  	 
						
						@foreach($products as $product)
					
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
							<img alt="" src="{{asset('/storage/'.$product->image)}}" class="pro-image-front">
							<img alt="" src="{{asset('/storage/'.$product->image)}}" class="pro-image-back">
									
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
							<a href="{{URL::to('proView/'.$product->id)}}" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
										<span class="product-new-top">New</span>
										
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{$product->product_name}}</a></h4>
									<div class="info-product-price">
										<span class="item_price">{{$product->offer_price}}</span>
										<del>{{$product->	actual_price}}</del>
									</div>
									<a href="#" class="add single-item hvr-outline-out button2" onclick="pro({{$product->id}});">Add to cart</a>									
								</div>
							</div>
						</div>
						
							
						@endforeach

						@if(count($products)<1)
						<center><h1>No Product Found</h1></center>
						@endif


				{{csrf_field()}}
				<script type="text/javascript">

						function pro(n){

							//console.log(n);
							$.post('addCart',{'id':n,'_token':$('input[name=_token]').val()},function(data){
								console.log(data);
								$('#Cart_quantity').text(data);
				          // location.reload();
				          //$("#items").load(location.href + ' #items');
				          //console.log(data);
				          //console.log(data["text"]);
				          });
						}

						function empty_cart()
						{
							$.post('emptyCart',{'_token':$('input[name=_token]').val()},function(data){
								console.log(data);
								$('#Cart_quantity').text(data);
				          // location.reload();
				          //$("#items").load(location.href + ' #items');
				          //console.log(data);
				          //console.log(data["text"]);
				          });
						}
				</script>
				
				
						<div class="clearfix"></div>
					
				
						
				
			</div>
		</div>
	</div>
</div>
<!-- //product-nav -->

@include('layouts.login')

@endsection

@section('footer')

@include('layouts.footer')

@endsection
