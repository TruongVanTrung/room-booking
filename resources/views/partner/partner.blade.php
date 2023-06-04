@extends('layout.admin.main')

@section('title')
    Partner
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
@endsection
@section('js')
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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

                <h4 class="page-title">Partner</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin đối tác</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tfoot>
                            <tr style="">
                                <td style="width:200px"><span class="label-input100 font-weight-bold">Ảnh
                                        Đối tác:</span>
                                </td>
                                <td colspan="3">
                                    <div class="demo" style="width:640px;">
                                        <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                            @foreach ($image_partner as $item)
                                                <li data-thumb="{{ asset('upload/room/2_' . $item) }}"
                                                    data-src="{{ asset('assets/clients/img/controls.png') }}">
                                                    <img src="{{ asset('upload/room/2_' . $item) }}" />
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td><span class="label-input100 font-weight-bold">Tên
                                        đối tác:</span>
                                </td>
                                <td style="width:42%"><span class="label-input100">{{ $partner->name }}</span>
                                </td>
                                <td style="width:200px"><span class="label-input100 font-weight-bold">
                                        Danh
                                        mục:</span>
                                </td>
                                <td><span class="label-input100">{{ $partner->namecategory }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td><span class="label-input100 font-weight-bold">Tầng:</span>
                                </td>
                                <td style="width:42%"><span class="label-input100">{{ $partner->floor }}</span>
                                </td>
                                <td style="width:200px"><span class="label-input100 font-weight-bold">
                                        View:</span>
                                </td>
                                <td><span class="label-input100">{{ $partner->view }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td><span class="label-input100 font-weight-bold">Ghi chú:</span>
                                </td>
                                <td><span class="label-input100">{!! $partner->note !!}</span>
                                <td><span class="label-input100 font-weight-bold">Địa chỉ:</span>
                                </td>
                                <td><span class="label-input100">{{ $partner->address }}</span>
                                </td>

                            </tr>
                            <tr>
                                <td><span class="label-input100 font-weight-bold">Tiện ích:</span>
                                </td>
                                <td>
                                    @foreach (json_decode($partner->utilities) as $item)
                                        <span class="label-input100"> -- {{ $item }}</span>
                                    @endforeach

                                <td><span class="label-input100 font-weight-bold">Địa điểm phổ biến</span>
                                </td>
                                <td>
                                    @foreach (json_decode($partner->popular) as $item)
                                        <p class="label-input100">- {{ $item }}</p>
                                    @endforeach

                                </td>

                            </tr>
                        </tfoot>
                    </table>
                    <div class="container">
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"><a href="{{ url('partner/profile/' . $partner->id . '/edit') }}"><button
                                        type="submit" style="width:100%" class="btn btn-primary btn-block">Sửa</button>
                                </a>
                            </div>
                            <div class="col-4"></div>
                        </div>
                    </div>
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
