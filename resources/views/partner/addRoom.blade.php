@extends('layout.admin.main')

@section('title')
    Room
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            var x = 0;
            $('#image_room').change(function() {
                console.log(this.files.length);
                console.log(this.files[0].name);
                $("#frames").html("")
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    // $(".image_room").attr("src", window.URL
                    //     .createObjectURL(this.files[i]));
                    $("#frames").append(
                        '<img style="margin-right: 10px; margin-top:10px;" src="' +
                        window.URL
                        .createObjectURL(this.files[i]) +
                        '" width="100px" height="100px"/>');
                }
                if (this.files.length > 3) {
                    x = 1;
                    $("#error_img").html(
                        '<p style="color: red;margin-top: 15px"> Chỉ được chọn tối đa 3 ảnh</p>');
                } else {
                    x = 0;
                    $("#error_img").html("");
                }
                console.log(x);
            });
            $(document).on('click', '#add_tienich', function(e) {
                console.log('oke');
                $('#all_tienich').append(
                    '<div class = "col-4" style="margin-top: 10px" ><div> <input class = "form-control" id = "text" type = "text" name = "tienich[]" value = "" ></div> </div>'
                );
            });
            $(document).on('click', '#submit', function(e) {
                console.log(x);
                if (x == 1) {
                    alert("Chỉ được thêm tối đa 3 ảnh!");
                    return false;
                }
            });
        });
    </script>
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
                    <form action=" {{ url('/partner/room') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tfoot>
                                <tr>
                                    <td colspan=""><span class="label-input100 font-weight-bold">Nhập ảnh phòng</span>
                                    </td>
                                    <td colspan="3">
                                        <input type="file" multiple id="image_room" name="image_room[]">
                                        <div class="frames" id="frames">

                                        </div>
                                        <img class="image_room" src="" alt="" />
                                        <div id="error_img"></div>
                                        @error('image_room')
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
                                            value="{{ old('number_people') }}">
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
                                    <td><span class="label-input100 font-weight-bold">Thuộc danh mục</span></td>
                                    <td><select class="form-select" aria-label="Default select example" name="id_danhmuc"
                                            id="" style="width: 90%; height: 100%">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_danhmuc')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập tầng</span></td>
                                    <td><input type="text" name="number_tang" class="form-control"
                                            value="{{ old('number_tang') }}">
                                        @error('number_tang')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">View</span></td>
                                    <td><input type="text" name="text_view" class="form-control"
                                            value="{{ old('text_view') }}">
                                        @error('text_view')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Tiện ích</span></td>
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
                                                        <input type="checkbox" name="tienich[]" value="Máy lạnh"> Máy
                                                        lạnh
                                                    </div>

                                                    <div class="col-3">
                                                        <input type="checkbox" name="tienich[]"
                                                            value="Bộ vệ sinh cá nhân">
                                                        Bộ vệ sinh cá nhân
                                                    </div>
                                                </div>
                                                <div class="row label-input100"
                                                    style="padding-top: 15px; padding-left:5px">
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
                                                <div class="row" id="all_tienich">

                                                </div>
                                                @error('tienich')
                                                    <span style="color: red;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div style="margin-top:6px">
                                            <span id="add_tienich" class="label-input100"
                                                style="color: blue;cursor: context-menu;">+
                                                Thêm tiện ích</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label-input100 font-weight-bold">Ghi chú</span>
                                    </td>
                                    <td colspan="3">
                                        <textarea name="note" id="content" rows="5" cols="90">Nhập ghi chú!</textarea>
                                        @error('note')
                                            <span style="color: red;">{{ $message }}</span>
                                        @enderror
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btnn">
                                <div class="login100-form-bgbtn"></div>
                                <button id="submit" class="btn btn-outline-primary">
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
