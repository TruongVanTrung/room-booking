@extends('layout.member.main')
@section('filenamecss')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('main')
    <div class="container-fluid ctn">
        <div class="row">
            <div class="container">
                <div class="col-xl-12 col-md-9 col1">
                    <h1>Bạn đang cần tìm một nơi lưu trú?</h1>
                    <p>Hãy tìm kiếm với chúng tôi</h2>
                    <div id="booking" class="section">
                        <div class="section-center">
                            <div class="container">
                                <div class="row">
                                    <div class="booking-form">
                                        <form>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Bạn muốn đi đâu?">
                                                <span class="form-label">Điểm đến</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="date" required>
                                                        <span class="form-label">Ngày đến</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control" type="date" required>
                                                        <span class="form-label">Ngày đi</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select class="form-control" required>
                                                            <option value="" selected hidden>Số phòng</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                        <span class="form-label">Phòng</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select class="form-control" required>
                                                            <option value="" selected hidden>Số người lớn</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                        <span class="form-label">Người lớn</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select class="form-control" required>
                                                            <option value="" selected hidden>Số trẻ em</option>
                                                            <option>0</option>
                                                            <option>1</option>
                                                            <option>2</option>
                                                        </select>
                                                        <span class="select-arrow"></span>
                                                        <span class="form-label">Trẻ em</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-btn">
                                                <button class="submit-btn">Tìm kiếm</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ctn2">
        <div class="row">
            <div class="col-lg-12">
                <div class="header1">
                    <h2>Tìm theo kiếm nhu cầu</h2>
                    <p>Khám phá thêm nhà cho thuê du lịch</p>
                </div>
                <div class="row">
                    <div class="card-group ">
                        @foreach ($category as $item)
                            <div class="col-md-3 ">
                                <a href="{{ url('/admin/category/' . $item->id) }}" class="card1">
                                    <div class="card ">
                                        <img class="card-img-top" src="{{ asset('upload/admin/category/' . $item->image) }}"
                                            alt="Card image">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->name }}</h5>
                                            <p class="card-text">100,000 Chỗ nghỉ</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ctn3">
        <div class="header">
            <h2>Ưu đãi hôm nay</h2>
            <p>Nhanh tay kẻo lỡ</p>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#">
                        <img class="d-block w-100" src="{{ asset('assets/clients/img/pano3.jpg') }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 style="color: red;font-weight: bold;">Combo tiết kiệm đến 25%</h2>
                            <h2>Vui chơi toàn TP Đà Nẵng</h2>
                            <p> Giá chỉ: 3,330,990 VND/Khách</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img class="d-block w-100" src="{{ asset('assets/clients/img/pano1.jpg') }}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 style="color: red;font-weight: bold;">Combo tiết kiệm đến 25%</h2>
                            <h2>Vui chơi toàn TP Đà Nẵng</h2>
                            <p> Giá chỉ: 3,330,990 VND/Khách</p>
                        </div>
                    </a>
                </div>
                <div class="carousel-item">
                    <a href="#">
                        <img class="d-block w-100" src="{{ asset('assets/clients/img/pano2.jpg') }}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h2 style="color: red;font-weight: bold;">Combo tiết kiệm đến 25%</h2>
                            <h2>Vui chơi toàn TP Đà Nẵng</h2>
                            <p> Giá chỉ: 3,330,990 VND/Khách</p>
                        </div>
                    </a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">

                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">

                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container ctn5" style="margin-top: 50px">
        <div class="header">
            <h2>Gợi ý dành cho bạn</h2>
            <p>Nơi lưu trú nỗi bật</p>
        </div>
        <div class="row">
            @php
                $i = 0;
            @endphp
            @foreach ($partner as $item)
                @php
                    $i++;
                @endphp
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-img">
                            <a href="detail/{{ $item['id'] }}">
                                <img src="{{ asset('/upload/room/3_' . $item->image) }}" alt="">
                                <div class="price">
                                    <p class="panerr">No.{{ $i }}</p>
                                </div>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                </div>
                                <div class="feature-details">
                                    <h5>{!! $item->name !!}</h5>
                                    <p
                                        style="word-break: break-word;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: -webkit-box;
                                        line-height: 24px; /* fallback */
                                        max-height: 72px; /* fallback */
                                        -webkit-line-clamp: 3; /* number of lines to show */
                                        -webkit-box-orient: vertical;">
                                        {{ $item->note }}</p>
                                    <div class="fa1">
                                        <span><i class="fa fa-map-marker"></i> {{ $item->address }}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="container ctn4" style="margin-top: 50px">
        <div class="row">
            <div class="col-xl-12">
                <div class="header">
                    <h2>Điểm đến phổ biến hiện nay</h2>
                    <p>Hãy khám phá những nơi bạn nên đến</p>
                </div>
                <div class="row">
                    <div class="card-group ">
                        <div class="col-sm-2  ">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/hanoi.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title">Hà Nội</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2 ">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/danang.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title">Đà Nẵng</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/dalat.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title">Đà Lạt</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/nhatrang.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title ">Nha Trang</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/phuquoc.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title">Phú Quốc</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2 ">
                            <a href="Danang.html" class="card1">
                                <div class="card">
                                    <img class="card-img" src="{{ asset('assets/clients/img/hcm.jpg') }}"
                                        alt="Card image">
                                    <div class="card-img-overlay">
                                        <h6 class="card-title">Hồ Chí Minh</h6>
                                        <p class="card-text">Việt Nam</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
