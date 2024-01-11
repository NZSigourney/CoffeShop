@extends('layouts.master')
@section('css')
<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
{{-- <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> --}}
<link rel="stylesheet" href="/assets/main/source/assets/dest/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/main/source/assets/dest/vendors/colorbox/example3/colorbox.css">
<link rel="stylesheet" href="/assets/main/source/assets/dest/rs-plugin/css/settings.css">
<link rel="stylesheet" href="/assets/main/source/assets/dest/rs-plugin/css/responsive.css">
<link rel="stylesheet" title="style" href="/assets/main/source/assets/dest/css/style.css">
<link rel="stylesheet" href="/assets/main/source/assets/dest/css/animate.css">
<link rel="stylesheet" title="style" href="/assets/main/source/assets/dest/css/huong-style.css">
@endsection
@section('content')
<section class="section section-bg" id="call-to-action" style="background-image: url(/source/assets/images/banner-image-1-1920x500.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="cta-content">
					<br>
					<br>
					<h2>Giỏ hàng của <em>Bạn</em></h2>
					{{-- <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula</p> --}}
				</div>
			</div>
		</div>
	</div>
</section>

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đặt hàng</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="/">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div id="content">
        
        <form action="{{ route('banhang.postdathang') }}" method="POST" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    {{-- <h4>Đặt hàng</h4> --}}
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                        <label>Giới tính </label>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                        <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                                    
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="expample@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" id="adress" name="address" placeholder="Street Address" required>
                    </div>
                    

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone_number" required>
                    </div>
                    
                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="note"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="your-order">
                        <div class="your-order-head"><h5 style="margin-left: 25%">Đơn hàng của bạn</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px;">
                            <div class="your-order-item">
                                <div>
                                <!--  one item	 -->
                                @isset($productCarts)
                                @foreach ($productCarts as $cart)
                                <div class="media">
                                    <img width="25%" src="/images/products/{{ $cart['item']->image }}" alt="" class="pull-left">
                                    <div class="media-body">
                                        <p class="font-large">{{ $cart['item']->name }}</p>
                                        <span class="color-gray your-order-info">Price: {{ $cart['item']->promotion_price != 0?number_format($cart['item']->promotion_price,0):
                                            number_format($cart['item']->unit_price, 0) }}</span>
                                        <span class="color-gray your-order-info">{{ $cart['qty'] }}</span>
                                        {{-- <!-- Thêm nút xóa -->
                                        <form action="{{ route('banhang.xoagiohang', $cart['item']['id']) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form> --}}
                                    </div>
                                </div>
                                @endforeach
                                @endisset
                                <!-- end one item -->
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item" style="margin-bottom: 10px;">
                                <div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{ isset($totalPrice)?number_format($totalPrice,0):0 }} VND</h5></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="your-order-head"><h5 style="margin-left: 25%">Hình thức thanh toán</h5></div>
                        
                        <div class="your-order-body">
                            <select id="payment_method" name="payment_method">
                                <option value="COD" selected="selected">Thanh toán khi nhận hàng</option>
                                <option value="ATM">Chuyển khoản</option>
                            </select>
                            
                            <div id="payment_method_details" class="payment_box" style="display: none;">
                                <p id="payment_method_details_COD" style="display: none;">
                                    Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
                                </p>
                                <p id="payment_method_details_ATM" style="display: none;">
                                    Chuyển tiền đến tài khoản sau:
                                    <br>- Số tài khoản: 123 456 789
                                    <br>- Chủ TK: Nguyễn A
                                    <br>- Ngân hàng ACB, Chi nhánh TPHCM
                                </p>
                            </div>
                        </div>

                        <div class="text-center"> <button type="submit" class="btn btn-primary">Đặt hàng <i class="fa fa-chevron-right"></i></button> </div>
                    </div> <!-- .your-order -->
                </div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
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