@extends('front.layouts.master')
@php
    $page_title="Service";
    $teams = \App\Models\Team::where(['status'=>1])->orderBy('id','DESC')->get();
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

.border {
  height: 369px;
  width: 290px;
  background: transparent;
  border-radius: 10px;
  transition: border 1s;
  position: relative;
}
.border:hover {
  border: 1px solid #fff;
}
.card {
  height: 379px;
  width: 300px;
  background: #808080;
  border-radius: 10px;
  transition: background 0.8s;
  overflow: hidden;
  background: #000;
  box-shadow: 0 70px 63px -60px #000;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}
.card0 {

}
.card0:hover {
  background-size: 550px !important;
}
.card0:hover h2 {
  opacity: 1;
}
.card0:hover .fa {
  opacity: 1;
}

h2 {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  color: rgb(57, 57, 57);
  margin: 20px;
  opacity: 0;
  transition: opacity 1s;
}
.fab {
  opacity: 0;
  transition: opacity 1s;
}

.fab:hover {
  opacity: 1;
  transition: opacity 1s;
}
.icons {
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

{{-- <div class="section9">
    <div class="team-bg-item">
        <img src="{{asset('front/images/section/team-bg.png')}}" alt="" class="team-bg img-fluid">
    </div>
    <div class="container-fluid">
        <div class="team-section my-5">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-11">
                    <div class="service-title mb-5">
                        <h1>Our TEAM</h1>
                    </div>
                </div>
            </div>
            <div class="row team-list justify-content-center">
                @foreach($teams as $team)
                <div class="col-lg-4 col-md-6">
                    <div class="team-item">
                        <div class="team-item-inner text-center">
                            <div class="team-member position-relative">
                                <div style="top: 8%;">
                                    <div class="hexagon">
                                        <div class="hexagon-inner" style="overflow: hidden;">
                                            <img src="{{ $team->img_paths['original'] }}" alt="" class="" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="team-member-details text-uppercase">
                                <div class="social-link position-relative">
                                    <!-- Facebook -->
                                    <a class="btn btn-primary" style="background-color: #3b5998;" href="#" role="button"
                                    ><i class="fab fa-facebook-f"></i
                                    ></a>

                                    <!-- Twitter -->
                                    <a class="btn btn-primary" style="background-color: #55acee;" href="#" role="button"
                                    ><i class="fab fa-twitter"></i
                                    ></a>

                                    <!-- Instagram -->
                                    <a class="btn btn-primary" style="background-color: #ac2bac;" href="#" role="button"
                                    ><i class="fab fa-instagram"></i
                                    ></a>
                                </div>
                                <div class="team-member-name">
                                    <h4>{!! $team->name !!}</h4>
                                    <p>{!! $team->designation!!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row justify-content-center">
    @foreach($teams as $team)
        <div class="col-md-4">
            <div class="card card0" style="background-image: url('{{ $team->img_paths['original'] }}'); background-size: 400px;
                background-repeat: no-repeat;">
              <div class="border">
                <h2>{!! $team->name !!}</h2>
                <div class="icons">
                  <i class="fab fa-codepen" aria-hidden="true"></i>
                  <i class="fab fa-instagram" aria-hidden="true"></i>
                  <i class="fab fa-dribbble" aria-hidden="true"></i>
                  <i class="fab fa-twitter" aria-hidden="true"></i>
                  <i class="fab fa-facebook-f" aria-hidden="true"></i>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection

@section('footer')

@endsection
