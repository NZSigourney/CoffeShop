<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cafe House Template</title>
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
<link href="{{ asset('source/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('source/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('source/css/templatemo-style.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="source/img/favicon.ico" type="image/x-icon" />

{{-- custom CSS template --}}
<link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
<link href="{{ asset('source/assets/fontawesome/fontIcon/css/fontawesome.css') }}" rel="stylesheet">
<link href="{{ asset('source/assets/fontawesome/fontIcon/css/brands.css') }}" rel="stylesheet">
<link href="{{ asset('source/assets/fontawesome/fontIcon/css/solid.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('/assets/css/header.css') }}">
<link rel="stylesheet" type="text/css" href="{{asset('source/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('source/assets/css/font-awesome.css')}}">
<link rel="stylesheet" href="{{ asset('source/assets/css/style.css') }}">

</head>
<body>
  <!-- Preloader -->
  <div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>
  <!-- End Preloader -->
  
  @include('layouts.header')
  @yield('content')
  @include('layouts.footer')
  
  <!-- JS -->
  <script type="text/javascript" src="source/js/jquery-1.11.2.min.js"></script>      <!-- jQuery -->
  <script type="text/javascript" src="source/js/templatemo-script.js"></script>      <!-- Templatemo Script -->

</body>
 </html>