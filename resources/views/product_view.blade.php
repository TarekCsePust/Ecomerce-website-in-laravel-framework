@extends('layouts.master')

@section('title','home')

@section('header')

@include('layouts.header')

@endsection

@section('banner')

@include('layouts.banner_head')
<div class="page-head">
	<div class="container">
		<h3>Product Deatils</h3>
	</div>
</div>

@endsection

@section('content')


<!-- single -->
<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
						<script>
						// Can also be used with $(document).ready()
							$(window).load(function() {
								$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
								});
							});
						</script>
					<!-- //FlexSlider-->
					<ul class="slides">

						<li data-thumb="{{asset('/storage/'.$product->image)}}">
							<div class="thumb-image"> 

						<img alt="" src="{{asset('/storage/'.$product->image)}}" class="img-responsive" data-imagezoom="true" >
	

							</div>
						</li>
						@foreach($detailsImgs as $img)
						<li data-thumb="{{asset('/storage/'.$img->image)}}">
							<div class="thumb-image"> 

								<img alt="" src="{{asset('/storage/'.$img->image)}}" class="img-responsive" data-imagezoom="true" >

								 </div>
						</li>
						@endforeach	
						
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
					<h3>{{$product->product_name}}</h3>
					<p><span class="item_price">{{$product->offer_price}}</span> <del>{{$product->actual_price}}</del></p>
					<h4><b>Color avilable:</b> {{$product->color}}</h4>
					<br>
					<h4><b>Size avilable:</b> {{$product->size}}</h4>
				    <br>
					
					
					<div class="occasion-cart">
						<a href="#" class="hvr-outline-out button2" onclick="addCart({{$product->id}})">Add to cart</a>
					</div>
					
		</div>
				<div class="clearfix"> </div>




				<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews({{count($product_reviews)}})</a></li>

							<li role="presentation"><a href="#rating" role="tab" id="rating-tab" data-toggle="tab" aria-controls="rating">Rating</a></li>
						
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
								<h5>Product Brief Description</h5>
								<p>
									{{$product->description}}
								</p>
							</div>
					<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
						<div class="bootstrap-tab-text-grids">



							@foreach($product_reviews as $product_review)
							<div class="bootstrap-tab-text-grid">
								<div class="bootstrap-tab-text-grid-left">
									<img src="{{asset('/storage/'.$product_review['user_photo'])}}" alt=" " class="img-responsive">
								</div>
						<div class="bootstrap-tab-text-grid-right">
							<ul>
								<li><a href="#">{{$product_review['user_name']}}</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
							</ul>
							<p>{{$product_review['review_msg']}}</p>
						</div>
										<div class="clearfix"> </div>
									</div>
							@endforeach





								





									
						<div class="add-review">
							<h4>add a review</h4>
							<form action="{{url('/review')}}" method="POST">
								
								{{csrf_field()}}
								@if(Auth::check())
								<input type="hidden" name="userId" value="{{Auth::user()->id}}">
								@endif
								<input type="hidden" name="productId" value="{{$product->id}}">
								<textarea placeholder="Message..." name="review_message" type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" required="1"></textarea>
								<input type="submit" value="SEND">
							</form>
						</div>
					</div>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="rating" aria-labelledby="rating-tab">


		<div class="rate">

		<div id="1" class="btn-1 rate-btn"></div>
        <div id="2" class="btn-2 rate-btn"></div>
        <div id="3" class="btn-3 rate-btn"></div>
        <div id="4" class="btn-4 rate-btn"></div>
        <div id="5" class="btn-5 rate-btn"></div>

	    </div>
   @if(Auth::check())
   <input type="hidden" id="userid" value="{{Auth::user()->id}}">
   @else
    <input type="hidden" id="userid" value="0">
   @endif
   <input type="hidden" id="proid" value="{{$product->id}}">
<br>
    <div class="box-result">
    	
    <div class="result-container">
    	<div class="rate-bg" style="width:{{$product_rating['rate_bg']}}%"></div>
        <div class="rate-stars"></div>
    </div>
    <br>
        <p style="float: left; font-size:16px; text-align:center">Rated <strong><?php echo substr($product_rating['rate_value'],0,3); ?></strong> out of <?php echo $product_rating['rate_times']; ?> Rating(s)</p>
    </div>

							</div>


{{csrf_field()}}



						


						</div>
					</div>
				</div>
	</div>
</div>



	<script type="text/javascript">

			function addCart(n){

				//console.log(n);
				$.post('http://localhost:8000/addCart',{'id':n,'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					$('#Cart_quantity').text(data);
	          // location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });
			}

			function addrat(u,p,r)
			{
				 console.log(u);
				 console.log(p);
				 console.log(r);
				$.post('http://localhost:8000/rating',{'userId':u,'rate':r,'productId':p,'_token':$('input[name=_token]').val()},function(data){
					if(data==0)
					{
						alert("You have to login for rating")
					}
					location.reload();
					console.log(data);
					//$('#Cart_quantity').text(data);
					 });
			}

			function empty_cart()
			{//console.log("yy");
				$.post('http://localhost:8000/emptyCart',{'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					$('#Cart_quantity').text(data);
	          // location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });
			}
				</script>


				<script type="text/javascript">
$(function(){ 
   $('.rate-btn').hover(function(){
   $('.rate-btn').removeClass('rate-btn-hover');
      var therate = $(this).attr('id');
     // console.log(therate);
      for (var i = therate; i >= 0; i--) {
   $('.btn-'+i).addClass('rate-btn-hover');
       };
     });
                           
   $('.rate-btn').click(function(){ 
      console.log("sddfs");   
      var therate = $(this).attr('id');
        //console.log(therate);
     
   $('.rate-btn').removeClass('rate-btn-active');
      for (var i = therate; i >= 0; i--) {
   $('.btn-'+i).addClass('rate-btn-active');
      };
    
    var user = $("#userid").val();
    var pro = $("#proid").val();
    console.log(user);
    addrat(user,pro,therate);

   
      /*$.post('http://localhost:8000/rating',{'userId':user,'productId':pro,'rate':therate,'_token':$('input[name=_token]').val()},function(data){
					console.log(data);
					//$('#Cart_quantity').text(data);
	          // location.reload();
	          //$("#items").load(location.href + ' #items');
	          //console.log(data);
	          //console.log(data["text"]);
	          });*/



   /*$.ajax({
      type : "POST",
      url : "ajax.php",
      data: dataRate,
      success:function(){}
    });
*/


  });



});
</script>


<!-- //single -->

@endsection

@include('layouts.login')
@section('footer')

@include('layouts.footer')

@endsection
