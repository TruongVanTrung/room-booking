<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng kí</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div class="limiter">
        <div class="container-login100"
            style="background-image: url({{ asset('assets/clients/img/anhnen4.png.jpg') }});">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ url('/register') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Đăng kí
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Tên đăng nhập</span>
                        <input class="input100" type="text" name="email" placeholder="Tên đăng nhập..."
                            value="{{ old('email') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        @error('email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Mật khẩu</span>
                        <input class="input100" type="password" name="password" placeholder="Nhập mật khẩu..."
                            value="{{ old('password') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div style="margin-top: 20px;margin-bottom: 20px" class="wrap-input100 validate-input"
                        data-validate="Password is required">
                        <span class="label-input100">Nhập lại mật khẩu</span>
                        <input class="input100" id="repass" type="password" name="cpassword"
                            placeholder="Nhập lại mật khẩu..." value="{{ old('cpassword') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        @error('cpassword')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng kí
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
