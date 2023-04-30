@extends('front.layouts.master')
@php
    $page_title="News";
    $newes=\App\Models\News::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'News - ' . ($settings_g['slogan'] ?? '')
    ])
    <style>
        .header {
            position: relative;
        }
    </style>
@endsection

@section('master')


          <!-- Breadcrumb -->
          {{-- @php
          if(empty($page->breadcrumb_background)){
              $back_value="#2c3232b0";
          }else{
              $back_value=$page->breadcrumb_background;
          }
          if($page->is_color == 2){
              $bg_bread="background:rgba(0, 0, 0, 0) url('../$back_value') no-repeat scroll center center / cover;";
          }else{
              $bg_bread="background:".$back_value;
          }

      @endphp --}}

      {{-- <section id="page-header" class="section background" style="{{$bg_bread}}">
      <div class="container">
          <div class="row">
              <div class="col-sm-12 text-center">
                  <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
              </div>
          </div><!-- end row -->
      </div><!-- end container -->
      </section> --}}
    {{-- News section --}}

      <!-- Inner Banner -->
      <div class="inner-banner inner-bg6">
        <div class="container">
            <div class="inner-title text-center">
                <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
                <ul>
                    <li>
                        <i class="flaticon-fireplace"></i>
                    </li>
                    <li>
                        <a href="{{ route('homepage') }}">Home /</a>
                    </li>
                    <li>Page/</li>
                    <li>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Inner Banner End -->

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

    {{-- <div class="our-news scroll-animation-section show-on-scroll" style="padding-bottom: 15px; background: #ddd; padding: 50px 0;">
        <div class="container" >
            <div class="heading-title">
                <label>All News</label>

            </div>
            <div class="row">
                @foreach ($newes as $news)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="blog-item">
                            <div class="image-wrap">
                                <a href="blog-details">
                                    <img src="{{ $news->img_paths['small'] }}" alt="Blog">
                                </a>
                            </div>
                            <div class="blog-content">
                            <ul class="blog-meta mb-10">
                                <li class="date"> <i class="fa fa-calendar-check-o"></i> {{ \Carbon\Carbon::parse($news->publish_date)->format('d-M-Y')}}</li>
                            </ul>
                            <h3 class="blog-title"><a href="{{ route('news.single', $news->slug) }}">{{ $news->title }}</a></h3>
                            {!! \Illuminate\Support\Str::limit($news->description,100) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
@endsection
