@extends('front.layouts.master')
@php
    $page_title="Service";
    $services = \App\Models\Service::where(['status'=>1])->orderBy('id','DESC')->get();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'Service - ' . ($settings_g['slogan'] ?? '')
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
        <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>>
       </div>
   </div><!-- end row -->
</div><!-- end container -->
</section>
    {{-- News section --}}

    {{-- all-service --}}
    <section class="servicesNew scroll-animation-section show-on-scroll">
        <div class="servicesNewline scroll-animation-section show-on-scroll">
            <div class="container">
                <div class="heading-title text-white">
                    <label>{{ $page_title }}</label>
                </div>
                <div class="row services-list justify-content-center">
                    @foreach($services as $service)
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content">
                                        <img src="{{ $service->img_paths['small'] }}" alt="">
                                        <div class="service-description">
                                            <h4><a href="">{{ $service->title }}</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="row justify-content-center">
                    <div class="col-lg-3">
                        <div class="readmore"> <a href="services.html" class="">View All Services</a></div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

@endsection
