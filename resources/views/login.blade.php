<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/clients/img/logo_tb3.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/clients/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/clients/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/clients/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/clients/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/clients/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/main.css') }}">

</head>

<body>
    <div class="limiter">
        <div class="container-login100"
            style="background-image: url({{ asset('assets/clients/img/anhnen4.png.jpg') }});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                @if (session('error'))
                    <div style="text-align: center" class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                {{-- @if (\Session::has('error'))
                    <span style="color: red;">{{ \Session::get('error') }}</span>
                @endif --}}
                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Đăng nhập
                    </span>

                    <div class="wrap-input100 validate-input m-b-23">
                        <span class="label-input100">Tên đăng nhập</span>
                        <input class="input100" id="user" type="text" name="email"
                            placeholder=" Tên đăng nhập">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @error('email')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Mật khẩu</span>
                        <input id="pass" class="input100" type="password" name="password" placeholder=" Mật khẩu">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @error('password')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row mb-5">
                        <div class="col-xl-6 mt-3">
                            <input type="checkbox" name="remember" />
                            <a href="#">
                                Ghi nhớ đăng nhập
                            </a>
                        </div>
                        <div class="col-xl-6 mt-3 text-right">

                            <a href="#">
                                Quên mật khẩu?
                            </a>

                        </div>
                    </div>


                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng nhập
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            Hoặc sử dụng đăng nhập
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="#" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <script src="{{ asset('assets/clients/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/clients/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets/clients/js/main.js') }}"></script>
</body>

</html>
