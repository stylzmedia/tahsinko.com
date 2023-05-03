@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $page->meta_title.' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'description' => $page->meta_description,
        'keywords' => $page->meta_tags,
        'image' => $page->media_id ? $page->img_paths['original'] : null,
    ])

@php
    $galleries = App\Models\Gallery::paginate(12);
@endphp

@endsection

@section('master')

<!-- Breadcrumb -->
    @php
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
    @endphp
    <div class="inner-banner">
        <div class="inner-image" style="{{$bg_bread}}">
            <img src="{{ $page->media_id ? $page->img_paths['original'] : null }}" alt="">
        </div>
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
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </div>
    </div>
<!-- Breadcrumb End-->
<section class="galleries my-5">
    <div class="container">
            <div class="row justify-content-center">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-lg-2 galleries-list">
                        <div class="mb-4 galleries-item">
                            <img class="galleries_img" src="{{ $gallery->img_paths['original'] }}" alt="{{$gallery->name}}">

                            <div class="galleries-details">
                            {{-- <h6 class="galleries-title">{{$gallery->name}}</h6> --}}
                            <a href="{{route('gallery', $gallery->id)}}" class="button button_md">View All {{$gallery->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        {{$galleries->links()}}
    </div>
</section>

@endsection
