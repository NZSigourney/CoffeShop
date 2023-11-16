<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KOPPEE - Coffee Shop</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

  {{-- Temples CSS Assets --}}
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    {{-- <title>PHPJabbers.com | Free Restaurant Website Template</title> --}}

    <link rel="stylesheet" type="text/css" href="source/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="source/assets/css/font-awesome.css">

    <link rel="stylesheet" href="source/assets/css/style.css">
    {{-- End --}}

    {{-- CSS Login Page --}}
    <!--===============================================================================================-->	
      <link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
    <!--===============================================================================================-->	
      <link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
      <link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
      <link rel="stylesheet" type="text/css" href="Login/css/util.css">
      <link rel="stylesheet" type="text/css" href="Login/css/main.css">
    <!--===============================================================================================-->
    {{-- End --}}
    @yield('css')
</head>
<body>
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    </div>
    <!-- ***** Preloader End ***** -->

    @include('layouts.Header');
    @yield('content');
    @include('layouts.Footer');

    <!-- jQuery -->
    <script src="/source/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="/source/assets/js/popper.js"></script>
    <script src="/source/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="/source/assets/js/scrollreveal.min.js"></script>
    <script src="/source/assets/js/waypoints.min.js"></script>
    <script src="/source/assets/js/jquery.counterup.min.js"></script>
    <script src="/source/assets/js/imgfix.min.js"></script> 
    <script src="/source/assets/js/mixitup.js"></script> 
    <script src="/source/assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="/source/assets/js/custom.js"></script>
   @yield('js')
</body>
</html>