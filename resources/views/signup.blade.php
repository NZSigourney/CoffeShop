@extends('layouts.master')
@section('content')

<!-- Preloader -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Preloader -->

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Đăng kí</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Home</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <div id="content">
        
        <form action="{{ route('postsignin') }}" method="post" class="beta-form-checkout">
            @csrf
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h4>Đăng kí</h4>
                    <div class="space20">&nbsp;</div>

                    
                    <div class="form-block">
                        <label for="email">Email address*</label>
                        <input type="email" name="email" id="email" required>
                    </div>

                    <div class="form-block">
                        <label for="your_last_name">Fullname*</label>
                        <input type="text" name="full_name"  required>
                    </div>

                    <div class="form-block">
                        <label for="address">Address*</label>
                        <input type="text" name="address" id="adress" value="Street Address" required>
                    </div>


                    <div class="form-block">
                        <label for="phone">Phone*</label>
                        <input type="text" name="phone" id="phone" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Password*</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-block">
                        <label for="phone">Re password*</label>
                        <input type="password" name="repassword" id="repassword" required>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
                <div class="col-sm-3"></div>
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