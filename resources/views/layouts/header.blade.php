<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">Restaurant <em> Website</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}" class="active">Home</a></li>
                        <li><a href="/source/book-table.html">Book a table</a></li>
                        <li><a href="/product">Menu</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>
                          
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/about">About Us</a>
                                {{-- <a class="dropdown-item" href="blog.html">Blog</a>
                                <a class="dropdown-item" href="testimonials.html">Testimonials</a> --}}
                            </div>
                        </li>
                        <li><a href="/lienhe">Contact</a></li> 
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            <div class="dropdown-menu">
                                <a href="#"><i class="fa fa-user"></i>
                                    @if(Auth::check())
                                    {{-- Nếu người dùng đã đăng nhập --}}
                                    <span class="text-success">Welcome, {{ Auth::user()->full_name }}!</span>
                                    <form action="{{ route('getLogout') }}" method="post">
                                        @csrf
                                        {{-- <a href="#" class="btn btn-sm btn-danger">Đăng xuất</a> --}}
                                        <button type="submit" class="btn btn-sm btn-danger" title="Đăng xuất"><i class="fa fa-sign-out"></i></button>
                                    </form>
                                    @else
                                      {{-- Nếu người dùng chưa đăng nhập --}}
                                      <a href="/dangnhap">Đăng nhập</a>
                                        <a href="/dangky">Đăng kí</a>
                                    @endif
                                  </a>                                
                            </div>
                        </li>
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->