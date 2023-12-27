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
                <div class="trainer-item">
                    <div class="image-thumb">
                        <a href="{{route('product',['id'=>$product->id]) }}"><img src="/images/products/{{$product->image}}" alt="{{$product->image}}" width="270px" height="320px"></a>
                    </div>
                    <div class="down-content">
                        <span>
                            <h4><p class="single-item-title">{{$product->name}}</p></h4>
                            @if ($product ->promotion_price !=0)
                            <p class="single-item-price">
                            <span class="flash-del">{{number_format($product->unit_price)}}</span>
                            {{-- <span class="flash-sale">{{number_format($product->promotion_price)}}</span> --}}
                            </p>
                            @else
                            <p class="single-item-price">
                                <span>{{number_format($product->unit_price)}}</span>
                            </p>
                            @endif
                        </span>

                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia, libero, reprehenderit? Aliquam vel, voluptate placeat, porro nemo impedit reprehenderit eligendi.</p> --}}

                        <ul class="social-icons">
                            <li><a class="add-to-cart pull-left" href="{{route('banhang.addToCart',$product ->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
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