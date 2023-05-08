@extends('layout.member.main')
@section('filenamecss')
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
@endsection
@section('main')
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner hero-banner--sm">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Khám phá thu vị quanh ta</h1>
                        <nav aria-label="breadcrumb" class="banner-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Khám phá thu vị quanh ta</h1>
                        <h4>Blog</h4>
                    </div>
                </div>
            </div>
        </section> --}}
        <!--================Hero Banner end =================-->

        <!--================ Start Blog Post Area =================-->
        <h2 style="text-align: center">Nội dung</h2>
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @foreach ($user as $item)
                            <div class="single-recent-blog-post">
                                <div class="thumb">
                                    <img class="img-fluid" src="{{ asset('/upload/admin/blog/img_thum/' . $item->image) }}"
                                        alt="">
                                    <ul class="thumb-info">
                                        <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                                        <li><a href="#"><i class="ti-notepad"></i>{{ $item->updated_at }}</a></li>
                                        <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                    </ul>
                                </div>
                                <div class="details mt-20">
                                    <a href="blog-single.html">
                                        <h3>{{ $item->title }}</h3>
                                    </a>
                                    <p class="tag-list-inline">Tag: <a href="#">travel</a></p>
                                    <p>{{ $item->description }}</p>
                                    <a class="button" href="{{ url('/blog/' . $item->id) }}">Read More <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination-area">
                            {{ $user->links('pagination::bootstrap-4') }}
                        </div>

                    </div>


                    <!-- Start Blog Post Siddebar -->
                    <div class="col-lg-4 sidebar-widgets">
                        @include('layout.member.rightSlide')
                    </div>
                </div>
                <!-- End Blog Post Siddebar -->
            </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection
