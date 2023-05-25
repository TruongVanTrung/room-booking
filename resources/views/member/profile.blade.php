@extends('layout.member.main')
@section('filenamecss')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/clients/css/main.css') }}">
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
@section('main')
    <div class="limiter">
        <div class="container-login100" style="background-color: aliceblue">
            <div class="wrap-login1000 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <span class="login100-form-title p-b-49">
                        Update thông tin cá nhân
                    </span>
                    <div class="col-md-7">
                        <div class="profile-img">
                            <img class="img_avatar" style="width: 180px; height:180px"
                                src="{{ asset('/upload/member/avatar/' . $user->avatar) }}" alt="" />
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
            </div>
        </div>
    </div>
@endsection
