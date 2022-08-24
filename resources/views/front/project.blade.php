@extends('front.layouts.master')
@php
    $page_title="Portfolio";
    $projects = \App\Models\Portfolio::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'Portfolio - ' . ($settings_g['slogan'] ?? '')
    ])
    <style>
        .header {
            position: relative;
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
<section id="page-header" class="section background" style="{{$bg_bread}}">
<div class="container">
  <div class="row">
      <div class="col-sm-12 text-center">
        <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
      </div>
  </div><!-- end row -->
</div><!-- end container -->
</section>

    {{-- all-products --}}
    <section class="all-project">
        {{-- our project --}}
        <div class="our-project scroll-animation-section show-on-scroll">
            <div class="container" style="margin:0;max-width:100%;">
                <div class="heading-title">
                    <label>{{ $page_title }}</label>

                </div>
                <div class="row">
                    @foreach($projects as $project)
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <div class="project-box">
                                <img class="image-animantion show-on-scroll" src="{{ $project->img_paths['small'] }}"/>
                                <div class="project-title-bar">{{ $project->title }}</div>
                                <div class="project-content">

                                    {!! \Illuminate\Support\Str::limit($project->description,150) !!}

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        {{-- end our porject --}}
    </section>

@endsection
