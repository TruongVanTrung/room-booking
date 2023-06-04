@extends('layout.admin.main')

@section('title')
    Edit Room
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var x = 0;
            $('#image_room').change(function() {
                console.log(this.files.length);
                console.log(this.files[0].name);
                $("#frames").html("");
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
                    '<div class="form-group col-md-4"> <input class="form-control" type="text" name="tienich[]" value=""> </div>'
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                    <form action=" {{ url('/partner/room/' . $room->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
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
                                        <div class="old-img" style="margin-top: 10px">

                                        </div>
                                        <div id="error_img"></div>
                                        <p style="color:red">Xóa ảnh</p>
                                        @foreach (json_decode($room->image) as $image)
                                            <input type="checkbox" class="check-form-input" name="check_image[]"
                                                value="{{ $image }}">
                                            <img style="width:120px; height:120px"
                                                src="{{ asset('upload/room/3_' . $image) }}" alt="">
                                        @endforeach
                                        @if (\Session::has('success'))
                                            <p style="color: red;margin-top: 15px">{!! \Session::get('success') !!}</p>
                                        @endif

                                        @error('image_room')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>

                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập tên phòng</span></td>
                                    <td><input type="text" name="room_name" class="form-control"
                                            value="{{ $room->name }}">
                                        @error('room_name')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>

                                    <td><span class="label-input100 font-weight-bold">Số lượng phòng</span></td>
                                    <td><input type="number" name="number_room" class="form-control"
                                            value="{{ $room->quantity }}">
                                        @error('number_room')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Nhập số người</span></td>
                                    <td><input type="number" name="number_people" class="form-control"
                                            value="{{ $room->peoples }}">
                                        @error('number_people')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">Giá tiền</span></td>
                                    <td><input type="number" name="number_price" class="form-control"
                                            value="{{ $room->price }}">
                                        @error('number_price')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold"> Số giường</span></td>
                                    <td><input type="number" name="number_giuong" class="form-control"
                                            value="{{ explode(' - ', $room->giuong)[0] }}">
                                        <select class="form-control" name="loai_giuong" id="">
                                            @if (explode(' - ', $room->giuong)[1] == 'Đơn')
                                                <option selected value="Đơn">Đơn</option>
                                                <option value="Đôi">Đôi</option>
                                            @else
                                                <option selected value="Đôi">Đôi</option>
                                                <option value="Đơn">Đơn</option>
                                            @endif
                                        </select>
                                        @error('number_giuong')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">Thuộc danh mục</span></td>
                                    <td><select class="form-control" aria-label="Default select example" name="id_danhmuc"
                                            id="" style="width: 90%; height: 100%">
                                            @foreach ($category as $item)
                                                @if ($item->id == $room->id_category)
                                                    <option selected value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endif
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
                                            value="{{ $room->floor }}">
                                        @error('number_tang')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td><span class="label-input100 font-weight-bold">View</span></td>
                                    <td><input type="text" name="text_view" class="form-control"
                                            value="{{ $room->view }}">
                                        @error('text_view')
                                            <p style="color: red;margin-top: 15px">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="label-input100 font-weight-bold">Tiện ích</span></td>
                                    <td colspan="3">
                                        <div class="form-row" id="all_tienich">
                                            @foreach (json_decode($room->tienich) as $item)
                                                <div class="form-group col-md-4">
                                                    <input class="form-control" type="text" name="tienich[]"
                                                        value="{{ $item }}">
                                                </div>
                                            @endforeach
                                            @error('tienich')
                                                <span style="color: red;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div style="margin-top:6px">
                                            <span id="add_tienich" class="label-input100"
                                                style="color: blue;cursor: context-menu;">+
                                                Thêm tiện ích</span>
                                        </div>
                                        {{-- <div class="container">
                                            <div style="margin-top: 20px;margin-bottom: 20px; ">

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
                                                    <input type="checkbox" name="tienich[]" value="Bộ vệ sinh cá nhân">
                                                    Bộ vệ sinh cá nhân
                                                </div>

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
                                        <div style="margin-top:6px">
                                            <span id="add_tienich" class="label-input100"
                                                style="color: blue;cursor: context-menu;">+
                                                Thêm tiện ích</span>
                                        </div> --}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label-input100 font-weight-bold">Ghi chú</span>
                                    </td>
                                    <td colspan="3">
                                        <textarea name="note" id="content" rows="5" cols="90">{!! $room->note !!}</textarea>
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
