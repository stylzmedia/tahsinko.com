@extends('front.layouts.master')
@php
    $page_title="Service";
    $teams = \App\Models\Team::where(['status'=>1])->orderBy('position','ASC')->get();
@endphp
@section('head')
    @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])
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

<section class="team">
    <div class="container">
        <div class="row">
            <h2 class="section-heading text-gray-950 opacity-100 ">{{$page->breadcrumb_title}}</h2>
          </div>
        <div class="row justify-content-center my-5">
        @foreach($teams as $team)
            <div class="col-md-4">
                <div class="card card0" style="background-image: url('{{ $team->img_paths['original'] }}'); background-size: 400px;
                    background-repeat: no-repeat;">
                  <div class="border">
                    <h2>{!! $team->name !!}</h2>
                    <h5>{!! $team->designation!!}</h5>
                    <div class="icons">
                        <a href="{{ $team->facebook }}"> <i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="{{ $team->linkedin }}"> <i class="fab fa-linkedin" aria-hidden="true"></i></a>
                        <a href="{{ $team->tweeter }}"> <i class="fab fa-twitter" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('footer')

@endsection
