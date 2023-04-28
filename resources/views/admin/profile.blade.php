@extends('layout.admin.main')

@section('title')
    Profile
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#avatar').change(function() {
                //console.log(this.files.length);
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
                        <li class="breadcrumb-item active"> EDIT profile</li>
                    </ol>
                </div>

                <h4 class="page-title">EDIT profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ url('/admin/profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-7">
                            <div class="profile-img">
                                <img class="img_avatar" src="{{ asset('/upload/admin/avatar/' . $user->avatar) }}"
                                    alt="" />
                                <div class="file btn btn-lg btn-primary">
                                    Edit Photo
                                    <input type="file" name="avatar" id="avatar" accept=".jpg, .jpeg, .png" />
                                    @error('avatar')
                                        <p style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Name</label>
                                <input type="text" id="simpleinput" class="form-control" name="name"
                                    value="{{ $user->name }}">
                            </div>
                            @error('name')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="example-email" class="form-label">Email</label>
                                <input type="email" id="example-email" name="email" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                            @error('email')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="New Password">
                                    <div class="input-group-text" data-password="false">
                                        <span class="password-eye"></span>
                                    </div>
                                </div>
                            </div>
                            @error('password')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="example-palaceholder" class="form-label">Address</label>
                                <input type="text" id="example-palaceholder" name="address" class="form-control"
                                    value="{{ $user->address }}">
                            </div>
                            @error('address')
                                <p style="color: red;">{{ $message }}</p>
                            @enderror
                            <div class="mb-3">
                                <label for="example-readonly" class="form-label">Phone</label>
                                <input type="number" name="phone" id="example-readonly" class="form-control"
                                    value="{{ $user->phone }}">
                            </div>
                            @error('phone')
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
