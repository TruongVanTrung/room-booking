@extends('layout.member.main')
@section('filenamecss')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/StyleGioiThieu.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
    <script src="{{ asset('assets/clients/js/lightslider.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.desoslide.css') }}" />
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
    <div class="container ctn">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="color:#042f66;margin-top: ; ">Trải nghiệm dịch vụ siêu đẳng cấp tại
                        {{ $partner->name }}
                    </h5>
                    <p>- {{ $partner->note }}</p>
                    <h5 style="color:#042f66;margin-top: 20px; ">Chọn ngày nhận và trả phòng</h5>

                    <div class="form-group">
                        @php
                            $date = date('Y-m-d');
                            // $nowday = now()->toDateString();
                            $next_date = date('Y-m-d', strtotime($date . ' +1 day'));
                        @endphp
                        <form action=" {{ url('/check_date') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Ngày đến</label>
                                <input class="form-control" type="date" value="{{ Session::get('check_in') }}"
                                    name="check_in" min="{{ $date }}">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ngày đi</label>
                                <input class="form-control" type="date" value="{{ Session::get('check_out') }}"
                                    name="check_out" min="{{ $next_date }}">
                            </div>

                            <button class="btn-outline-primary" type="submit">Chọn ngày</button>

                        </form>
                    </div>

                    <h5 style="color:#042f66;margin-top: 20px;">Resort tương tự</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="https://cdn3.ivivu.com/2017/10/InterContinental-Danang-Sun-Peninsula-Resort-ivivu-2.png"
                                    style="margin-left: -27px;margin-top: 20px;height: 70px;width: 70px">
                                <img src="https://cdn.cet.edu.vn/wp-content/uploads/2018/02/thuat-ngu-resort-la-gi.jpg"
                                    style="margin-left: -27px;margin-top: 20px;height: 70px;width: 70px">
                                <img src="https://thailansensetravel.com/view/at_nhung-resort-dep-tai-thai-lan-cho-ki-nghi-lang-man_c8a90b9998ada6310810ff6d5c5117a8.jpg"
                                    style="margin-left: -27px;margin-top: 20px;height: 70px;width: 70px">
                            </div>
                            <div class="col-md-8">
                                <h6 style="margin-top: 20px;margin-left: -32px;">Furama Rosort</h6>
                                <p style="margin-left: -32px;font-size:12px">Đánh Giá:</p>
                                <div class="rating4"
                                    style="background:rgba(0,0,0,0);padding: 5px;margin-left: 20px;margin-top: -45px;color:#042f66; ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h6 style="margin-left: -32px;margin-top:33px;">Pullman Rosort</h6>
                                <p style="margin-left: -32px;font-size:12px">Đánh Giá:</p>
                                <div class="rating4"
                                    style="background:rgba(0,0,0,0);padding: 5px;margin-left: 20px;margin-top: -45px;color:#042f66; ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                                <h6 style="margin-top:33px;margin-left: -32px">Fusion Maia Rosort</h6>
                                <p style="margin-left: -32px;font-size:12px">Đánh Giá:</p>
                                <div class="rating4"
                                    style="background:rgba(0,0,0,0);padding: 5px;margin-left: 20px;margin-top: -45px;color:#042f66; ">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-9">

                    <div class="container ctnnn">
                        <h4> {{ $partner->name }}</h4>
                        <p>Đánh giá:</p>
                        <div class="rating3">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <div class="fa2">
                            <span><i class="fa fa-map-marker"></i> {{ $partner->address }}</span>
                        </div>
                    </div>

                    <div class="demo">
                        <div class="item">
                            <div class="clearfix" style="max-width:760px;">
                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach ($image_partner as $item)
                                        <li data-thumb="{{ asset('upload/room/2_' . $item) }}"
                                            data-src="{{ asset('assets/clients/img/controls.png') }}">
                                            <img style="width:760px;" src="{{ asset('upload/room/2_' . $item) }}" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h5 style="margin-top: 30px;color:blue">Tiên nghi của {{ $partner->name }}</h5>
                    <div class="container">
                        <div class="row">
                            @foreach (json_decode($partner->utilities, true) as $item)
                                <div class="col-md-4">
                                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-dot"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                    </svg><span>{{ $item }}</span><br>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <h5 style="margin-top: 10px;">Các địa điểm phổ biến lân cận:</h5>
                        <div class="container">
                            <div class="row">
                                @foreach (json_decode($partner->popular, true) as $item)
                                    <div class="col-md-6">
                                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-dot"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                        </svg><span>{{ $item }}</span><br>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <h5 style="margin-top: 10px;">Danh sách phòng:</h5>
                        <div class="table">
                            <table style="width: 766px;height: auto;margin-top: 30px; ">
                                <tr style="height: 42px;text-align: center;background-color:#042f66;">
                                    <th style="width: 266px;border-radius: 5px"> Loại phòng</th>
                                    <th style="width: 240px"> Các lựa chọn</th>
                                    <th style="width: 130px"> Giá hôm nay</th>
                                    <th style="width: 130px;border-radius:5px "> Đặt phòng</th>
                                </tr>
                                @foreach ($room as $item)
                                    <tr>
                                        <td style="color:#042f66">
                                            <h4 style="color: #042f66;font-weight: 600;padding: 10px">
                                                {{ $item->name }}</h4>

                                            {{-- <ul id="light-slider" class="gallery list-unstyled cS-hidden">
                                                @foreach (json_decode($item->image, true) as $v)
                                                    <li data-thumb="{{ asset('upload/room/3_' . $v) }}"
                                                        data-src="{{ asset('assets/clients/img/controls.png') }}">
                                                        <img style="width:200px;"
                                                            src="{{ asset('upload/room/3_' . $v) }}" />
                                                    </li>
                                                @endforeach
                                            </ul> --}}
                                            <img src="{{ asset('upload/room/3_' . json_decode($item->image, true)[0]) }}"
                                                style="width: 200px;height: 140px"><br>
                                            <div class="" style="margin-top: 10px">
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-people-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                                </svg>
                                                Số người: {{ $item->peoples }}.<br>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-lamp-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M2 3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3z" />
                                                    <path fill-rule="evenodd"
                                                        d="M7.5 1l.276-.553a.25.25 0 0 1 .448 0L8.5 1h-1zm-.615 8h2.23C9.968 10.595 11 12.69 11 13.5c0 1.38-1.343 2.5-3 2.5s-3-1.12-3-2.5c0-.81 1.032-2.905 1.885-4.5z" />
                                                </svg>
                                                Bồn tắm & vòi sen.<br>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-wifi" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.385 6.115a.485.485 0 0 0-.048-.736A12.443 12.443 0 0 0 8 3 12.44 12.44 0 0 0 .663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c2.507 0 4.827.802 6.717 2.164.204.148.489.13.668-.049z" />
                                                    <path
                                                        d="M13.229 8.271c.216-.216.194-.578-.063-.745A9.456 9.456 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.577 1.336c.205.132.48.108.652-.065zm-2.183 2.183c.226-.226.185-.605-.1-.75A6.472 6.472 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.408.19.611.09A5.478 5.478 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.611-.091l.015-.015zM9.06 12.44c.196-.196.198-.52-.04-.66A1.99 1.99 0 0 0 8 11.5a1.99 1.99 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .708 0l.707-.707z" />
                                                </svg>
                                                Wifi Free.<br>
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-truck" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                                </svg>
                                                Xe đưa đón miễn phí.<br>

                                            </div>
                                        </td>
                                        <td style="color:#042f66 ">
                                            @foreach (json_decode($item->tienich, true) as $value)
                                                <svg width="1em" height="1em" viewBox="0 0 16 16"
                                                    class="bi bi-check" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                                </svg>{{ $value }}.<br>
                                            @endforeach
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check"
                                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                            </svg>Đã bao gồm thuế.<br>
                                        </td>
                                        <td style="color: #042f66">
                                            <h4>{{ $item['gia'] }} VNĐ</h4>
                                            <h5 style="color: red">Còn:
                                                {{ $item['count'] != null ? $item['count'] : '*' }} Phòng</h5>
                                        </td>
                                        <td>
                                            @if (session()->has('check_in') && session()->has('check_out'))
                                                <a href="/payment/{{ $item->id }}/{{ $item['count'] }}">
                                                    <button type="button" class="btn btn-primary"
                                                        style="margin-left: 10px;"> Đặt phòng
                                                    </button>
                                                </a>
                                            @else
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#myModal1">Xem
                                                    số
                                                    phòng</button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal1" role="dialog"
                                                    style="margin-top: 60px">
                                                    <div class="modal-dialog modal-lg">

                                                        <!-- Modal content-->
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title font-weight-bold text-primary">Chọn
                                                                    ngày đến, ngày
                                                                    đi
                                                                    mong muốn</h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">&times;</button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <form action=" {{ url('/check_date') }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputEmail1"
                                                                                class="form-label">Ngày đến</label>
                                                                            <input class="form-control" type="date"
                                                                                class="form-control" name="check_in"
                                                                                min="{{ $date }}" required>

                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputPassword1"
                                                                                class="form-label">Ngày đi</label>
                                                                            <input class="form-control" type="date"
                                                                                class="form-control" name="check_out"
                                                                                min="{{ $next_date }}" required>
                                                                        </div>
                                                                        <div class="form-btn">
                                                                            <button class="submit-btn" type="submit">CHọn
                                                                                ngày</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endif


                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                        <h5 style="margin-top: 20px;">Thông tin về {{ $partner->name }}</h5>
                        <p>{{ $partner->note }}</p>


                        <h5 style="margin-top: 20px">Đánh giá của khách hàng về InterContinental Đà Nẵng Sun
                            Resort:
                        </h5>
                        <p style="color: #042f66">4.9/5 Sao: Rất tốt | 69 Đánh giá</p>
                        <h6>Đánh giá gần đây:</h6>
                        <hr>
                        <div>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12 1H4a1 1 0 0 0-1 1v11.755S4 12 8 12s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                <path fill-rule="evenodd"
                                    d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                            </svg> <span style="font-weight: 500">Trương Văn Trung</span>
                            <span style="margin-left: 50px;color: #042f66">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span><span style="font-weight: 500;font-size: 18px;color: #01A9DB">Verry Good</span>
                            <div style="font-size: 18px;margin-left: 200px">
                                <i>Dịch Vụ hoàn hảo...</i>
                            </div>
                        </div>
                        <hr>
                        <div>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12 1H4a1 1 0 0 0-1 1v11.755S4 12 8 12s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                <path fill-rule="evenodd"
                                    d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                            </svg> <span style="font-weight: 500"> Nguyễn Văn Nhất</span>
                            <span style="margin-left: 50px;color: #042f66">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span><span style="font-weight: 500;font-size: 18px;color: #01A9DB">Verry Good</span>
                            <div style="font-size: 18px;margin-left: 200px">
                                <i>Không gian rất đẹp...</i><br>
                                <img src="../BaiTapHTML/img/timresort3.jpg" style="width: 90px;height: 90px">
                                <img src="../BaiTapHTML/img/timresort4.jpg" style="width: 90px;height: 90px">
                            </div>
                        </div>
                        <hr>
                        <div>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-badge"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M12 1H4a1 1 0 0 0-1 1v11.755S4 12 8 12s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                <path fill-rule="evenodd"
                                    d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zM6 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z" />
                            </svg> <span style="font-weight: 500"> Võ Thị Hồng Vân</span>
                            <span style="margin-left: 50px;color: #042f66">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span><span style="font-weight: 500;font-size: 18px;color: #01A9DB">Verry Good</span>
                            <div style="font-size: 18px;margin-left: 200px">
                                <i>"Nhân viên rất nhiệt tình..."</i><br>
                                <img src="../BaiTapHTML/img/timresort7.jpg" style="width: 90px;height: 90px">
                                <img src="../BaiTapHTML/img/timresort8.jpg" style="width: 90px;height: 90px">
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('end_js')
    {{-- <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.desoslide.js') }}"></script> --}}
@endsection
