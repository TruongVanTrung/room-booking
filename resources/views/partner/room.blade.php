@extends('layout.admin.main')

@section('title')
    Room
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#image').change(function() {
                //console.log(this.files.length);
                console.log(this.files[0].name);
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    $(".img_avatar").attr("src", window.URL
                        .createObjectURL(this.files[i]));
                    // $("#frames").append('<img style="margin-left: 10px; margin-top:10px" src="' + window.URL
                    //     .createObjectURL(this.files[i]) +
                    //     '" width="100px" height="100px"/>');
                }
            });
        });
    </script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
@section('css')
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
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ url('/admin/room') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tfoot>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập ảnh phòng</span></td>
                                    <td style="width:30%"><input type="file" name="image_room">
                                        @error('image_room')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">Thuộc danh mục</span></td>
                                    <td><select class="form-select" aria-label="Default select example" name="id_danhmuc"
                                            id="" style="width: 90%; height: 100%">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->tendanhmuc }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_danhmuc')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập tên phòng</span></td>
                                    <td><input type="text" name="room_name" class="form-control"
                                            value="{{ old('room_name') }}">
                                        @error('room_name')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>

                                    <td><span class="label-input100 font-weight-bold">Số lượng phòng</span></td>
                                    <td><input type="number" name="number_room" class="form-control"
                                            value="{{ old('number_room') }}">
                                        @error('number_room')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập số người</span></td>
                                    <td><input type="number" name="number_people" class="form-control"
                                            value="{{ old('number_parent') }}">
                                        @error('number_people')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">Giá tiền</span></td>
                                    <td><input type="number" name="number_price" class="form-control"
                                            value="{{ old('number_price') }}">
                                        @error('number_price')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập ghi chú</span></td>
                                    <td>
                                        <textarea name="note" rows="5" cols="90">Nhập ghi chú!</textarea>
                                        @error('note')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold"> Số giường</span></td>
                                    <td><input type="number" name="number_giuong" class="form-control">
                                        <select class="form-select" name="loai_giuong" id="">
                                            <option value="Đơn">Đơn</option>
                                            <option value="Đôi">Đôi</option>
                                        </select>
                                        @error('number_giuong')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label-input100 font-weight-bold">Tiện ích</span>
                                    </td>
                                    <td colspan="3">
                                        <div class="container">
                                            <div style="margin-top: 20px;margin-bottom: 20px; ">
                                                <div class="row label-input100">
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Bồn tắm">
                                                        Bồn tắm
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Vòi tắm đứng">
                                                        Vòi tắm đứng
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Máy lạnh"> Máy lạnh
                                                    </div>

                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Bộ vệ sinh cá nhân">
                                                        Bộ vệ sinh cá nhân
                                                    </div>
                                                </div>
                                                <div class="row label-input100" style="padding-top: 15px; padding-left:5px">
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Chậu rửa vệ sinh">
                                                        Chậu rửa vệ sinh
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Khăn tắm">
                                                        Khăn tắm
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Tivi"> Tivi
                                                    </div>

                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Dép">
                                                        Dép
                                                    </div>
                                                </div>
                                                <div class="row label-input100"
                                                    style="padding-top: 15px; padding-left:5px">
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Máy sấy tóc">
                                                        Máy sấy tóc
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Ấm đun nước điện">
                                                        Ấm đun nước điện
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]"
                                                            value="Tủ hoặc phòng để quần áo"> Tủ hoặc phòng để quần áo
                                                    </div>

                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Giá treo áo quần">
                                                        Giá treo áo quần
                                                    </div>
                                                </div>
                                                <div class="row label-input100"
                                                    style="padding-top: 15px; padding-left:5px">
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Két sắt an toàn">
                                                        Két sắt an toàn
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Bàn làm việc">
                                                        Bàn làm việc
                                                    </div>
                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]"
                                                            value="Nước đóng chai miễn phí"> Nước đóng chai miễn phí
                                                    </div>

                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]" value="Ban công">
                                                        Ban công
                                                    </div>
                                                </div>
                                                @error('tienich')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btnn">
                                <div class="login100-form-bgbtn"></div>
                                <button class="login100-form-btn">
                                    Thêm
                                </button>
                            </div>
                        </div>

                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
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
    //
@endsection
