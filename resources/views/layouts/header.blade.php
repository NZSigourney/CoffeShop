<div class="tm-top-header">
    <div class="container">
      <div class="row">
        <div class="tm-top-header-inner">
          <div class="tm-logo-container">
            {{-- <img src="#" alt="Logo" class="tm-site-logo"> --}}
            <h1 class="tm-site-name tm-handwriting-font">Blue Sky - Cafe</h1>
          </div>
          <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
          <nav class="tm-nav">
            <ul>
              <li><a href="/" class="active">Trang chính</a></li>
              {{-- <li><a href="today-special.html">Today Special</a></li> --}}
              <li><a href="{{route('product')}}">Thực Đơn</a></li>
              <li><a href="{{route('contact')}}" class="dropbtn">Liên Hệ</a></li>

              {{-- <form action="">
                <input type="search" required>
                <i class="fa fa-search"></i>
                <a href="javascript:void(0)" id="clear-btn">Clear</a>
              </form> --}}

              {{-- <li class="dropdown">
                <a href="{{route('contact')}}" class="dropbtn">Contact</a>
                <div class="dropdown-content">
                  <a href="{{ route('about') }}">About</a>
                </div>
              </li> --}}
              <li class="dropdown">
                @if(Auth::check())
                <a href="{{ route('user.Profiles') }}" class="dropbtn">{{ Auth::user()->full_name }}</a>
                <div class="dropdown-content">
                  <a href="{{ route('getLogout') }}">Đăng xuất</a>
                </div>
                @else
                <a href="{{ route('admin.getLogin') }}" class="dropbtn">Login</a>
                <a href="{{ route('getsignin') }}">Đăng ký</a>
                @endif
              </li>
              <li class="dropdown">
                @if(Auth::check())
                <a href="{{ route('banhang.getdathang') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                @endif
            </li>
            </ul>
          </nav>   
        </div>           
      </div>    
    </div>
  </div>