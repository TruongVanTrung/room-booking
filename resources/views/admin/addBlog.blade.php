@extends('layout.admin.main')

@section('title')
    ADD Blog
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
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
    </script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
@section('css')
    <style>
        .profile-img {
            text-align: center;
            width: 200px;
            height: 200px;
            margin-bottom: 21px;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -30%;
            width: 100%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #515151b8;

        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
    </style>
@endsection
@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Room-booking</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                        <li class="breadcrumb-item active">Add blogs</li>
                    </ol>
                </div>

                <h4 class="page-title">ADD blog</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ url('/admin/blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-9">
                            <div class="profile-img">
                                <img class="img_avatar" src="" alt="" />
                                <div class="file btn btn-lg btn-primary">
                                    Image
                                    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" />
                                    @error('image')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Title</label>
                                <input type="text" id="simpleinput" class="form-control" name="title">
                            </div>
                            @error('title')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="example-email" class="form-label">Description</label>
                                <textarea class="form-control" id="example-textarea" rows="5" name="description"></textarea>
                                {{-- <input type="email" id="example-email" name="description" class="form-control"> --}}
                            </div>
                            @error('description')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="example-email" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="10" cols="72"></textarea>
                            </div>
                            @error('content')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <button class="btn btn-danger mb-3" type="submit">ADD</button>
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
