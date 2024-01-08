@extends('layouts.master')
@section('css')
    <link rel="stylesheet" href="/assets/css/product-menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
@endsection
@section('content')
<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(/images/sliders/slide1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <br>
                    <br>
                    <h2><em>Menu</em> của chúng tôi</h2>
                    <p>Có những ly Nước, Cafe giải khát siêu đỉnh!</p>
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

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4">
                    <div class="product-wrapper">
                        <div class="image-thumb">
                            <img src="{{asset('/images/products/'.$product->image)}}" alt="{{$product->name}}">
                        </div>
                        <div class="down-content">
                            <h4 class="single-item-title">{{$product->name}}</h4>
                            <span class="single-item-price">
                                Giá: {{number_format($product->unit_price)}} VNĐ
                                @if ($product->promotion_price > 0)
                                <span class="flash-sale"> - Sales: {{ $product->promotion_price }}%</span>
                                @endif
                            </span>
                            {{-- <span class="single-item-price">
                                Giá mới: {{number_format($product->promotion_price)}} VNĐ
                            </span> --}}
                            <ul class="social-icons">
                                <li><a class="add-to-cart" href="{{route('banhang.addToCart',$product ->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                <!-- Nút chi tiết -->
                                <li><a class="view-details" href="{{ route('products.show', $product->id) }}"><i class="fas fa-info-circle"></i> Chi tiết</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
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