<!-- header -->
<div class="header">
	<div class="container">
	
		<ul>
			
				
					<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
				
				
					<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
				
			
			
				@if(Auth::check())
			 <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu pull-right">
                <li class="">
                    <a  href="{{URL::to('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
                <br>
                <li class="">
                    <a  href="{{URL::to('/profile') }}"
                       >
                        Profile
                    </a>

                    <form id="logout-form" action="{{ url('/') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
			@else
			<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#" data-toggle="modal" data-target="#myModal4">Login</a></li>
			@endif
			

			
			
		</ul>

		@include('layouts.errore')
	
	</div>
</div>
<!-- //header -->

<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{URL::to('/')}}">
			  <!--	<img alt="" src="{{asset('/storage/logo3.jpg')}}"> -->
			  <i>EasyBazar</i>
				
			</a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required">
						<option value="null">All categories</option>
						<option value="null">Electronics</option>     
						<option value="AX">kids Wear</option>
						<option value="AX">Men's Wear</option>
						<option value="AX">Women's Wear</option>
						<option value="AX">Watches</option>
					</select>
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->