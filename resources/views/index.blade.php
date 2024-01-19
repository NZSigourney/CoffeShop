@extends('layouts.master')
@section('content')
<!-- Preloader -->
<div id="loader-wrapper">
  <div id="loader"></div>
  <div class="loader-section section-left"></div>
  <div class="loader-section section-right"></div>
</div>
<!-- End Preloader -->
<section class="tm-welcome-section">
    <div class="container tm-position-relative">
      <div class="tm-lights-container">
        <img src="source/img/light.png" alt="Light" class="light light-1">
        <img src="source/img/light.png" alt="Light" class="light light-2">
        <img src="source/img/light.png" alt="Light" class="light light-3">  
      </div>        
      <div class="row tm-welcome-content">
        <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="source/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Chào Mừng đến&nbsp;&nbsp;<img src="source/img/header-line.png" alt="Line" class="tm-header-line"></h2>
        <h2 class="gold-text tm-welcome-header-2">Blue Sky - Cafe</h2>
        <p class="gray-text tm-welcome-description">Chúng tôi hân hạnh chào đón bạn đến với <span class="blue-text">BLUE SKY</span> - <span class="gold-text">CAFE</span> - không gian ấm cúng và đầy tinh tế nằm giữa trung tâm thành phố. Chúng tôi mang đến cho bạn một trải nghiệm cà phê độc đáo, nơi bạn có thể tận hưởng không khí yên bình và thư giãn.</p>
        <a href="#main" class="tm-more-button tm-more-button-welcome">Details</a>      
      </div>
      <img src="source/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">             
    </div>      
  </section>
  <div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
      <section class="tm-section row">
        <div class="col-lg-9 col-md-9 col-sm-8">
          <h2 class="tm-section-header gold-text tm-handwriting-font">Cà phê tốt nhất cho bạn</h2>
          <h2>Blue Sky - Cafe</h2>
          <p class="tm-welcome-description">Tại <span class="blue-text">BLUE SKY</span> - <span class="gold-text">CAFE</span>, chúng tôi tự hào về việc chọn lựa những hạt cà phê chất lượng nhất từ những nguồn cung cấp uy tín. Mỗi tách cà phê đều là một tác phẩm nghệ thuật, được pha chế đặc biệt để mang đến trải nghiệm tuyệt vời nhất cho khách hàng của chúng tôi.</p>
          {{-- <a href="#" class="tm-more-button margin-top-30">Read More</a>  --}}
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
          <div class="inline-block shadow-img">
            <img src="source/img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
          </div>              
        </div>            
      </section>          
      <section class="tm-section tm-section-margin-bottom-0 row">
        <div class="col-lg-12 tm-section-header-container">
          <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="source/img/logo.png" alt="Logo" class="tm-site-logo"> Sản phẩm nổi bật </h2>
          <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div class="col-lg-12 tm-popular-items-container">
            <!-- khu vực foreach Popular item -->
            @if(count($popularProducts) != 1)
              @foreach($popularProducts as $p)
              <div class="tm-popular-item">
                  <img src="/assets/images/products/{{ $p->image }}" style="margin:40px" alt="Popular" class="tm-popular-item-img">
                  <div class="tm-popular-item-description">
                      <h3 class="tm-handwriting-font tm-popular-item-title"><span class="tm-handwriting-font bigger-first-letter">{{ $p->name }}</h3><hr class="tm-popular-item-hr">
                      <p>{{ $p->description }}.</p>
                      <div class="order-now-container">
                          <a href="{{route('banhang.addToCart', $p->id)}}" class="order-now-link tm-handwriting-font">Order Now</a>
                      </div>
                  </div>
              </div>
              @endforeach
            @else
              <h3><span class="gold-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%)">ITEM UPDATING</span></h3>
            @endif
            <!-- End -->    
        </div>          
      </section>
      
      <section class="tm-section">
        <div class="row">
          <div class="col-lg-12 tm-section-header-container">
            <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="source/img/logo.png" alt="Logo" class="tm-site-logo"> Thực đơn hàng ngày</h2> 
            <div class="tm-hr-container"><hr class="tm-hr"></div> 
          </div>  
        </div>          
        <div class="row">
          <div class="tm-daily-menu-container margin-top-60">
            <div class="col-lg-4 col-md-4">
              <img src="source/img/menu-board.png" alt="Menu board" class="tm-daily-menu-img">      
            </div>            
            <div class="col-lg-8 col-md-8">
              <p>Chào mừng bạn đến <span class="blue-text">BLUE SKY</span> - <span class="gold-text">CAFE</span>! Hôm nay, chúng tôi rất vui được chia sẻ với bạn những hương vị mới lạ và tuyệt vời nhất. Dưới đây là một số món đặc biệt mà chúng tôi đã chuẩn bị:</p>
              <ol class="margin-top-30">
                @foreach($daily as $p)
                  @if($p->promotion_price == 0)
                    <li>{{ $p->name }} - {{ number_format($p->unit_price) }} VND</li>
                  @else
                    <li>{{ $p->name }} - {{ number_format($p->promotion_price) }} VND - SALES: {{ number_format((($p->unit_price - $p->promotion_price) / $p->unit_price) * 100) }} %</li>
                  @endif
                @endforeach
              </ol>
              <a href="#" class="tm-more-button margin-top-30">Read More</a>    
            </div>
          </div>
        </div>          
      </section>
    </div>
  </div> 
@endsection