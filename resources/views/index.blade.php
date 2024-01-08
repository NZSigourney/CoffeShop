@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('content')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="/assets/videos/video2.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Chất lượng và đẳng cấp</h6>
            <h2><em>Cà phê</em> hoàn hảo cho ngày mới!</h2>
            {{-- <div class="main-button">
                <a href="{{ route('table') }}">Book a table</a>
            </div> --}}
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->
<!-- ***** Cars Starts ***** -->
{{-- <section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Sản phẩm</em> của chúng tôi</h2>
                    <img src="/source/assets/images/line-dec.png" alt="">
                    <p>Chắc chắn làm hài lòng các bạn!</p>
                </div>
            </div>
        </div>

        <br>

        <div class="main-button text-center">
            <a href="/product">View our Menu</a>
        </div>
    </div>
</section> --}}

<!-- Call to Action Popular Products -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2><em>Sản phẩm</em> nổi bật</h2>
                    <img src="/source/assets/images/line-dec.png" alt="">
                    <p>Các sản phẩm nổi bật nhất của chúng tôi.</p>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            @if(count($popularProducts) == 1)
                @foreach($popularProducts as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-item">
                            <div class="product-title">
                                <div class="product-name">{{ $product->name }}</div>
                            </div>
                            <div class="product-image">
                                <a href="product-detail.html">
                                    <img src="{{ asset('images/products/' . $product->image) }}" alt="Product Image" class="item-image">
                                </a>
                            </div>
                            <div class="product-price">
                                <h3>{{ $product->unit_price }} <span>VND</span></h3>
                            </div>
                            <div class="product-btn-buy">
                                <a class="btn" href="{{ route('banhang.addToCart', $product->id)}}"><i class="fas fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-lg-6 offset-lg-3">
                    <div class="product-popular-announce">
                        <img src="/source/assets/images/update.png" alt="" style="margin: 0 60% 0 40%">
                        <p>Các sản phẩm nổi bật hiện đang được cập nhật!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- End to Action Popular Products -->

<!-- ***** Call to Action Start ***** -->
<section class="section section-bg" id="call-to-action" style="background-image: url(/images/sliders/banner1.jpg)">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cta-content">
                    <h2>CỨ LIÊN LẠC NẾU CẦN <em>CHÚNG TÔI</em></h2>
                    <p>Chỉ cần bạn muốn góp ý/khiếu nại chúng tôi sẵn sàng tiếp nhận!</p>
                    <div class="main-button">
                        <a href="{{ route('contact') }}">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Call to Action End ***** -->
<!-- ***** Cars Ends ***** -->
@endsection