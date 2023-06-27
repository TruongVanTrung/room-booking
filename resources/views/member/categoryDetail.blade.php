@extends('layout.member.main')
@section('filenamecss')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/StyleTimCanHo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('main')
    <div class="s002">
        <form action="{{ url('search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="inner-form">
                <div class="input-field first-wrap">
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z">
                            </path>
                        </svg>
                    </div>
                    <input id="search_add" name="address" type="text" placeholder="Địa điểm?" />
                </div>
                <div class="input-field first-wrap">
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z">
                            </path>
                        </svg>
                    </div>
                    <input id="search" type="text" name="name" placeholder="Tên cơ sở?" />
                </div>
                <div class="input-field second-wrap">
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z">
                            </path>
                        </svg>
                    </div>
                    <input class="datepicker" id="depart" type="date" name="check_in" placeholder="Ngày đến" />
                </div>
                <div class="input-field third-wrap">
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path
                                d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z">
                            </path>
                        </svg>
                    </div>
                    <input class="datepicker" id="return" type="date" name="check_out" placeholder="Ngày đi" />
                </div>

                <div class="input-field fifth-wrap">
                    <button class="btn-search" type="submit">TÌM</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container ctn5" style="margin-top: 50px">
        <div class="header">
            <h2>Dánh sách tìm kiếm theo {{ isset($category) ? $category->name : '' }}</h2>
            <p>Nơi lưu trú</p>
        </div>

        <div class="row" style="margin-top: 3%;">
            @isset($partner)
                @foreach ($partner as $item)
                    <div class="col-md-4" style="margin-top: 3%;">
                        <div class="feature-box" style="height:480px">
                            <div class="feature-img">
                                <a href="{{ url('detail/' . $item->id) }}">
                                    <img src="{{ asset('upload/room/3_' . $item->image) }}" alt="">

                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                    </div>
                                    <div class="feature-details">
                                        <h5>{{ $item->name }}</h5>
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
                                            <i class="fa fa-map-marker"></i><span>{{ $item->address }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </div>
@endsection
