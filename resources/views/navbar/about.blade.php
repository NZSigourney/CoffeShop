@extends('layouts.master')
@section('css')
	<link rel="stylesheet" href="/assets/css/about.css">
@endsection
@section('content')
<section class="section section-bg" id="call-to-action" style="background-image: url(/images/sliders/slide2about.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<br>
					<br>
					<h2>TÌM HIỂU THÊM VỀ <em>CHÚNG TÔI</em></h2>
					<p>Những thông tin cần thiết của chúng tôi đều ở đây</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ***** Our Classes Start ***** -->
<section class="section" id="our-classes">
	<div class="container">
		<br>
		<br>
		<br>
		<div class="row" id="tabs">
		  <div class="col-lg-4">
			<ul>
			  <li><a href='#tabs-1'><i class="fa fa-soccer-ball-o"></i> Mục tiêu</a></li>
			  <li><a href='#tabs-2'><i class="fa fa-briefcase"></i> Our Work</a></a></li>
			  {{-- <li><a href='#tabs-3'><i class="fa fa-heart"></i> Our Passion</a></a></li> --}}
			</ul>
		  </div>
		  <div class="col-lg-8">
			<section class='tabs-content'>
			  <article id='tabs-1'>
				<img src="assets/images/about-image-1-940x460.jpg" alt="">
				<h4>Mục tiêu của chúng tôi</h4>

				<p>Chúng tôi đã thành lập <strong>KOPPEE - BLUE SKY</strong> với một mục tiêu rõ ràng - tạo ra không gian ấm áp, tươi mới và sáng tạo, nơi mọi người có thể tận hưởng những giây phút thư giãn và kết nối với nhau. Chúng tôi không chỉ cung cấp cà phê chất lượng cao mà còn mang đến một trải nghiệm độc đáo và thú vị cho khách hàng.</p>

				<h4>Tầm Nhìn</h2>
    			<p>Tầm nhìn của chúng tôi là trở thành điểm đến ưa thích cho những người yêu thích cà phê và nơi mọi cuộc gặp gỡ trở nên ý nghĩa. Chúng tôi cam kết không ngừng đổi mới trong cách chúng tôi phục vụ và tạo ra không gian thú vị, nhằm mang đến sự hài lòng và niềm vui cho khách hàng của mình.</p>

				<h4>Đam Mê Cho Cà Phê</h2>
    			<p>Chúng tôi không chỉ là những người kinh doanh, mà còn là những người đam mê cà phê. Đội ngũ của chúng tôi tận tâm và chuyên nghiệp, luôn sẵn sàng chia sẻ kiến thức và sự đam mê của mình với mỗi cốc cà phê được phục vụ.</p>
			   
				<h4>Hãy Cùng Chúng Tôi Tận Hưởng Cà Phê</h2>
				<p>Chúng tôi mời bạn đến và cùng chúng tôi trải nghiệm hương vị đặc trưng của <strong>KOPPEE - BLUE SKY</strong>. Hãy cùng nhau tạo nên những kỷ niệm đáng nhớ và chia sẻ niềm đam mê cho cà phê tại không gian ấm cúng của chúng tôi.</p>
				<p>Cảm ơn bạn đã đồng hành cùng <strong>KOPPEE - BLUE SKY</strong> trên hành trình cà phê của chúng tôi!</p>
			  </article>
			  <article id='tabs-2'>
				<img src="assets/images/about-image-2-940x460.jpg" alt="">
				<h4>Công việc của chúng tôi</h4>
				<p>Tại <strong>KOPPEE - BLUE SKY</strong>, chúng tôi không chỉ cung cấp cà phê chất lượng hàng đầu mà còn mang đến trải nghiệm độc đáo và ấm cúng cho mỗi khách hàng. Với đội ngũ đam mê và sự tận tụy, chúng tôi đã xây dựng không gian nơi mọi người có thể tận hưởng không gian thư giãn và thưởng thức những giây phút thực sự đặc biệt.</p>
				
				<h4>Sứ mệnh của chúng tôi:</h4>
				<p>Chúng tôi cam kết mang lại cho khách hàng không chỉ là cốc cà phê ngon miệng mà còn là trải nghiệm tận hưởng mỗi giọt cà phê. Chúng tôi đặt sự chất lượng và sự sáng tạo lên hàng đầu, không ngừng nghiên cứu và phát triển để đưa đến những sản phẩm mới và thú vị.</p>

				<h4>Cộng đồng và Bền vững:</h4>
				<p>Chúng tôi tin rằng sự thành công của cửa hàng không chỉ đến từ việc phục vụ cà phê ngon mà còn từ việc đóng góp tích cực vào cộng đồng. Chúng tôi hỗ trợ các nông dân cà phê bền vững và thúc đẩy các hoạt động cộng đồng để xây dựng một môi trường sống tốt đẹp hơn. Cùng <strong>KOPPEE - BLUE SKY</strong> chắp cánh cho những chuyến phiêu lưu cà phê đầy ý nghĩa và đam mê. Chúng tôi mong được phục vụ và chia sẻ niềm đam mê cùng bạn mỗi ngày!</p>
			  </article>
			</section>
		  </div>
		</div>
	</div>
</section>
<!-- ***** Our Classes End ***** -->
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<h2>Send us a <em>message</em></h2>
					<p>Hãy liên hệ chúng tôi nếu bạn cần! chúng tôi luôn sẵn sàng giúp đỡ bạn!</p>
					<div class="main-button">
						<a href="{{ route('contact') }}">Contact us</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ***** Call to Action End ***** -->
@endsection