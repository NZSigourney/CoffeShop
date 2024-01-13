<div class="tm-top-header">
    <div class="container">
      <div class="row">
        <div class="tm-top-header-inner">
          <div class="tm-logo-container">
            {{-- <img src="#" alt="Logo" class="tm-site-logo"> --}}
            <h1 class="tm-site-name tm-handwriting-font">Cafe House</h1>
          </div>
          <div class="mobile-menu-icon">
            <i class="fa fa-bars"></i>
          </div>
          <nav class="tm-nav">
            <ul>
              <li><a href="/" class="active">Home</a></li>
              {{-- <li><a href="today-special.html">Today Special</a></li> --}}
              <li><a href="{{route('product')}}">Menu</a></li>
              <li class="dropdown">
                <a href="{{route('contact')}}" class="dropbtn">Contact</a>
                <div class="dropdown-content">
                  <a href="{{ route('about') }}">About</a>
                </div>
              </li>
              <li class="dropdown">
                @if(Auth::check())
                <a href="{{ route('user.Profiles') }}" class="dropbtn">{{ Auth::user()->full_name }}</a>
                <div class="dropdown-content">
                  <a href="{{ route('getLogout') }}">Sign Out</a>
                </div>
                @else
                <a href="{{ route('admin.getLogin') }}" class="dropbtn">Login</a>
                <a href="{{ route('getsignin') }}">Sign in</a>
                @endif
              </li>
            </ul>
          </nav>   
        </div>           
      </div>    
    </div>
  </div>