@extends('layout.member.main')
@section('filenamecss')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/main.css') }}">
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#add_tienich', function(e) {
                console.log('oke');
                $('#all_tienich').append(
                    '<div class = "col-4" style="margin-top: 10px" ><div class = "wrap-input100 validate-input" > <input class = "" id = "text" type = "text" name = "tienich[]" value = "" ></div> </div>'
                );
            });
            $(document).on('click', '#add_phobien', function(e) {
                console.log('oke');
                $('#all_phobien').append(
                    '<div class="col-6"><div class="wrap-input100 validate-input m-b-23"><input class="input100" type="text" name="diadiem[]" value=""><span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img src="{{ asset('assets/clients/img/location.png') }}" alt=""></span></div>@error('diadiem')<span style="color: red;">{{ $message }}</span>@enderror</div>'
                );
            });

        });
    </script>
@endsection
@section('main')
    <div class="limiter">

        <div class="container-login100" style="background-color: aliceblue">
            <div class="wrap-login1000 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ url('/register/partner') }}" class="login100-form validate-form">
                    @method('POST')
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Đăng kí đối tác
                    </span>
                    <div class="container">
                        <div style="margin-top: 20px;margin-bottom: 20px" class="wrap-input100 validate-input">
                            <span class="label-input100">Nhập tên đơn vị đối tác</span>
                            <input class="input100" id="repass" type="text" name="doitac" value="{{ old('doitac') }}"
                                placeholder="Nhập tên đơn vị đối tác...">
                            <span style="padding-top: 36px; padding-left: 9px" class="focus-input100"><img
                                    src="{{ asset('assets/clients/img/press-pass.png') }}" alt=""></span>
                            @error('doitac')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="container">
                        <div style="margin-top: 20px;margin-bottom: 20px" class="wrap-input100 validate-input">
                            <span class="label-input100">Nhập địa chỉ vị đối tác</span>
                            <input class="input100" id="repass" type="text" name="location"
                                value="{{ old('location') }}" placeholder="Nhập địa chỉ đơn vị đối tác...">
                            <span style="padding-top: 36px; padding-left: 9px" class="focus-input100"><img
                                    src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                            @error('location')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="container">
                        <div style="margin-top: 20px;margin-bottom: 20px">
                            <span class="label-input100">Chọn loại hình kinh doanh của đối tác</span>
                            <select class="form-control" aria-label="Default select example" name="id_danhmuc"
                                id="" style="width: 90%; height: 100%">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('id_danhmuc')
                                <p style="color: red;margin-top: 15px">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="container">
                        <div style="margin-top: 20px;margin-bottom: 20px;" class="wrap-input100 validate-input">
                            <span class="label-input100">Các tiện ích của đối tác</span>
                            <div class="row label-input100" id="all_tienich">
                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Wi-fi miễn phí"> Wi-fi miễn
                                    phí
                                </div>
                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Xe đưa đón sân bay"> Xe
                                    đưa đón sân bay
                                </div>
                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Không hút thuốc lá">
                                    Không hút thuốc lá
                                </div>

                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Phục vụ bữa sáng"> Phục vụ bữa
                                    sáng
                                </div>
                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Nhân viên hỗ trợ"> Nhân
                                    viên hỗ trợ
                                </div>
                                <div class="col-4" style=" padding-left:5px; margin-top:10px">
                                    <input type="checkbox" name="tienich[]" value="Spa & chăm sóc sức khỏe">
                                    Spa & chăm sóc sức khỏe
                                </div>
                            </div>
                            @error('tienich')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                            <div style="margin-top:6px">
                                <span id="add_tienich" class="label-input100" style="color: blue;cursor: context-menu;">+
                                    Thêm
                                    tiện
                                    ích</span>
                            </div>

                        </div>
                    </div>
                    <div class="container">
                        <span class="label-input100">Các địa điểm phổ biến trong khu vực</span>
                        <div class="row" id="all_phobien">
                            <div class="col-6">
                                <div class="wrap-input100 validate-input m-b-23">
                                    <input class="input100" type="text" name="diadiem[]"
                                        value="{{ old('diadiem1') }}">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" id="text" type="text" name="diadiem[]"
                                        value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="wrap-input100 validate-input m-b-23">
                                    <input class="input100" type="text" name="diadiem[]" value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" id="text" type="text" name="diadiem[]"
                                        value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="wrap-input100 validate-input m-b-23">
                                    <input class="input100" type="text" name="diadiem[]" value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" id="text" type="text" name="diadiem6"
                                        value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-6">
                                <div class="wrap-input100 validate-input m-b-23">
                                    <input class="input100" type="text" name="diadiem[]" value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <div class="wrap-input100 validate-input">
                                    <input class="input100" id="text" type="text" name="diadiem[]"
                                        value="">
                                    <span style="padding-top: 21px; padding-left: 9px" class="focus-input100"><img
                                            src="{{ asset('assets/clients/img/location.png') }}" alt=""></span>
                                </div>
                                @error('diadiem')
                                    <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div style="margin-top:6px">
                            <span id="add_phobien" class="label-input100" style="color: blue;cursor: context-menu;">+
                                Thêm
                                Phổ biến</span>
                        </div>
                    </div>

                    <div class="container">
                        <div style="margin-top: 20px;margin-bottom: 20px; " class="wrap-input100 validate-input">
                            <span class="label-input100">Nhập chú thích về đối tác</span>
                            <textarea name="note" rows="5" cols="90">Nhập ghi chú!</textarea>
                            @error('note')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Đăng ký
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
@endsection
