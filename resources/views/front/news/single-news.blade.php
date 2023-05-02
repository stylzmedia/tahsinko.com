@extends('front.layouts.master')
@php
    $page_title=$news->title;
@endphp

@php
    $page_title="News";
    // $related_news=\App\Models\News::where(['status'=>1])->orderBy('id','DESC')->inRandomOrder()->take(2)->get();
    $recent_news =\App\Models\News::where('category_id', $news->category_id)->where('id', '!=', $news->id)->take(2)->get();
    $related_news=\App\Models\News::where(['status'=>1])->orderBy('id','ASC')->take(4)->get();
    $page=\App\Models\Page::where(['status'=>1])->orderBy('id','ASC')->get();
@endphp


@section('head')
@include('meta::manager', [
    'title' => $news->meta_title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
    'image' => $news->media_id ? $news->img_paths['medium'] : null,
    'description' => $news->meta_description
])


    <style>
        .header {
            position: relative;
        }
        .single-blog p{
            color: #ddd;
        }
    </style>

@endsection
@section('master')

<!-- Breadcrumb -->
@php
if(empty($page->breadcrumb_background)){
    $back_value="#2c3232b0";
}else{
    $back_value=$page->breadcrumb_background;
}
@endphp
<div class="inner-banner">
    <div class="inner-image">
        <img src="{{ $news->media_id ? $news->img_paths['original'] : null }}" alt="">
    </div>
    <div class="container">
        <div class="inner-title text-center">
            <h3>@if(empty($page->breadcrumb_title)){{$news->title}}@else{{$page->breadcrumb_title}}@endif</h3>
            <ul>
                <li>
                    <i class="flaticon-fireplace"></i>
                </li>
                <li>
                    <a href="{{ route('homepage') }}">Home /</a>
                </li>
                <li>Blog/</li>
                <li>{{$news->title}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb End-->


<!-- Blog Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="blog-title">
            <ul>
                {{-- <li><a href="#"> Home style / </a></li> --}}
                <li>{{ \Carbon\Carbon::parse($news->publish_date)->format('d-M-Y')}}</li>
            </ul>
            <h2>{{$news->title}}</h2>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-article">
                    <div class="blog-article-img">
                        <img src="{{ $news->img_paths['original'] }}" alt="Images">
                    </div>
                    <div class="article-content">
                        {!! $news->description !!}
                    </div>
                    <div class="article-post">
                        <div class="row">
                            @foreach ( $recent_news as $item )
                                <div class="col-lg-6 col-sm-6">
                                    <div class="article-post-share">
                                        <span>{{ \Carbon\Carbon::parse($item->publish_date)->format('d-M-Y')}} / <a href="#">SEO</a></span>
                                        <a href="{{ route('news.single', $item->slug) }}">
                                            <h3>{{ $item->title }}</h3>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="side-bar-wrap">
                    {{-- <div class="search-widget">
                        <form class="search-form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div> --}}

                    {{-- <div class="side-bar-widget">
                        <h3 class="title">Categories</h3>
                        <div class="side-bar-categories">
                            <ul>
                                <li>
                                    <a href="#">Architecture </a>
                                    <span>(1)</span>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    <div class="side-bar-widget">
                        <h3 class="title">Recent Posts</h3>
                        <div class="widget-popular-post">
                            @foreach ( $related_news as $item )
                            <article class="item">
                                <a href="{{ route('news.single', $item->slug) }}" class="thumb">
                                    <span class="full-image cover"  role="img">
                                        <img src="{{ $item->img_paths['medium'] }}" class="img-fluid rounded-top" alt="">
                                    </span>
                                </a>

                                <div class="info">
                                    <h4 class="title-text">
                                        <a href="blog-details.html">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                    <p>{{ \Carbon\Carbon::parse($item->publish_date)->format('d-M-Y')}}</p>
                                </div>
                            </article>

                            @endforeach


                        </div>
                    </div>



                    <div class="side-bar-contact">
                        <i class="flaticon-phone-call"></i>
                        <h3>Want to know Cal us for info</h3>
                        <span><a href="tel:+88{{$settings_g['mobile_number'] ?? ''}}">{{$settings_g['mobile_number'] ?? ''}}</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
