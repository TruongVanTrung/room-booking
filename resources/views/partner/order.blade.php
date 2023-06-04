@extends('layout.admin.main')

@section('title')
    Order
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
@endsection
@section('js')
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script></script>
@endsection
@section('slider')
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">New</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Confirmed</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Received</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Completed</a></li>
                    </ol>
                </div>

                <h4 class="page-title">Order</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn đặt</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>

                            <th style="width: 6%;border-radius: 5px"> ID</th>
                            <th style="width: 80%"> Thông tin đơn</th>
                            <th style="width: 14%;border-radius:5px "> Đặt phòng</th>

                        </thead>
                        <tfoot>
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
                                        @if ($item->status == 0)
                                            <a href="">
                                                <button type="button" class="btn btn-primary" style="margin-left: 10px;">
                                                    Xác nhận
                                                </button>
                                            </a>
                                        @elseif ($item->status == 1)
                                            <a href="">
                                                <button type="button" class="btn btn-primary" style="margin-left: 10px;">
                                                    Đã nhận
                                                </button>
                                            </a>
                                        @else
                                            <a href="">
                                                <button type="button" class="btn btn-primary" style="margin-left: 10px;">
                                                    Hoàn thành
                                                </button>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tfoot>
                    </table>

                </div>
            </div>
        @endsection

        @section('end_js')
            <script>
                CKEDITOR.replace('content', {
                    filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
                    filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
                    filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
                    filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                    filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                    filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                });
            </script>
        @endsection
