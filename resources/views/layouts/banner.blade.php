
@include('layouts.banner_head')
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