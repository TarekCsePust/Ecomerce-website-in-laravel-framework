<!-- login -->
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div>
			<div class="modal-body modal-spa">
		<div class="login-grids">
			<div class="login">
				<div class="login-bottom">
					<h3>Sign up for free</h3>
					<form action="{{url('signup')}}" method="POST"  enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="sign-up">
							<h4>Name :</h4>
							<input name="name" type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="1">	
						</div>
						<div class="sign-up">
							<h4>Email :</h4>
							<input name="email" type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="1">	
						</div>
						
						<div class="sign-up">
							<h4>Photo(maximum size 2 mb) :</h4>
							<br>
							<input name="photo" type="file" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="1">	
						</div>
						<br>
						<div class="sign-up">
							<h4>Password :</h4>
							<input name="password" type="password"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
							
						</div>
						<div class="sign-up">
							<h4>Re-type Password :</h4>
							<input name="repassword" type="password"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="1">
							
						</div>
						<div class="sign-up">
							<input type="submit" value="REGISTER NOW" >
						</div>
						
					</form>
				</div>
				<div class="login-right">
					<h3>Sign in with your account</h3>
					<form action="{{url('signin')}}" method="POST">
						{{csrf_field()}}
						<div class="sign-in">
							<h4>Email :</h4>
							<input name="email" type="text" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="1">	
						</div>
						<div class="sign-in">
							<h4>Password :</h4>
							<input name="password" type="password"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="1">
							
						</div>
						
						<div class="sign-in">
							<input type="submit" value="SIGNIN" >
						</div>
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
		</div>
	</div>
</div>
</div>
</div>
<!-- //login -->