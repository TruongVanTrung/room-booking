@extends('layout.admin.main')

@section('title')
    Room
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
@endsection
@section('js')
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('.image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
@endsection
@section('slider')
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Room-booking</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">partner</a></li>
                        <li class="breadcrumb-item active">Room</li>
                    </ol>
                </div>

                <h4 class="page-title">Room</h4>
                <a href="{{ url('partner/room/create') }}"><button class="btn btn-outline-primary">Create Room</button></a>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Danh sách phòng</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="width: 36px;">Stt</th>
                                <th style="width: 150px;">Ảnh Phòng</th>
                                <th>Tên phòng</th>
                                <th>Số lượng</th>
                                <th>Số người</th>
                                <th>Giá</th>
                                <th>Số giường</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($room as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>

                                    <td>
                                        <div style="width:320px;">
                                            <ul class="image-gallery" class="gallery list-unstyled cS-hidden">
                                                @foreach (json_decode($item->image) as $value)
                                                    <li data-thumb="{{ asset('upload/room/3_' . $value) }}"
                                                        data-src="{{ asset('assets/clients/img/controls.png') }}">
                                                        <img src="{{ asset('upload/room/3_' . $value) }}" />
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td>

                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{ $item->quantity }}
                                    </td>
                                    <td>
                                        {{ $item->peoples }}
                                    </td>
                                    <td>
                                        {{ $item->price }}
                                    </td>
                                    <td>
                                        {{ $item->giuong }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="{{ '#myModal' . $item->id }}">Xem chi tiết</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="{{ 'myModal' . $item->id }}" role="dialog">
                                            <div class="modal-dialog modal-xl">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title font-weight-bold text-primary">Thông tin chi
                                                            tiết phòng</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>

                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered" id="dataTable" width="100%"
                                                            cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td style=""><span
                                                                            class="label-input100 font-weight-bold">View:</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="label-input100">{{ $item->view }}</span>
                                                                    </td>
                                                                    <td style=""><span
                                                                            class="label-input100 font-weight-bold">Thuộc
                                                                            danh
                                                                            mục:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item['namecategory'] }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="label-input100 font-weight-bold">Tên
                                                                            phòng:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100"><b>{{ $item->name }}</b></span>
                                                                    </td>

                                                                    <td><span class="label-input100 font-weight-bold">Số
                                                                            lượng
                                                                            phòng:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item->quantity }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="label-input100 font-weight-bold">Số
                                                                            người:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item->peoples }}</span>
                                                                    </td>
                                                                    <td><span class="label-input100 font-weight-bold">Giá
                                                                            tiền:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item->price }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="label-input100 font-weight-bold">Ghi
                                                                            chú:</span>
                                                                    </td>
                                                                    <td>
                                                                        <span
                                                                            class="label-input100">{!! $item->note !!}</span>
                                                                    </td>
                                                                    <td><span class="label-input100 font-weight-bold"> Số
                                                                            giường:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item->giuong }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td><span class="label-input100 font-weight-bold">Tiện
                                                                            ích:</span>
                                                                    </td>
                                                                    <td>
                                                                        @foreach (json_decode($item->tienich) as $v)
                                                                            <span class="label-input100"> -
                                                                                {{ $v }} </span>
                                                                        @endforeach

                                                                    </td>
                                                                    <td><span class="label-input100 font-weight-bold"> Các
                                                                            tầng:</span>
                                                                    </td>
                                                                    <td><span
                                                                            class="label-input100">{{ $item->floor }}</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-3"><a
                                                                    href="{{ url('/partner/room/' . $item->id . '/edit') }}"><button
                                                                        type="submit"
                                                                        class="btn btn-primary btn-block">Sửa</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-3"><button type="submit"
                                                                    class="btn btn-danger btn-block">Xóa</button>
                                                            </div>
                                                            <div class="col-3"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
