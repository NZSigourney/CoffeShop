<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/bootstrap//source/login/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/fonts/font-awesome-4.7.0//source/login/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/fonts/iconic//source/login/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/animsition//source/login/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="/source/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/source/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="/source/login/css/main.css">
<!--===============================================================================================-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<!--===============================================================================================-->
</head>
<body>
    <div class="alert alert-dismissible fade show" role="alert">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>    
    <form action="{{ route('postsignin') }}" method="post" class="beta-form-checkout">
        {{-- @method('POST') --}}
        @csrf
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form">
                        <span class="login100-form-title p-b-26">
                            Welcome
                        </span>
                        <span class="login100-form-title p-b-48">
                            <i class="zmdi zmdi-font"></i>
                        </span>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                            <input class="input100" type="text" name="full_name">
                            <span class="focus-input100" data-placeholder="Full Name"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                            <input class="input100" type="email" name="email">
                            <span class="focus-input100" data-placeholder="Email"></span>
                        </div>
    
                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="password">
                            <span class="focus-input100" data-placeholder="Password"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <span class="btn-show-pass">
                                <i class="zmdi zmdi-eye"></i>
                            </span>
                            <input class="input100" type="password" name="repassword">
                            <span class="focus-input100" data-placeholder="repassword"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="address">
                            <span class="focus-input100" data-placeholder="address"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" name="phone">
                            <span class="focus-input100" data-placeholder="phone"></span>
                        </div>
    
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
                                    Login
                                </button>
                            </div>
                        </div>
    
                        <div class="text-center p-t-115">
                            <span class="txt1">
                                Don’t have an account?
                            </span>
    
                            <a class="txt2" href="#">
                                Sign Up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/source/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/source/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/source/login/vendor/bootstrap/js/popper.js"></script>
	<script src="/source/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/source/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/source/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/source/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/source/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>