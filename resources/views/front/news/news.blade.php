@extends('front.layouts.master')
@php
    $page_title="News";
    $newes=\App\Models\News::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
        @include('meta::manager', [
            'title' => $page->meta_title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
            'image' => $page->media_id ? $page->img_paths['medium'] : null,
            'description' => $page->meta_description
        ])

@endsection

@section('master')
<!-- Breadcrumb -->
@include('front.includes.breadcrumb')
<!-- Breadcrumb End-->

    <!-- Blog Area -->
    <div class="blog-area pb-70">
        <div class="container border-top pt-100">
            <div class="section-title-two text-center">
                <span class="sp-before">Recent Articles</span>
                <h2>Our Latest Blog</h2>
            </div>
            <div class="row pt-45">
                @foreach ($newes as $news)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card blog-card-border">
                        <a href="{{ route('news.single', $news->slug) }}">
                            <img src="{{ $news->img_paths['medium'] }}" alt="Images">
                        </a>
                        <div class="content">
                            <span><a href="#">Home style</a> / {{ \Carbon\Carbon::parse($news->publish_date)->format('d-M-Y')}}</span>
                            <h3><a href="{{ route('news.single', $news->slug) }}">{{ $news->title }}</a></h3>
                            <a href="{{ route('news.single', $news->slug) }}" class="learn-btn">
                                Learn more
                                <i class="flaticon-right-arrow-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
@endsection
