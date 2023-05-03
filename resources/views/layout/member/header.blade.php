<header>
    <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light  ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="col-xl-9">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link navbar-brand" href="menu.html">
                                    <img src="{{ asset('assets/clients/img/logo_tb3.png') }}" style="width: 60px">
                                    <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item item">
                                <a class="nav-link " style="color: #FFFFFF;;" href="gioithieu1.html">Giới thiệu</a>
                            </li>
                            <li class="nav-item item">
                                <a class="nav-link " style="color: #FFFFFF;;" href="menu.html">Đặt phòng</a>
                            </li>
                            <li class="nav-item item">
                                <a class="nav-link " style="color: #FFFFFF;;" href="#">Địa điểm nổi tiếng</a>
                            </li>
                            <li class="nav-item item">
                                <a class="nav-link  " style="color: #FFFFFF;" href="uudai.html">Ưu đãi hôm nay</a>
                            </li>
                            <li class="nav-item item">
                                <a class="nav-link  " style="color: #FFFFFF;" href="lienhe.html">Hỗ trợ</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-xl-3">
                    <div class="btn1">
                        <a href="{{ url('/login') }}"><button class="btn btn-outline-light" data-target="#mymodel"
                                data-toggle="modal">Đăng
                                nhập</button></a>

                        <a href="{{ url('/register') }}"><button class="btn btn-outline-light" data-target="#mymodel2"
                                data-toggle="modal">Đăng
                                Ký</button></a>
                    </div>
                </div>
            </div>

        </nav>
    </div>
</header>
