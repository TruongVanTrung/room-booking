@extends('layout.member.main')
@section('filenamecss')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/StyleGioiThieu.css') }}">
    <script src="{{ asset('assets/clients/js/lightslider.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('js')
@endsection
@section('main')
    <div style="background-color: #e2e2e2; height: 1000px">
        <p>t</p>
        <div class="" style="width: 70%; margin-top:3%; margin-left:15%;">
            <div class="row">
                <div class="col-12">
                    <div
                        style="width: 100%;  padding: 10px;
                        background-color: #ffffff;
                        border: 1px solid #f0f0f0;
                        border-radius: 10px;
                        box-shadow: 1px 1px 1px 1px #cdcccc;;
                        ">
                        <h3 style="text-align: center;color: #042f66">Các đơn đặt phòng</h3>

                        <table style="width: 100%;height: auto;margin-top: 30px; ">
                            <tr style="height: 42px;text-align: center;background-color:#042f66;">
                                <th style="width: 6%;border-radius: 5px"> ID</th>
                                <th style="width: 80%"> Thông tin đơn</th>
                                <th style="width: 14%;border-radius:5px "> Đặt phòng</th>
                            </tr>
                            @foreach ($order as $item)
                                <tr>
                                    <td style="color:#042f66; text-align:center;">
                                        {{ $item->id }}
                                    </td>
                                    <td style="color:#042f66">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row" style="margin-left: 3px; margin-top:15px;">
                                                    <div class="col-3">
                                                        Name:
                                                    </div>
                                                    <div class="col-9">
                                                        {{ $item->name }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 3px; margin-top:15px;">
                                                    <div class="col-3">
                                                        Email:
                                                    </div>
                                                    <div class="col-9">
                                                        {{ $item->email }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 3px; margin-top:15px;">
                                                    <div class="col-3">
                                                        Address:
                                                    </div>
                                                    <div class="col-9">
                                                        {{ $item->address }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 3px; margin-top:15px;">
                                                    <div class="col-3">
                                                        Phone:
                                                    </div>
                                                    <div class="col-9">
                                                        {{ $item->phone }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-left: 3px; margin-top:15px;">
                                                    <div class="col-3">
                                                        Note:
                                                    </div>
                                                    <div class="col-9">
                                                        {{ $item->note }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="row" style="margin-top:15px;">
                                                    <div class="col-4">
                                                        Room Name:
                                                    </div>
                                                    <div class="col-8">
                                                        {{ $item->room_name }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:15px;">
                                                    <div class="col-4">
                                                        Price:
                                                    </div>
                                                    <div class="col-8">
                                                        {{ $item->price }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:15px;">
                                                    <div class="col-4">
                                                        Quantity:
                                                    </div>
                                                    <div class="col-8">
                                                        {{ $item->quantity }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:15px;">
                                                    <div class="col-4">
                                                        CheckIn:
                                                    </div>
                                                    <div class="col-8">
                                                        {{ $item->check_in }}
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:15px;">
                                                    <div class="col-4">
                                                        CheckOut:
                                                    </div>
                                                    <div class="col-8">
                                                        {{ $item->check_out }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="color:#042f66">
                                        <a href="">
                                            <button type="button" class="btn btn-primary" style="margin-left: 10px;"> Hủy
                                                phòng
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
