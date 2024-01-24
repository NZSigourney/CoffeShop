@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="/assets/css/checkout.css">
@endsection
@section('content')
<!-- Preloader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Preloader -->
<form action="{{ route('banhang.postdathang') }}" method="POST">
    @csrf
    <div class="con">
        <div class="box1" style="margin-bottom: 15px">
        <h2 class="title">Thanh Toán</h2>
        <!-- info  -->
        <div class="info">
            <h3>Thông tin liên lạc</h3>

            <p class="label">E-mail</p>

            <div class="input-box">
            <input
                type="email"
                name="email"
                placeholder="Enter Your Email .. "
            />
            <i class="fa-solid fa-envelope"></i>
            </div>

            <p class="label">Số Điện thoại</p>

            <div class="input-box">
            <input
                type="text"
                name="phone_number"
                placeholder="Enter Your Phone .. "
            />
            <i class="fa-solid fa-phone"></i>
            </div>
        </div>
        <!-- end of  info  -->

        <!-- Gender Dropdown -->
        <div class="gender">
            <h3>Giới tính</h3>

            <div class="input-box">
                <select name="gender">
                    <option value="" disabled selected>Chọn giới tính</option>
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select>
            </div>
        </div>
        <!-- end of Gender Dropdown -->

        <!-- shipping  -->
        <div class="shipping">
            <h3>Địa chỉ giao hàng</h3>

            <p class="label">họ tên đầy đủ</p>

            <div class="input-box">
            <input
                type="text"
                name="name"
                placeholder="Enter Your Fullname .. "
            />
            <i class="fa-solid fa-user"></i>
            </div>

            <p class="label">Địa chỉ</p>

            <div class="input-box">
            <input type="text" name="address" placeholder="Your Address .. " />
            <i class="fa-solid fa-house"></i>
            </div>

            <p class="label">Ghi chú</p>

            <div class="input-box">
            <input type="text" name="note" placeholder="Note " />
            <i class="fa-solid fa-notebook"></i>
            </div>

            <!-- end of  last  -->

            <!-- Payment Method Dropdown -->
            {{-- <div class="input-box">
                <label for="payment_method">phương thức thanh toán</label>
                <select name="payment_method" id="payment_method">
                    <option value="" disabled selected>Chọn cách thanh toán</option>
                    <option value="COD">COD</option>
                    <option value="{{ route('vnpay') }}">VNPay</option>
                    <!-- Add more payment options as needed -->
                </select>
            </div> --}}
            <!-- end of Payment Method Dropdown -->

            {{-- <input type="checkbox" name="payment_method" id="check" />
            <label for="check"> COD</label> --}}

            {{-- <input type="checkbox" name="check" id="check" />
            <label for="check"> Save this information for next time</label> --}}
        </div>
        <!--end of  shipping  -->
        </div>
        <!-- end of box-1 -->

        <!-- box-2 -->
        <div class="box2">
            <div class="card">
                @isset($productCarts)
                    @foreach($productCarts as $cart)
                        <div class="item">
                        <img src="/assets/images/products/{{ $cart['item']->image }}" alt="bag" />
                        <div class="count">
                            <p class="item-name">{{ $cart['item']->name }}</p>
                            <h6 class="quantity">Slot: {{ $cart['qty'] }}</h6>
                            {{-- <form action="{{ route('banhang.updateCart', $cart['item']) }}" method="post">
                                @csrf
                                <!-- Add the input field for the amount -->
                                <h6><input type="number" name="quantity" value="{{ $cart['qty'] }}" class="quantity-input" onchange="this.form.submit()" /></h6>
                            </form> --}}
                            <h6 class="price">Price: {{ $cart['item']->promotion_price != 0?number_format($cart['item']->promotion_price,0):
                                number_format($cart['item']->unit_price, 0) }}</h6>
                            {{-- <div class="pur">
                                <<form action="{{ route('banhang.updateCart', $cart['item']) }}" method="post">
                                    <!-- Add the input field for the amount -->
                                    <input type="number" name="quantity" value="{{ $cart['qty'] }}" class="quantity-input" />
                                    <button type="submit">Update</button>
                                </form>
                            </div> --}}
                        </div>
                        </div>
                    @endforeach
                @endisset
                <div class="end">
                    <hr />

                    <div class="total">
                        <p>Total</p>
                        <p>{{ isset($totalPrice)?number_format($totalPrice,0):0 }} VND</p>
                    </div>

                    <div class="button-delete">
                        <a href="{{Session::forget('cart')}}"> Xóa tất cả </a>
                    </div>
                </div>
            </div>
            <div class="method-container">
                <button class="btn" name="payment_method" value="COD">Thanh Toán Trực tiếp</button>
                <button class="btn" name="payment_method" value="VNPAY">Thanh Toán VNPAY</button>
            </div>                 
        </div>
        <!-- end of box-2 -->
    </div>
</form>
{{-- @include('navbar.payment.vn_pay') --}}
@endsection

@section('js')
<script src="/assets/js/checkout.js"></script>

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