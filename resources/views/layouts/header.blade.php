<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{route('home')}}" class="logo">Blue Sky <em> Coffe</em></a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{route('home')}}" class="active">Home</a></li>
                        <li><a href="{{route('table')}}">Book a table</a></li>
                        <li><a href="{{route('product')}}">Menu</a></li>
                        {{-- <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="/product" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>

                            <div class="dropdown-menu">
                                @if(isset($loai_sp))
                                @foreach ($loai_sp as $types)
                                <li><a href="{{route('product_type',$types ->id)}}">{{ $types->name }}</a></li>
                                @endforeach
                                @else
                                    <p>Không có dữ liệu loại sản phẩm.</p>
                                @endif
                            </div>
                        </li> --}}
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >About</a>
                          
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('about')}}" style="text-align: center; color:black">About Us</a>
                                {{-- <a class="dropdown-item" href="blog.html">Blog</a> --}}
                                {{-- <a class="dropdown-item" href="testimonials.html">Testimonials</a> --}}
                            </div>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li> 
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            <div class="dropdown-menu">
                                <a href="#">
                                    @if(Auth::check())
                                    {{-- Nếu người dùng đã đăng nhập --}}
                                    <i class="fa fa-user" style="text-align: center; vertical-align: middle"><span class="text-success">Welcome, {{ Auth::user()->full_name }}!</span></i>
                                    <form action="{{ route('getLogout') }}" method="post">
                                        @csrf
                                        {{-- <a href="#" class="btn btn-sm btn-danger">Đăng xuất</a> --}}
                                        <button type="submit" class="btn btn-sm btn-danger" title="Đăng xuất"><i class="fa fa-sign-out"></i></button>
                                    </form>
                                    @else
                                      {{-- Nếu người dùng chưa đăng nhập --}}
                                    <a href="/dangnhap" style="text-align: center; vertical-align: middle; color:black">Đăng nhập</a>
                                    <a href="/dangky" style="text-align: center; vertical-align: middle; color:black">Đăng kí</a>
                                    @endif
                                  </a>                                
                            </div>
                        </li>
                        <li class="dropdown">
                            @if(Auth::check())
                            <a href="{{ route('banhang.getdathang') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                            @endif
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