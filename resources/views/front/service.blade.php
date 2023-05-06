@extends('front.layouts.master')
@php
    $page_title="Service";
    $services = \App\Models\Service::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])

<style>
    #services section {
    height: 100vh;
    width: 100%;
    display: grid;
    place-items: center;
    }
    #services .card {
    width: 100%;
    height: 100%;
    padding: 2em 1.5em;
    background: linear-gradient(#ffffff 50%, #1B9DD9 50%);
    background-size: 100% 200%;
    background-position: 0 2.5%;
    border-radius: 5px;
    box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    transition: 0.5s;
    }
    #services h3 {
    font-size: 20px;
    font-weight: 600;
    color: #1f194c;
    margin: 1em 0;
    }
    #services p {
    color: #575a7b;
    font-size: 15px;
    line-height: 1.6;
    letter-spacing: 0.03em;
    }
    #services .icon-wrapper {
    position: relative;
    margin: auto;
    font-size: 30px;
    height: 2.5em;
    width: 2.5em;
    color: #ffffff;
    border-radius: 50%;
    display: grid;
    place-items: center;
    transition: 0.5s;
    }
    #services .card:hover {
    background-position: 0 100%;
    }
    #services .card:hover .icon-wrapper {
    color: #2c7bfe;
    }
    #services .card:hover h3 {
    color: #ffffff;
    }
    #services  .card:hover p {
    color: #f0f0f0;
    }
    @media screen and (min-width: 768px) {
    #services section {
        padding: 0 2em;
    }

    }
    @media screen and (min-width: 992px) {
    #services section {
        padding: 1em 3em;
    }

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

<section id="services">
    <div class="container">

        <div class="row">
          <h2 class="section-heading text-center ">{{$page->breadcrumb_title}}</h2>
        </div>
        <div class="row d-flex flex-wrap">
            @foreach ($services as $item)
            <div class="col-md-4 mb-4">
              <div class="card text-center ">
                <div class="icon-wrapper">
                  <img src="{{$item->media_id ? $item->img_paths['original'] : null }}" alt="">
                </div>
                <h3>{{ $item->title }}</h3>
                <p> {!! $item->description!!}</p>
              </div>
            </div>
            @endforeach
        </div>
    </div>
  </section>

@endsection
