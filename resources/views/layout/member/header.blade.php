<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="img/logo.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        <li class="nav-item active"><a class="nav-link" href="/">TRANG CHỦ</a></li>
                        <li class="nav-item"><a class="nav-link" href="">ƯU ĐÃI</a>
                        <li class="nav-item"><a class="nav-link" href="">ĐỊA ĐIỂM NỔI BẬT</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="{{ url('/blog') }}" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">BLOG</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">ALL</a></li>
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="contact.html">LIÊN HỆ</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right navbar-social" style="display:inline; width:20%;">
                        @if (Auth::user())
                            <li class="nav-item submenu dropdown">
                                <a style="font-size: 15px" href="#" class="nav-link dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    @if (Auth::user()->email)
                                        {{ Auth::user()->email }}
                                    @endif
                                </a>
                                <ul class="dropdown-menu" style="padding:9px;">
                                    @if (Auth::user()->level == 3)
                                        <li class="nav-item" style="margin-bottom: 10px;"><a
                                                href="{{ url('/partner/room') }}">Quản lý đối
                                                tác</a>
                                        </li>
                                    @else
                                        <li class="nav-item" style="margin-bottom: 10px;"><a
                                                href="{{ url('/register/partner') }}">Đăng ký đối
                                                tác</a></li>
                                    @endif

                                    <li class="nav-item" style="margin-bottom: 10px;"><a href="">Hỗ trợ</a>
                                    </li>
                                    <li class="nav-item" style="margin-bottom: 10px;"><a
                                            href="{{ url('/profile') }}">Thông tin cá
                                            nhân</a>
                                    </li>
                                    <li class="nav-item" style="margin-bottom: 10px;"><a
                                            href="{{ url('/order/history') }}">Đơn hàng</a>
                                    </li>
                                    <li class="nav-item" style="margin-left: -15px;">
                                        <form action="{{ url('/logout') }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" name="logout" class="btn ">
                                                Check Out</button>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                        @else
                            <li style="float: left"><a href="{{ url('/login') }}">Đăng nhập</a></li>
                            <li style="float:right"><a href="{{ url('/register') }}">Đăng kí</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
