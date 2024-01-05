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
                        @if(isset($loai_sp))
                        @foreach ($loai_sp as $types)
                        <li><a href="{{route('product')}}">Menu</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('getProductType', $types->id)}}">{{ $types->name }}</a></li>
                            </div>
                        </li>
                        @endforeach
                        @else
                        <li><a href="{{route('product')}}">Menu</a></li>
                        @endif

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >About</a>
                          
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('about')}}" style="text-align: center; color:black">About Us</a>
                                {{-- <a class="dropdown-item" href="blog.html">Blog</a> --}}
                                {{-- <a class="dropdown-item" href="testimonials.html">Testimonials</a> --}}
                            </div>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        <li>
                            <div class="search-form">
                                <form action="{{ route('user.getSearch') }}" role="search" method="GET" id="searchform">
                                    @csrf
                                    @method('GET')
                                    <input type="text" name="search" placeholder="Search...">
                                    <button type="submit"><i class="fa-solid fa-search"></i></button>
                                </form>
                            </div>
                        </li>
                        @if (Auth::check())
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            <div class="dropdown-menu">
                                <a href="{{route('user.Profiles')}}" class="UserProfile"><i class="fa-solid fa-user" style="color: black">My Profiles</i></a>
                                <form action="{{ route('getLogout') }}" method="GET">
                                    @csrf
                                    {{-- @method('POST') --}}
                                    <a href="{{ route('getLogout') }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-right-from-bracket"></i></a>
                                </form>
                            </div>
                        </li>
                        @else
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            <div class="dropdown-menu">
                                <a href="#">
                                    <a href="/dangnhap" style="text-align: center; vertical-align: middle; color:black">Đăng nhập</a>
                                    <a href="/dangky" style="text-align: center; vertical-align: middle; color:black">Đăng kí</a>
                                </a>                                
                            </div>
                        </li>
                        @endif 
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