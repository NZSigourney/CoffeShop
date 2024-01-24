<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V2</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/Login/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/Login/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/fonts/iconic/Login/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/animsition/Login/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login/css/main.css">
    
    <link rel="stylesheet" href="/assets/css/login.css">
<!--===============================================================================================-->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <!-- Nút quay trở lại trang trước -->
                {{-- <a class="back-btn" href="javascript:history.back()">Back</a> --}}
                <form action="{{ route('admin.postLogin') }}" method="post" class="beta-form-checkout login100-form validate-form">
                    @csrf
                    @if(session('message'))
                        <script>
                            alert('{{ session('message') }}')
                        </script>
                    @endif
    
                    <span class="login100-form-title p-b-26" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; font-weight: bold">
                        Chào mừng bạn!
                    </span>
                    
                    <span class="login100-form-title p-b-48">
                        <i class="zmdi zmdi-font"></i>
                    </span>
    
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="email" name="email" id="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
    
                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password" id="pwd">
                        <span class="focus-input100" data-placeholder="Mật Khẩu"></span>
                    </div>
    
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng nhập
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            Quay về trang trước / Trang chính?
                        </span>
    
                        <a class="txt2" href="javascript:history.back()">
                            back
                        </a>/<a href="/" class="txt2">home</a>
                    </div>
    
                    <div class="text-center p-t-0">
                        <span class="txt1">
                            Không có tải khoản?
                        </span>
    
                        <a class="txt2" href="{{ route('getsignin') }}">
                            Đăng ký
                        </a>
                    </div>
    
                    <div class="text-center p-t-0">
                        <span class="txt1">
                            Quên mật khẩu?
                        </span>
    
                        <a class="txt2" href="{{route('getEmail')}}">
                            Bấm vào đây
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/Login/vendor/daterangepicker/moment.min.js"></script>
	<script src="/Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="/Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="/Login/js/main.js"></script>

    <script src="/assets/js/alert.js"></script>

</body>
</html>