<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_tb3.png') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

</head>

<body>
    <div class="limiter">
        <div class="container-login100"
            style="background-image: url('https://sudospaces.com/karofi-com/karofi/images/uploads/images/Nguoi%20truong%20thanh/1-2.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                @if (\Session::has('error'))
                    <span style="color: red;">{{ \Session::get('error') }}</span>
                @endif
                <form method="POST" action="{{ url('/login/admin') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Đăng nhập admin
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
                            <input type="checkbox" name="remember_me" />
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
                            <button class="login100-form-btn" type="submit">
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

    <script src="{{ asset('assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
