@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/css/product-menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
@endsection
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
        <h2 class="white-text tm-handwriting-font tm-welcome-header"><img src="source/img/header-line.png" alt="Line" class="tm-header-line">&nbsp;Thực đơn &nbsp;&nbsp;<img src="source/img/header-line.png" alt="Line" class="tm-header-line"></h2>
        <h2 class="gold-text tm-welcome-header-2">Cafe House</h2>
        {{-- <p class="gray-text tm-welcome-description">Cafe House template is a mobile-friendly responsive <span class="gold-text">Bootstrap v3.3.5 layout</span> by <span class="gold-text">templatemo</span>. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculusnec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p> --}}
        <a href="#main" class="tm-more-button tm-more-button-welcome">Read More</a>      
      </div>
      <img src="source/img/table-set.png" alt="Table Set" class="tm-table-set img-responsive">  

      {{-- <div id="app-cover">
        <div id="app">
          <form method="get" action="">
            <div id="f-element">
              <div id="inp-cover"><input type="text" name="query" placeholder="Type something to search ..." autocomplete="off"></div>
            </div>
            <button type="submit" class="shadow"><i class="fas fa-search"></i></button>
          </form>
        </div>
        <div id="layer" title="Click the blue area to hide the form"></div>
        <div id="init"></div>
      </div> --}}
    </div>      
</section>
<div class="tm-main-section light-gray-bg">
    <div class="container" id="main">
        <section class="tm-section row">
        <div class="col-lg-9 col-md-9 col-sm-8">
            <h2 class="tm-section-header gold-text tm-handwriting-font">Variety of Menus</h2>
            <h2>Blue Sky - Cafe</h2>
            <p class="tm-welcome-description">Tại <span class="blue-text">BLUE SKY</span> - <span class="gold-text">CAFE</span>, chúng tôi tự hào về việc chọn lựa những hạt cà phê chất lượng nhất từ những nguồn cung cấp uy tín. Mỗi tách cà phê đều là một tác phẩm nghệ thuật, được pha chế đặc biệt để mang đến trải nghiệm tuyệt vời nhất cho khách hàng của chúng tôi.</p>
            <a href="#" class="tm-more-button margin-top-30">Read More</a> 
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 tm-welcome-img-container">
            <div class="inline-block shadow-img">
            <img src="source/img/1.jpg" alt="Image" class="img-circle img-thumbnail">  
            </div>              
        </div>            
        </section>          
        <section class="tm-section row" id="product">
          @if(session('scrollTo'))
            <script>
                window.location.href = '{{ url()->previous() }}{{ session('scrollTo') }}';
            </script>
          @endif  
        <div class="col-lg-12 tm-section-header-container margin-bottom-30">
            <h2 class="tm-section-header gold-text tm-handwriting-font"><img src="source/img/logo.png" alt="Logo" class="tm-site-logo"> Our Menus</h2>
            <div class="tm-hr-container"><hr class="tm-hr"></div>
        </div>
        <div>
            <div class="col-lg-3 col-md-3">
            <div class="tm-position-relative margin-bottom-30">              
                <nav class="tm-side-menu">
                <ul>
                  <li><a href="{{route('product')}}" class="active">Tất cả</a></li>
                  @foreach($loai as $types)
                  <li><a href="{{ route('getProductType', $types->id) }}" class="active">{{ $types->name }}</a></li>
                  @endforeach
                </ul>              
                </nav>    
                <img src="source/img/vertical-menu-bg.png" alt="Menu bg" class="tm-side-menu-bg">
            </div>  
            </div>            
            <div class="tm-menu-product-content col-lg-9 col-md-9"> <!-- menu content -->
                @foreach($products as $p)
                <div class="tm-product">
                    <img src="/assets/images/products/{{ $p->image }}" width="25%" height="auto" alt="Product">
                    <div class="tm-product-text">
                    <h3 class="tm-product-title">{{ $p->name }}</h3>
                    <p class="tm-product-description">{{ $p->desciprtion }}.</p>
                    </div>
                    <div class="tm-product-price">
                    <a href="{{route('banhang.addToCartProduct',$p->id)}}" class="tm-product-price-link tm-handwriting-font"><span class="tm-product-price-currency">$</span>{{ number_format($p->unit_price) }}</a>
                    </div>
                </div>
                @endforeach
                <br>
            </div>
        </div>          
        </section>
    </div>
</div> 
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