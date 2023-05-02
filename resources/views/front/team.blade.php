@extends('front.layouts.master')
@php
    $page_title="Service";
    $teams = \App\Models\Team::where(['status'=>1])->orderBy('position','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>

.team .border {
  height: 369px;
  width: 290px;
  background: transparent;
  border-radius: 10px;
  transition: border 1s;
  position: relative;
}
.team .border:hover {
  border: 1px solid #fff;
}
.team .card {
  height: 379px;
  width: 300px;
  border-radius: 10px;
  transition: background 0.8s;
  overflow: hidden;
  box-shadow: 0 70px 63px -60px #000;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.card0 h5 {
    opacity: 0;
    transition: opacity 1s;
    width: 51%;
    font-size: 1rem;
    padding: 0 0 0 20px;
}
.card0:hover h5 {
    width: 51%;
    font-size: 1rem;
    padding: 0 0 0 20px;
    color: gray;
    opacity: 1;
}
.card0:hover {
  background-size: 550px !important;
}
.card0:hover h2 {
  opacity: 1;
  text-align: left;
}
.card0:hover .fab {
  opacity: 1;
}



.card0 h2 {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: rgb(57, 57, 57);
  opacity: 0;
  transition: opacity 1s;
  text-align: left !important;
  padding: 20px 0px 0px 20px !important;
}
.card0 .fab {
  opacity: 0;
  transition: opacity 1s;
}

.card0 .fab:hover {
  opacity: 1;
  transition: opacity 1s;
}
.card0 .icons {
  position: absolute;
  fill: rgb(0, 91, 182);
  color: rgb(254, 0, 0);
  height: 130px;
  top: 226px;
  width: 50px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
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
