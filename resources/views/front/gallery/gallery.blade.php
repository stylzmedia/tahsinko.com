@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $gallery->name . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'description' => $gallery->meta_description,
        'keywords' => $gallery->meta_tags,
        'image' => $gallery->media_id ? $page->img_paths['original'] : null,
    ])
@endsection

@section('master')

<!-- Breadcrumb -->
    @php
    if(empty($gallery->breadcrumb_background)){
        $back_value="#2c3232b0";
    }else{
        $back_value=$gallery->breadcrumb_background;
    }
    if($gallery->is_color == 2){
        $bg_bread="background:rgba(0, 0, 0, 0) url('../$back_value') no-repeat scroll center center / cover;";
    }else{
        $bg_bread="background:".$back_value;
    }
    @endphp
    <div class="inner-banner">
        <div class="inner-image" style="{{$bg_bread}}">
            <img src="{{ $gallery->img_paths['original'] }}" alt="">
        </div>
        <div class="container">
            <div class="inner-title text-center">
                <h3>@if(empty($gallery->breadcrumb_title)){{$gallery->name}}@else{{$gallery->breadcrumb_title}}@endif</h3>
                <ul>
                    <li>
                        <i class="flaticon-fireplace"></i>
                    </li>
                    <li>
                        <a href="{{ route('homepage') }}">Home /</a>
                    </li>
                    <li>Page/</li>
                    <li>{{$gallery->name}}</li>
                </ul>
            </div>
        </div>
    </div>
<!-- Breadcrumb End-->


<div class="page_wrap my-5">
    <div class="container-md">
        <div class="">
            <div class="gallery-title text-center text-uppercase ">
                <h3 class="mb-0">{{$gallery->name}}</h3>
            </div>

            <div class="gallery-items">
                <div class="row">
                    @foreach ($gallery->GalleryItems as $photo)
                    <div class="col-md-6 col-lg-4 my-2">
                        <div class="gallery-inner shadow h-100 p-3 rounded-3">
                            <a data-fslightbox href="{{$photo->img_paths['original']}}" class="d-block mb-3" style="border-radius: 4px;overflow: hidden;">
                                <img src="{{$photo->img_paths['original']}}" alt="{{$gallery->gallery_name}}" class="whp">
                            </a>
                        </div>
                    </div>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{asset('plugins/fslightbox-basic@3.4.1/fslightbox.js')}}"></script>
@endsection
