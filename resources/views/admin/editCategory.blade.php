@extends('layout.admin.main')

@section('title')
    EDIT Danh mục
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                $("#frames").html('');
                //console.log(this.files.length);
                for (var i = 0; i < $(this)[0].files.length; i++) {
                    $("#frames").append('<img style="margin-left: 10px; margin-top:10px" src="' + window.URL
                        .createObjectURL(this.files[i]) +
                        '" width="100px" height="100px"/>');
                }
            });
        });
    </script>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Room-booking</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                        <li class="breadcrumb-item active"> EDIT Category</li>
                    </ol>
                </div>
                <h4 class="page-title">EDIT Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ url('/admin/category/' . $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="simpleinput" class="form-label">Tên danh mục</label>
                                    <input type="text" id="simpleinput" name="namedanhmuc" class="form-control"
                                        value="{{ $category->name }}">
                                </div>
                            </div>
                            @error('namedanhmuc')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="row">
                                <div class="col-6">
                                    <label for="example-fileinput" class="form-label">Image</label>
                                    <input type="file" id="image" name="image" class="form-control"
                                        accept=".jpg, .jpeg, .png">
                                    {{-- image/* --}}
                                    <div id="frames"></div>
                                </div>
                            </div>
                            @error('image')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="btn btn-danger mb-3" type="submit" name="submit">EDIT</button>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
