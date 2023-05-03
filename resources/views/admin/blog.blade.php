@extends('layout.admin.main')

@section('title')
    Blog
@endsection

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Room-booking</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">admin</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
                <h4 class="page-title">Blog</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <a href="{{ url('/admin/blog/create') }}" class="btn btn-danger mb-2"><i
                                    class="mdi mdi-plus-circle me-2"></i> Add Blog</a>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success mb-2 me-1"><i
                                        class="mdi mdi-cog"></i></button>
                                <button type="button" class="btn btn-light mb-2 me-1">Import</button>
                                <button type="button" class="btn btn-light mb-2">Export</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-bordered table-striped dt-responsive nowrap w-100"
                            id="" style="border:1px solid #d7d7d7;">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Content</th>
                                    <th style="width: 75px;">EDIT</th>
                                    <th>DELETE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $item)
                                    <tr>
                                        <td class="">
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            <img src="{{ asset('upload/admin/blog/img_thum/' . $item->image) }}"
                                                alt="contact-img" title="contact-img" class="rounded me-3" height="72"
                                                width="90">
                                        </td>
                                        <td class="">
                                            {{ $item->title }}
                                        </td>
                                        <td class="">
                                            {{ $item->description }}
                                        </td>
                                        <td class="">
                                            {!! $item->content !!}
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/blog/' . $item->id . '/edit') }}" class="action-icon">
                                                <i class="mdi mdi-square-edit-outline"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ url('/admin/blog/' . $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    style="border:none; background-color: transparent;outline: none;"><a
                                                        href="" class="action-icon"> <i
                                                            class="mdi mdi-delete"></i></a></button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
