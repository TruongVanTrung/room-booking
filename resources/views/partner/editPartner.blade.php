@extends('layout.admin.main')

@section('title')
    Partner
@endsection
@section('css')
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/clients/css/lightslider.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/main.css') }}"> --}}
@endsection
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#add_tienich', function(e) {
                console.log('oke');
                $('#all_tienich').append(
                    '<div class="form-group col-md-6"> <input class="form-control" type="text" name="tienich[]" value=""> </div>'
                );
            });
            $(document).on('click', '#add_phobien', function(e) {
                console.log('oke');
                $('#all_phobien').append(
                    '<div class="form-group col-md-6"> <input class="form-control" type="text" name="diadiem[]" value=""> </div>'
                );
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
                <h3 class="m-0 font-weight-bold text-primary">Danh sách phòng</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/partner/profile/' . $partner->id) }}"
                    class="login100-form validate-form">
                    @method('PUT')
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tên đối tác</label>
                            <input class="form-control" type="text" name="doitac" value="{{ $partner->name }}">

                            @error('doitac')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Danh mục</label>
                            <select class="form-control" aria-label="Default select example" name="id_danhmuc"
                                id="" style="width: 90%; height: 100%">
                                @foreach ($category as $item)
                                    @if ($item->id == $partner->id_category)
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Địa chỉ</label>
                        <input class="form-control" type="text" name="location" value="{{ $partner->address }}">
                        @error('location')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Ghi chú</label>
                        <textarea class="form-control" name="note" rows="5" cols="90">{!! $partner->note !!}</textarea>
                        @error('note')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <label>Tiện ích</label>
                    <div class="form-row" id="all_tienich">

                        @foreach (json_decode($partner->utilities) as $item)
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" name="tienich[]" value="{{ $item }}">
                            </div>
                        @endforeach
                        @error('tienich')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin-top:6px; margin-bottom: 10px">
                        <span id="add_tienich" class="label-input100" style="color: blue;cursor: context-menu;">+
                            Thêm
                            tiện
                            ích</span>
                    </div>
                    <label>Phổ biến</label>
                    <div class="form-row" id="all_phobien">
                        @foreach (json_decode($partner->popular) as $item)
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" name="diadiem[]" value="{{ $item }}">
                            </div>
                        @endforeach
                        @error('diadiem')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div style="margin-top:6px;margin-bottom: 10px">
                        <span id="add_phobien" class="label-input100" style="color: blue;cursor: context-menu;">+
                            Thêm
                            Phổ biến</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
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
