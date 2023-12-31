@extends('layouts.master')
@section('content')
<section class="section section-bg" id="call-to-action" style="background-image: url(images/sliders/banner1.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<br>
					<br>
					<h2>Hãy liên lạc với chúng tôi <em>Nếu bạn cần</em></h2>
					<p>bạn có thể khiếu nại, góp ý tại đây!</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ***** Features Item Start ***** -->
<section class="section" id="features">
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-6 offset-lg-3">
				<div class="section-heading">
					<h2>contact <em> info</em></h2>
					<img src="/source/assets/images/line-dec.png" alt="waves">
					
				</div>
			</div>

			<div class="col-md-4">
				<div class="icon">
					<i class="fa fa-phone"></i>
				</div>

				<h5><a href="#">+1 333 4040 5566</a></h5>

				<br>
			</div>

			<div class="col-md-4">
				<div class="icon">
					<i class="fa fa-envelope"></i>
				</div>

				<h5><a href="https://mail.google.com/mail/u/0/?view=cm&fs=1&to=longthaithien98@gmail.com">CoffeStore@gmail.com</a></h5>

				<br>
			</div>

			<div class="col-md-4">
				<div class="icon">
					<i class="fa fa-map-marker"></i>
				</div>

				<h5>31 Đống Đa, Đà nẵng</h5>

				<br>
			</div>
		</div>
	</div>
</section>
<!-- ***** Features Item End ***** -->

<!-- ***** Contact Us Area Starts ***** -->
<section class="section" id="contact-us" style="margin-top: 0">
	@if(session('message'))
		<div class="alert alert-success">
				{{ session('message') }}
		</div>
		@endif
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div id="map">
				  <iframe src="https://maps.google.com/maps?q=31+Đống+Đa,+Đà+Nẵng&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="600px" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-xs-12">
				<div class="contact-form section-bg" style="background-image: url(assets/images/contact-1-720x480.jpg)">
					<form action="{{ route('admin.postContactMail') }}" method="post">
						@csrf
					  <div class="row">
						<div class="col-md-6 col-sm-12">
						  <fieldset>
							<input name="name" type="text" placeholder="Your Name (required)" value="{{  isset($request->name)?$request->name:'' }}">
							@error('name')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						  </fieldset>
						</div>
						<div class="col-md-6 col-sm-12">
						  <fieldset>
							{{-- <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required=""> --}}
							<input name="email" type="email" placeholder="Your Email (required)" {{  isset($request->email)?$request->email:'' }}>
							@error('email')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						  </fieldset>
						</div>
						<div class="col-md-12 col-sm-12">
						  <fieldset>
							<input name="subject" type="text" id="subject" placeholder="Subject" {{ isset($request->subject)?$request->subject:'' }}>
							@error('subject')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						  </fieldset>
						</div>
						<div class="col-lg-12">
						  <fieldset>
							<textarea name="message" placeholder="Your Message"></textarea>
							@error('message')
								<div class="alert alert-danger">{{ $message }}</div>
							@enderror
						  </fieldset>
						</div>
						<div class="col-lg-12">
						  <fieldset>
							<button type="submit" id="form-submit" class="main-button">Send Message</button>
						  </fieldset>
						</div>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Contact Us Area Ends ***** -->
@endsection