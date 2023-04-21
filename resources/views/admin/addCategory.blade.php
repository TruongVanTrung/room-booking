@extends('layout.admin.main')

@section('title')
    ADD Danh mục
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Room-booking</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                        <li class="breadcrumb-item active"> ADD Category</li>
                    </ol>
                </div>
                <h4 class="page-title">ADD Category</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action=" {{ url('/admin/category/add') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="simpleinput" class="form-label">Tên danh mục</label>
                                    <input type="text" id="simpleinput" name="namedanhmuc" class="form-control">
                                </div>
                            </div>
                        </div>
                        @error('tendanhmuc')
                            <p style="color: red;">{{ $message }}</p>
                        @enderror
                        <button class="btn btn-danger mb-3" type="submit" name="submit">ADD</button>
                    </form>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
