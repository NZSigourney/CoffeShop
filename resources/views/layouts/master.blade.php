<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
	<link rel="icon" type="img/png" href="/source/image/logo/Logo-coffe.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    {{-- <title>PHPJabbers.com | Free Restaurant Website Template</title> --}}

    <link rel="stylesheet" type="text/css" href="/source/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="/source/assets/css/font-awesome.css">

    <link rel="stylesheet" href="/source/assets/css/style.css">
	
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
    @include('layouts.header')

    @yield('content')
    @include('layouts.footer')

	<!-- Back to Top -->
    {{-- <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a> --}}
	
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
