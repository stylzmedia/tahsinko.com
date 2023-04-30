@extends('front.layouts.master')
@php
    $page_title=$news->title;
@endphp

@php
    $page_title="News";
    $newes=\App\Models\News::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp


@section('head')
    {{-- @include('meta::manager', [
        'title' => $news->title.'- ' . ($settings_g['slogan'] ?? '')
    ]) --}}

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
 <!-- Inner Banner -->
 <div class="inner-banner inner-bg5">
    <div class="container">
        <div class="inner-title text-center">
            {{-- <h3>Design Inside Of Home</h3> --}}
            <ul>
                <li>
                    <i class="flaticon-fireplace"></i>
                </li>
                <li>
                    <a href="{{ route('homepage') }}">Home /</a>
                </li>
                <li> Blogs /</li>
                <li>{{ $page_title }}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Banner End -->

<!-- Blog Details Area -->
<div class="blog-details-area pt-100 pb-70">
    <div class="container">
        <div class="blog-title">
            <ul>
                <li><a href="#"> Home style / </a></li>
                <li>{{ \Carbon\Carbon::parse($news->publish_date)->format('d-M-Y')}}</li>
            </ul>
            <h2>{{ $page_title }}</h2>
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
                            <div class="col-lg-6 col-sm-6">
                                <div class="article-post-share">
                                    <span>Jun 12, 2020 / <a href="#">SEO</a></span>
                                    <a href="#">
                                        <h3>Successful digital marketer does first to ensure they get</h3>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-sm-6">
                                <div class="article-post-share">
                                    <span>April 19, 2020 / <a href="#">Web</a></span>
                                    <a href="#">
                                        <h3 class="active">Marketer who knows how to execute their campaigns</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="side-bar-wrap">
                    <div class="search-widget">
                        <form class="search-form">
                            <input type="search" class="form-control" placeholder="Search...">
                            <button type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>

                    <div class="side-bar-widget">
                        <h3 class="title">Categories</h3>
                        <div class="side-bar-categories">
                            <ul>
                                <li>
                                    <a href="#">Architecture </a>
                                    <span>(1)</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="side-bar-widget">
                        <h3 class="title">Recent Posts</h3>
                        <div class="widget-popular-post">
                            @foreach ( $newes as $item )
                            <article class="item">
                                <a href="blog-details.html" class="thumb">
                                    <span class="full-image cover"  role="img"></span>
                                </a>

                                <div class="info">
                                    <h4 class="title-text">
                                        <a href="blog-details.html">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                    <p>March 20, 2020</p>
                                </div>
                            </article>

                            @endforeach


                        </div>
                    </div>

                    <div class="side-bar-widget">
                        <h3 class="title">Tags</h3>
                        <ul class="side-bar-widget-tag">
                            <li><a href="#">Architecture</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Decor</a></li>
                            <li><a href="#">3D Architecture</a></li>
                            <li><a href="#">Home & Design</a></li>
                            <li><a href="#">Craft</a></li>
                        </ul>
                    </div>

                    <div class="side-bar-contact">
                        <i class="flaticon-phone-call"></i>
                        <h3>Want to know Cal us for info</h3>
                        <span><a href="tel:(+123)-456-876">(+123) 456 876</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
