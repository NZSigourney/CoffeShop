@extends('layouts.master')
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<br>
					<br>
					<h2>Our <em>Menu</em></h2>
					<p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Call to Action End ***** -->

<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
	<div class="container">
		<br>
		<br>

		<div class="row">
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-1-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-2-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-3-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-4-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-5-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="trainer-item">
					<div class="image-thumb">
						<img src="assets/images/product-6-720x480.jpg" alt="">
					</div>
					<div class="down-content">
						<span>
							<del><sup>$</sup>15.00</del> <sup>$</sup>17.00
						</span>

						<h4>Lorem ipsum dolor sit amet, consectetur</h4>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p>

						<ul class="social-icons">
							<li><a href="#">+ Order</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<br>
			
		<nav>
		  <ul class="pagination pagination-lg justify-content-center">
			<li class="page-item">
			  <a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			  </a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
			  <a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			  </a>
			</li>
		  </ul>
		</nav>

	</div>
</section>
<!-- ***** Fleet Ends ***** -->
@endsection

@section('js')
	<!--customjs-->
	<script type="text/javascript">
	$(function() {
		// this will get the full URL at the address bar
		var url = window.location.href;
	
		// passes on every "a" tag
		$(".main-menu a").each(function() {
			// checks if its the same on the address bar
			if (url == (this.href)) {
				$(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
			}
		});
	});
	
	
	</script>
	<script>
		jQuery(document).ready(function($) {
				'use strict';
	
	// color box
	
	//color
		jQuery('#style-selector').animate({
		left: '-213px'
	});
	
	jQuery('#style-selector a.close').click(function(e){
		e.preventDefault();
		var div = jQuery('#style-selector');
		if (div.css('left') === '-213px') {
		jQuery('#style-selector').animate({
			left: '0'
		});
		jQuery(this).removeClass('icon-angle-left');
		jQuery(this).addClass('icon-angle-right');
		} else {
		jQuery('#style-selector').animate({
			left: '-213px'
		});
		jQuery(this).removeClass('icon-angle-right');
		jQuery(this).addClass('icon-angle-left');
		}
	});
				});
	</script>
@endsection