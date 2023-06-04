@extends('layout.member.main')
@section('filenamecss')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
    <script src="{{ asset('assets/clients/js/lightslider.js') }}"></script>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
@section('main')
    <div style="background-color: #e2e2e2; height: 1000px">
        <p>t</p>
        <div class="" style="width: 70%; margin-top:3%; margin-left:15%;">
            <div class="row">
                <div class="col-8">
                    <div
                        style="width: 100%;  padding: 10px;
                        background-color: #ffffff;
                        border: 1px solid #f0f0f0;
                        border-radius: 10px;
                        box-shadow: 1px 1px 1px 1px #cdcccc;;
                        ">
                        <h3 style="text-align: center;color: #042f66">Thanh toán đơn đặt phòng</h3>
                        <h5 style="color: #042f66;margin-left: 15px;margin-top: 20px">Thông tin người đặt</h5>
                        <span style="color:#042f66;margin-left: 15px">(Vui lòng điền đầy đủ thông tin)</span>
                        @if (\Session::has('error'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('error') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('payment') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <table style="margin-top: 20px;margin-left: -6px;width: 100%;border: none;">
                                <tr style="">
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Họ tên</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="text" id="" name="name" class="form-control"
                                            placeholder="Họ tên" required>
                                        @error('name')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Email</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="email" id="myEmail" name="email" class="form-control"
                                            placeholder="Email" required>
                                        @error('email')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Số điện
                                            thoại</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="text" id="myNumber" name="phone" class="form-control"
                                            placeholder="Số di động" required>
                                        @error('phone')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Địa chỉ</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ">
                                        @error('address')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Số lượng</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="number" id="count" name="count" class="form-control"
                                            min="1" max="" required>
                                        @error('count')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Ngày nhận</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="date" value="{{ Session::get('check_in') }}" id="date1"
                                            name="check_in" class="form-control" required>
                                        @error('check_in')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:30%;padding-bottom: 15px;">
                                        <label style="margin-left: 20px;color: #042f66;font-size: 18px;">Ngày trả</label>
                                    </td>
                                    <td style="padding-bottom: 15px;">
                                        <input type="date" id="date2" value="{{ Session::get('check_out') }}"
                                            name="check_out" class="form-control" required>
                                        @error('check_out')
                                            <p style="color: red;">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>

                            </table>
                            <input type="hidden" value="{{ $room->id }} " name="idroom">
                            <input type="hidden" value="{{ $partner->id }} " name="idpartner">
                            <input type="hidden" value="{{ $room->price }} " name="price">
                            <h5 style="color: #042f66;margin-left: 15px;margin-top: 20px">Thông tin yêu cầu khác:
                            </h5>
                            <input type="text" id="my" name="note" class="form-control" placeholder=""
                                style="height: 60px;width: 97%;margin-left: 15px;">
                            @error('note')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror

                            <button type="submit" id="submit" value="Đặt" class="btn btn-primary"
                                style="width: 180px;height: 45px;margin-top: 20px;margin-left: 36%;margin-bottom: 20px; background-color: #042f66">
                                Đặt
                                phòng</button>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <div
                        style="width: 100%;  padding: 10px;
                        background-color: #ffffff;
                        border: 1px solid #f0f0f0;
                        border-radius: 10px;
                        box-shadow: 1px 1px 1px 1px #cdcccc;;
                        ">
                        <div style="padding-top: 8px; padding-bottom: 8px">
                            <h5>{{ $partner->name }}</h5>
                            <p>Đánh giá:</p>
                            <div class="rating3" style="color: #042f66;margin-top: -41px;margin-left: 80px">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="fa2" style="margin-top: 10px">
                                <span><i class="fa fa-map-marker"></i>{{ $partner->address }}</span>
                            </div>
                        </div>
                        <hr style="color: #e2e2e2">
                        <h5>{{ $room->name }}</h5>
                        <p></p>
                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                            @foreach (json_decode($room->image, true) as $item)
                                <li data-thumb="{{ asset('upload/room/3_' . $item) }}"
                                    data-src="{{ asset('assets/clients/img/controls.png') }}">
                                    <img style="width:360px" src="{{ asset('upload/room/3_' . $item) }}" />
                                </li>
                            @endforeach
                        </ul>
                        <div class="row" style="margin-top: 15px">

                            <div class="col-12">
                                <p>Khách/phòng: {{ $room->peoples }}</p>
                                <p>Kiểu giường: {{ $room->giuong }}</p>

                                {{-- <img style="width:97%; height:110px" src="{{ asset('storage/' . $image->url) }}"
                                    alt=""> --}}
                            </div>
                            <div class="col-12">
                                {{-- <p>{{ $room->peoples }}</p>
                                <p>{{ $room->giuong }}</p> --}}
                                <h5 style="color: crimson">Giá: {{ number_format($room->price, 0, '', ',') }} VND</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
