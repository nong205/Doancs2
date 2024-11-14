@extends('layouts.client')

@section('main')
    <main>
        <!-- ====== start Latest news ====== -->
        <section class="tc-latest-news-style1">
            <div class="container">
                <div class="section-content pt-30 pb-50 border-bottom border-1 brd-gray">
                    <p class="color-000 text-uppercase mb-30 ltspc-1"> <a href="#1"> TIN MỚI NHẤT </a> <i class="la la-angle-right ms-1"></i>
                    </p>
                    <div class="row">
                        @if(isset($priorityBlog) && is_object($priorityBlog))
                        <div class="col-lg-8 border-end brd-gray border-1">
                            <div class="tc-post-grid-default">
                                <div class="item">

                                    <div class="img img-cover th-330 overflow-hidden">

                                        <a href="{{ route('client.blog.detail', ['slug' => $priorityBlog->slug]) }}">
                                            <img class="image-blog" src="{{ asset('upload/blog/'.$priorityBlog->image_file) }}" alt="{{ $priorityBlog->slug }}">
                                        </a>

                                    </div>

                                    <div class="content pt-30">
                                        <a href="{{ route('client.blog.category', ['slug' => $priorityBlog->category_slug]) }}"
                                           class="news-cat color-999 fsz-13px text-uppercase mb-10"> {{ $priorityBlog->category_name }}</a>
                                        <h2 class="title mb-20">
                                            <a href="{{ route('client.blog.detail', ['slug' => $priorityBlog->slug]) }}">
                                                {{    Str::limit($priorityBlog->title, 100, '...') }}

                                    </a>
                                </h2>
                                <div class="text color-666">
                                    @php
                                        $content = Str::limit(strip_tags(html_entity_decode($priorityBlog->content)), 200, ' [...]');
                                    @endphp

                                    {{ $content }}
                                        </div>
                                        <div class="meta-bot lh-1 mt-40">
                                            <ul class="d-flex">
                                                <li class="date me-5">
                                                    <a href="{{ route('client.blog.detail', ['slug' => $priorityBlog->slug]) }}">
                                                        <i class="la la-calendar me-2"></i>
                                                        
                                                        {{ date('Y-m-d H:i:s', strtotime($priorityBlog->created_at)) }}
                                                    </a>
                                                </li>
                                                <li class="author me-5">
                                                    <a href="#"><i class="la la-user me-2"></i> Tác giả: {{ $priorityBlog->user_name }}</a>
                                                </li>
                                                <li class="comment">
                                                    <a href="#"><i class="la la-comment me-2"></i> 0 Bình luận</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-lg-8">
                                Bài viết ưu tiên ko có kết quả
                            </div>
                        @endif
                        <div class="col-lg-4 border-end brd-gray border-1">
                            <div class="tc-post-list-style2">
                                <div class="items">

                                @if(isset($blogWidgets) && is_object($blogWidgets))
                                    @foreach($blogWidgets as $value)
                                    <div class="item">
                                        <div class="row gx-3 align-items-center">
                                            <div class="col-4">
                                                <div class="img th-70 img-cover">
                                                    <a href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}">
                                                        <img src="{{ asset('upload/blog/'.$value->image_file) }}" alt="{{ $value->slug }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <div class="content">
                                                    <div class="news-cat color-999 fsz-13px text-uppercase mb-1">
                                                        <a href="{{ route('client.blog.category', ['slug' => $value->slug]) }}" class="text-danger">
                                                            {{ $value->category_name }}
                                                        </a>
                                                    </div>
                                                    <h5 class="title ltspc--1">
                                                        <a style="font-size: 15px" href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}"
                                                           class="hover-underline">
                                                            @php
                                                                $title = Str::limit($value->title, 65, '...');
                                                            @endphp


                                                            {!! $title !!}



                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif


                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>
        <!-- ====== end Latest news ====== -->

        <!-- ====== start popular posts ====== -->
        <section class="tc-popular-posts-blog">
            <div class="container">
                <div class="content pt-50 pb-50 border-1 border-bottom brd-gray">
                    <p class="color-000 text-uppercase mb-30 ltspc-1"> <a href="#1"> nhiều lượt xem  </a> <i class="la la-angle-right ms-1"></i>

                    <div class="tc-post-grid-default">
                        <div class="tc-popular-posts-blog-slider9 tc-slider-style1">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                @if(isset($blogByView) && is_object($blogByView))
                                    @foreach($blogByView as $value)
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <div class="img img-cover th-180">
                                                <a href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}">
                                                    <img src="{{ asset('upload/blog/'. $value->image_file) }}" alt="{{  $value->slug }}">

                                                </a>
                                            </div>
                                            <div class="content pt-20">
                                                <a href="#"
                                                   class="news-cat color-999 fsz-13px text-uppercase mb-10">  {{ $value->category_name }}</a>
                                                <h4 class="title ltspc--1 mb-10">
                                                    <a href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}">
                                                        {{ Str::limit($value->title, 50, '...') }}
                                                    </a>
                                                </h4>
                                                <div class="text color-666">
                                                    @php
                                                        $content = Str::limit(strip_tags(html_entity_decode($value->content)), 90, ' [...]');
                                                    @endphp
                                                    <a href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}">
                                                        {{ $content }}
                                                    </a>

                                                </div>
                                                <div class="meta-bot lh-1 mt-20">
                                                    <ul class="d-flex">
                                                        <li class="date me-5">
                                                            <a href="#1"><i class="la la-calendar me-2"></i>
                                                                {{ date('Y-m-d H:i:s', strtotime($value->created_at)) }}
                                                            </a>
                                                        </li>
                                                        <li class="comment">
                                                            <a href="#1"><i class="la la-comment me-2"></i> 0</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @endif

                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- ====== end popular posts ====== -->

        <!-- ====== start posts tabs ====== -->
        <section class="tc-posts-tabs-style2 pt-70 pb-70">
            <div class="container pb-50 border-bottom border-1">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="tc-tabs-content">
                            <div class="tc-tabs-header">
                                <div class="section-title-style2 mb-30 align-items-end">
                                    <h3 class="lh-2">TIN Y TẾ </h3>
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-bestTech-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-bestTech" type="button" role="tab"
                                                    aria-controls="pills-bestTech" aria-selected="true">
                                                Mới nhất
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-hangsOn-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-hangsOn" type="button" role="tab" aria-controls="pills-hangsOn"
                                                    aria-selected="false">
                                                Cũ nhất
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <!-- bestTech -->
                                <div class="tab-pane fade show active" id="pills-bestTech" role="tabpanel"
                                     aria-labelledby="pills-bestTech-tab">
{{--                                    Tin công nghệ--}}
                                    @if(isset($blogLimitNew) && is_object($blogLimitNew))
                                        @foreach($blogLimitNew as $value)
                                        <div class="tc-post-grid-default pb-20">

                                            <div class="item pb-30 border-bottom border-1 brd-gray">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="img th-180 img-cover">

                                                                <img src="{{ asset('upload/blog/'.$value->image_file ) }}" alt="{{ $value->slug }}">

                                                            <span class="rate">9.5</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 mt-4 mt-lg-0">
                                                        <div class="content">

                                                            <div class="tags mb-15">

                                                                <a href="{{ route('client.blog.detail', $value->slug) }}" class="bg-green text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ $value->category_name }}</a>
                                                            </div>
                                                            <h3 class="title hover-underline">
                                                                <a href="{{ route('client.blog.detail', $value->slug) }}">{{ $value->title }}</a>
                                                            </h3>
                                                            <div class="meta-bot lh-1 mt-50">
                                                                <ul class="d-flex">
                                                                    <li class="date me-5">
                                                                        <a href="#"><i class="la la-calendar me-2"></i>
                                                                            {{ date('Y-m-d H:i:s', strtotime($value->created_at)) }}
                                                                        </a>
                                                                    </li>
                                                                    <li class="author me-5">
                                                                        <a href="#"><i class="la la-user me-2"></i> Tác giả: {{ $value->user_name }} </a>
                                                                    </li>
                                                                    
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endforeach
                                    @endif

                                    <!-- Hiển thị phân trang -->



                                </div>

                                <!-- hangsOn -->
                                <div class="tab-pane fade" id="pills-hangsOn" role="tabpanel" aria-labelledby="pills-hangsOn-tab">

                                    @if(isset($blogLimitOld) && is_object($blogLimitOld))
                                        @foreach($blogLimitOld as $value)
                                            <div class="tc-post-grid-default pb-20">

                                                <div class="item pb-30 border-bottom border-1 brd-gray">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="img th-180 img-cover">
                                                                <img src="{{ asset('upload/blog/'.$value->image_file ) }}" alt="{{ $value->slug }}">
                                                                <span class="rate">9.5</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 mt-4 mt-lg-0">
                                                            <div class="content">
                                                                <div class="tags mb-15">
                                                                    <a href="#" class="bg-green text-white py-1 px-3 rounded-pill fsz-10px text-uppercase me-2">{{ $value->category_name }}</a>
                                                                </div>
                                                                <h3 class="title hover-underline">
                                                                    <a href="{{ route('client.blog.detail', $value->slug) }}">{{ $value->title }}</a>
                                                                </h3>
                                                                <div class="meta-bot lh-1 mt-50">
                                                                    <ul class="d-flex">
                                                                        <li class="date me-5">
                                                                            <a href="#"><i class="la la-calendar me-2"></i> 
                                                                                 {{ date('Y-m-d H:i:s', strtotime($value->created_at)) }}
                                                                            </a>
                                                                        </li>
                                                                        <li class="author me-5">
                                                                            <a href="#"><i class="la la-user me-2"></i> Tác giả: {{ $value->user_name }} </a>
                                                                        </li>
                                                                        
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <!-- Sidebar -->
                        <div class="col-lg-3">
                            <div class="widgets-sticky mt-5 mt-lg-0">
                                <!-- Danh mục -->
                                <div class="tc-widget-tags-style5 mb-40">
                                    <p class="color-000 text-uppercase mb-30"> Danh mục bài viết </p>
                                    <div class="tags-content">
                                        @if(isset($listCategory) && is_object($listCategory))
                                            @foreach($listCategory as $value)
                                                <a href="{{ route('client.blog.category', ['slug' => $value->slug] ) }}">{{ $value->name }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- end Danh mục -->

                                <div class="tc-post-list-style2 pb-40">
                                    <p class="color-000 text-uppercase mb-30"> Bài viết mới nhất </p>
                                    <div class="items">

                                        @if(isset($blogWidgets) && is_object($blogWidgets))
                                        @foreach($blogWidgets as $value)
                                            <a href="{{ route('client.blog.detail', ['slug' => $value->slug]) }}"
                                            class="item d-block border-1 border-top border-bottom-0 brd-gray pt-15 mt-15">
                                                <div class="row gx-3 align-items-center">
                                                    <div class="col-4">
                                                        <div class="img th-50 img-cover">
                                                            <img src="{{ asset('upload/blog/'.$value->image_file) }}" alt="{{ $value->slug }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <div class="content">
                                                            <h6 class="title ltspc--1">
                                                                @php
                                                                    $title = Str::limit($value->title, 40, '...');
                                                                @endphp


                                                                {!! $title !!}
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            @endforeach
                                        @endif

                                        
                                    </div>
                                </div>



                                <!-- widget tags -->
                                <div class="tc-widget-tags-style5 mb-40">
                                    <p class="color-000 text-uppercase mb-30"> Hot Tags Hôm nay </p>
                                    <div class="tags-content">
                                        @if(isset($blogTagWidgets) && is_object($blogTagWidgets))
                                            @foreach($blogTagWidgets as $value)
                                                <a href="{{ route('client.blog.tag', ['name' => $value->name ]) }}">{{ $value->name }}</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <!-- end widget tags -->

                            </div>

                        </div>

                </div>
            </div>
        </section>
        <!-- ====== end posts tabs ====== -->







        <!-- ====== start Popular Topics ====== -->
        {{-- <section class="tc-popular-topics-style2 pt-60 pb-60">
            <div class="container">
                <div class="section-title-style2 mb-30">
                    <h3 class="lh-2">Những chủ đề phổ biến</h3>
                </div>
                <div class="tc-popular-topics-slider2 tc-slider-style1 slider-color-blue1">
                    <div class="tc-post-grid-default">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/1.png') }}') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Mobile & Tablet</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 25 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/2.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Gaming</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 12 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/3.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">AI & Robo</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 7 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/4.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Crypto</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 8 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/5.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Gadgets</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 15 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/6.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Spaces</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 2 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <a href="page-single-post-creative.html" class="img img-cover th-100 d-block">
                                            <img src="{{ asset('assets/client/img/topics/4.png') }}" alt="">
                                        </a>
                                        <div class="content pt-15">
                                            <h6 class="title fw-bold"> <a href="page-single-post-creative.html" class=" hover-underline">Crypto</a> </h6>
                                            <div class="meta-bot lh-4 fsz-13px color-999">
                                                <a href="#"> 8 Posts</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section> --}}
        <!-- ====== end Popular Topics ====== -->









        <!-- ====== start latest posts ====== -->
        {{-- <section class="">
            <div class="container">
                <div class="section-title-style2 mb-30 d-flex justify-content-between align-items-end">
                    <h3 class="color-000">Thiết bị</h3>
                    <a href="page-blog.html" class="fsz-12px color-666 text-uppercase ms-30 mb-1">See More <i
                            class="la la-angle-right"></i></a>
                </div>
                <div class="content">
                    <div class="row pb-50">
                        <div class="col-lg-5">
                            <div class="tc-Post-overlay-style1">
                                <div class="item mb-5 mb-lg-0">
                                    <div class="img th-525 img-cover radius-5 overflow-hidden">
                                        <a href="page-single-post-creative.html" class="d-block h-100">
                                            <img src="{{ asset('assets/client/img/latest/167.webp') }}" alt="">
                                        </a>
                                    </div>
                                    <div class="content p-30">
                                        <div class="cont">
                                            <h3 class="title">
                                                <a href="page-single-post-creative.html"> Lamborghini Urus Prototype Sets New SUV Hillclimb Record.  </a>
                                            </h3>
                                            <div class="meta-bot lh-1 mt-30 text-white fsz-13px">
                                                <a href="#"> <i class="la la-clock"></i> 16/4/2023 <span
                                                        class="color-999">Posted by</span> Admin </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tc-post-list-style7">
                                <div class="item mb-30">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="page-single-post-creative.html" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ asset('assets/client/img/latest/162.webp') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="page-single-post-creative.html">The 2023 Ford Bronco and Bronco Sport Heritage</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i
                                                        class="la la-clock"></i> 15 Hours ago</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item mb-30">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="page-single-post-creative.html" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ asset('assets/client/img/latest/163.jpg') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="page-single-post-creative.html">Unbelievable Ferrari Prototype Collection</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i
                                                        class="la la-clock"></i> 23 Hours ago</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item mb-30">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="page-single-post-creative.html" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ asset('assets/client/img/latest/164.webp') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="page-single-post-creative.html">Ralph Nader Begs NHTSA to Pull Tesla</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i
                                                        class="la la-clock"></i> 45 Minutes ago </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item mb-30">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="page-single-post-creative.html" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ asset('assets/client/img/latest/165.webp') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="page-single-post-creative.html">The 2024 Genesis GV90 Will Embody</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i
                                                        class="la la-clock"></i> 4 Days ago </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <a href="page-single-post-creative.html" class="img img-cover radius-4 w-100 m-0 th-80">
                                                <img src="{{ asset('assets/client/img/latest/166.webp') }}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <div class="info">
                                                <h6 class="title">
                                                    <a href="page-single-post-creative.html">Ford F-150 Lightning Raptor</a>
                                                </h6>
                                                <a href="#" class="date fsz-13px color-666 mt-10"> <i
                                                        class="la la-clock"></i> 2 Days ago </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="tc-post-grid-style7 mt-5 mt-lg-0">
                                <div class="item pb-30 border-1 border-bottom brd-gray">
                                    <div class="img img-cover radius-5 th-200">
                                        <a href="#" class="d-block h-100">
                                            <img src="{{ asset('assets/client/img/latest/168.webp') }}" alt="">
                                        </a>
                                        <div class="tags-15 fsz-12px fw-500">
                                            <a href="#"
                                               class="me-10 bg-dark1 text-white text-uppercase radius-3">
                                                <span class="my-1 mx-3">BMW</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="content pt-30">
                                        <h6 class="title">
                                            <a href="page-single-post-creative.html"> BMW And Toyota Partner To Mass Produce </a>
                                        </h6>
                                        <div class="meta-bot lh-1 mt-20 fsz-13px">
                                            <a href="#"> <i class="la la-clock"></i> 5 Hours ago <span
                                                    class="color-999">Posted by</span> Admin </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex fsz-16px fw-bold mt-20">
                                <i class="ion-arrow-right-b me-3 mt-1"></i>
                                <p>
                                    <a href="page-single-post-creative.html">2024 Honda Pilot Renderings Imagine A Stylish</a>
                                </p>
                            </div>
                            <div class="d-flex fsz-16px fw-bold mt-20">
                                <i class="ion-arrow-right-b me-3 mt-1"></i>
                                <p>
                                    <a href="page-single-post-creative.html">Next-Gen Volvo XC90 EV Design</a>
                                </p>
                            </div>
                            <div class="d-flex fsz-16px fw-bold mt-20">
                                <i class="ion-arrow-right-b me-3 mt-1"></i>
                                <p>
                                    <a href="page-single-post-creative.html">2024 Chevrolet Bolt EUV Review</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}




        <!-- ====== start download ====== -->
        {{-- <section class="tc-download-style1 pb-50">
            <div class="container">
                <div class="content">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="info">
                                <strong class="title">Download Newzin App</strong>
                                <div class="text">
                                    Easy to update latest news, daily podcast and everything in your hand
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="img">
                                <a href="#">
                                    <img src="{{ asset('assets/client/img/apple1.png') }}" alt="">
                                </a>
                                <a href="#">
                                    <img src="{{ asset('assets/client/img/android1.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- ====== end download ====== -->

        <!-- ====== start modals ====== -->

        <div class="offcanvas offcanvas-start sidebar-popup-style1" tabindex="-1" id="offcanvasExample"
             aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <div class="logo">
                    <img src="{{ asset('assets/client/img/logo_home9.png') }}" alt="" class="dark-none">
                    <img src="{{ asset('assets/client/img/logo_home4_lt.png') }}" alt="" class="light-none">
                </div>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
            </div>
            <div class="offcanvas-body mt-4">
                
                <div class="text">
                    Tranng tin y tế số 1 Việt Nam
                </div>

                <div class="sidebar-categories mt-40">
                    <h6 class="color-000 text-uppercase mb-30 ltspc-1"> Danh mục <i
                            class="la la-angle-right ms-1"></i> </h6>
                       
                    @if(isset($listCategory) && is_object($listCategory))
                        @foreach($listCategory as $value)
                            <a href="{{ route('client.blog.category', ['slug' => $value->slug] ) }}" class="cat-card">
                                <div class="img img-cover">
                                    <img src="{{ asset('assets/client/img/videos/2.png') }}" alt="">
                                </div>
                                <div class="info">
                                    <h5>{{ $value->name }}</h5>
                                    
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
                
            </div>
        </div>
        <!-- ====== end modals ====== -->

    </main>
@endsection

@section('style')
    <style>

    </style>
@endsection
