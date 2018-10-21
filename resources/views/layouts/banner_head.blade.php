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