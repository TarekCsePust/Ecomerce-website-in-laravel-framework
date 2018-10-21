<!-- product-nav -->

<div class="product-easy">
	<div class="container">
		<h1 class="text-center" style="color: red;font-size: 50px;"><b>New Arrivals</b></h1>
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