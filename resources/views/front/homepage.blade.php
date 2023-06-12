@extends('front.layouts.master')

@section('head')
    <!-- Title  -->
    @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? '')
    ])

@php
    $galleryId = \App\Models\Gallery::where('name', 'Section One')->value('id');
    $galleryItems = \App\Models\GalleryItem::where('gallery_id', $galleryId)->orderBy('position', 'ASC')->get();
    // dd($galleryItems);
@endphp

<style>
    .animate-on-scroll {
    opacity: 0;
    transform: translateY(50px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
    }

    .animate-on-scroll.is-visible {
    opacity: 1;
    transform: translateY(0);
    }
    .counter-list .counter-item .counter-item-inner span{
        font-size: 53px;
        font-weight: 700;
    }


    /* .section-one .section-one-content .section-one-inner-item .tahsinko-logo {
        height: 50px;
    } */


    /* .section-one .section-one-content .section-one-inner-item .tm-img {
        height: 80px !important;
    }
    .section-one .section-one-content .section-one-inner-item .tm-img{
        margin-top: 3% !important;
        margin-bottom: 9% !important;
    } */

    .section-one-media {
    position: relative;
    z-index: 999;
  }
  .section-one-media img.slick-slide {
    border: 5px solid red;
    border-radius: 15px;
}

  .section-one-media .slick-next:before {
    position: absolute;
    right: 0;
    top: -70px;
    color: red;
    font-size: 50px;
    }

    .section-one-media  .slick-prev:before {
        position: absolute;
        left: 0;
        top: -70px;
        z-index: 999;
        color: red;
        font-size: 50px;
    }
</style>

@endsection
@section('master')
     {{-- sliders --}}
     <div class="header-slider">
        <div class="container-fluid g-0">
            <div id="header-slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $key => $slider)
                        @if($slider->slider_type==1)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img class="d-block w-100" src="{{$slider->img_paths['original']}}" alt="{{$settings_g['title'] ?? ''}}">
                            </div>
                        @elseif($slider->slider_type==2)

                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <video class="img-fluid" autoplay loop muted poster="{{ asset('video/slider-poster.jpg') }}" alt="{{$settings_g['title'] ?? ''}}">
                                    <source src="{{ $slider->video_path }}" type="video/mp4" />
                                </video>
                            </div>

                        @elseif($slider->slider_type== 3)
                        @php
                            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';
                            if (preg_match($longUrlRegex, $slider->slider_script, $matches)) {
                            $youtube_id = $matches[count($matches) - 1];
                            }
                        @endphp
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <iframe class="background-video-embed" frameborder="0" allowfullscreen="1" src="{{'https://www.youtube.com/embed/' . $youtube_id}}?version=3&vq=hd1080&autoplay=1&mute=1&controls=0&playlist={{ $youtube_id }}&loop=1" style="width: 100%; height: 850px; pointer-events: none;"></iframe>
                        </div>
                        @endif
                    @endforeach

                </div>
            </div>
            <div>

            </div>
        </div>
    </div>
    {{-- end sliders --}}


<!-- Section Start -->
    @if(count($home_sections))
        @foreach($home_sections as $key=>$sec)

                @if($sec->section_design_type_id==1)
            <!-- section One Start -->
                <div class="section-one">
                    <div class="container-fluid">
                        <div class="row section-one-inner">
                            <div class="col-lg-6 col-md-6">
                                <div class="bg-media">
                                    <img src="{{ asset('images/section/moving-together.png') }}" class="moving" alt="1st Trademark™ Registered® Lift Brand in Bangladesh">
                                    <img src="{{ asset('images/section/sec1-bg.png') }}" class="sec1-bg" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" >
                                </div>
                                <div class="section-one-content ms-5">
                                    <div class="section-one-inner-item d-none d-sm-block">
                                        <img src="{{$settings_g['logo'] ?? asset('images/tahsinko-lift-n-escalator.png')}}" class="tahsinko-logo" alt="TAHSINKO® Lift & Escalator Logo" >
                                    </div>
                                    <div class="section-one-inner-item">
                                    <img src="{{ asset('images/section/1st-tm-bd.png') }}" class="tm-img animate-1" alt="1st Trademark™ Registered® Lift Brand in Bangladesh">
                                    </div>
                                    <div class="section-one-inner-item">
                                    <img src="{{ asset('images/section/1st-tm-china.png') }}" class="tm-img animate-1" alt="1st Trademark™ Registered® Bangladeshi Lift Brand in China" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">

                                <div class="section-one-media">
                                    <div class="section-one-slider">
                                        @foreach ($galleryItems as $item )
                                            <img src="{{ $item->img_paths['original'] }}" alt="{{ $item->name }}">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="js-shape">
                                    <img src="{{asset('images/section/sec1-shape-1.png')}}" class="shape-1 move-1" alt="TAHSINKO® Lift & Escalator Shape-1" >
                                    <img src="{{asset('images/section/sec1-shape-2.png')}}" class="shape-2 move-1" alt="TAHSINKO® Lift & Escalator Shape-2" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- section One End -->

                @elseif($sec->section_design_type_id==2)
            <!-- CEO Start -->
            <div class="ceo-img">
                <img src="{{asset('images/section/sec2-ceo.png')}}" alt="TAHSINKO® CEO Tarequl Islam Shopon" class="tareq move-3">
            </div>
            <div class="section-two">
                    <div class="container-fluid ">
                        <div class="section-two-inner">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 m-0">
                                    <img src="{{asset('images/section/sec2-bg-left.png')}}" class="sec2-bg-left" alt="1st Trademark™ Registered® Lift Brand in Bangladesh">
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <img src="{{asset('images/section/sec2-artwork.png')}}" class="sec2-artwork move-1" alt="1st Trademark™ Registered® Bangladeshi Lift Brand in China">
                                    <div class="section-content">
                                        <div class="section-content-inner">
                                            <p>{!! $sec->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- CEO End -->

                @elseif($sec->section_design_type_id==3)
            <!-- Mission & Vision Start -->
                <div class="section-three">
                    <div class="container-fluid">
                        <div class="container">
                            <div class="row section-three-mission">
                                <div class="col-lg-4 col-md-4 title animate-1">
                                    <div class="section-three-title">
                                        <h2>Mission</h2>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <div class="section-three-content">
                                        <div class="quote">
                                            <img src="{{asset('images/section/quote.png')}}" class="quote" alt="Our mission in to provide innovative and reliable vertical transportation solutions ">
                                        </div>
                                        <div class="inner">
                                            <p>{!! $sec->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row section-three-vision">
                                <div class="col-lg-8 col-md-8">
                                    <div class="section-three-content">
                                        <div class="quote">
                                            <img src="{{asset('images/section/quote.png')}}" class="quote" alt="Our vision is to lead the elevator industry by providing smart, sustainable, and user-centered vertical transportation solutions ">
                                        </div>
                                        <div class="inner">
                                            <p>{!! $sec->description2 !!}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 title animate-2">
                                    <div class="section-three-title">
                                        <h2>Vision</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--  Mission & Vision End -->

                @elseif($sec->section_design_type_id==4)
            <!-- Counter Start -->
                <div class="section-four bg-black">
                    <div class="container">
                        <div class="row counter-list justify-content-center">
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="counter-item">
                                    <div class="counter-item-inner justify-content-center text-center d-flex">
                                        <h2>Completed Projects<span>375+</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="counter-item">
                                    <div class="counter-item-inner justify-content-center text-center d-flex">
                                        <h2>Ongoing Projects<span>50+</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="counter-item">
                                    <div class="counter-item-inner justify-content-center text-center d-flex">
                                        <h2>Co-workers<span>50+</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Counter End -->


                @elseif($sec->section_design_type_id==5)
            <!-- Product Line Start -->
                <div class="section-five">
                    <div class="container-fluid p-0">
                        <div class="row section-five-inner">

                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                                <img src="{{asset('images/section/sec5-bgleft.png')}}" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" class="sec5-bgleft">
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-8 col-sm-12 col-12">
                                <img src="{{asset('images/section/sec5-bgright.png')}}" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" class="sec5-bgright float-end">
                            </div>

                            <div class="pline-content position-absolute my-2">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-8 col-sm-12 col-12">
                                        <div class="pline-title animate-4 my-5">
                                            <h2>{{ $sec->section_name }}</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-content-down mb-4">
                                            <h5>Elevators</h5>
                                            <div class="triangle-down">
                                            </div>
                                        </div>
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-elevators.png')}}" class="img-fluid rounded-top" alt="Elevators">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-home-elevators.png')}}" class="img-fluid rounded-top" alt="Home Elevator">
                                        </div>
                                        <div class="pline-item-content-up mb-4">
                                            <h5>Home Elevator</h5>
                                            <div class="triangle-up">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-content-down mb-4">
                                            <h5>Hospital Elevator</h5>
                                            <div class="triangle-down">
                                            </div>
                                        </div>
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-hospital-elevator.png')}}" class="img-fluid rounded-top" alt="Hospital Elevator">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-passenger-elevator.png')}}" class="img-fluid rounded-top" alt="Passenger Elevator">
                                        </div>
                                        <div class="pline-item-content-up mb-4">
                                            <h5>Passenger Elevator</h5>
                                            <div class="triangle-up">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-content-down mb-4">
                                            <h5>Car Elevator</h5>
                                            <div class="triangle-down">
                                            </div>
                                        </div>
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-car-elevator.png')}}" class="img-fluid rounded-top" alt="Car Elevator">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-escalator.png')}}" class="img-fluid rounded-top" alt="Escalator">
                                        </div>
                                        <div class="pline-item-content-up mb-4">
                                            <h5>Escalator</h5>
                                            <div class="triangle-up">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-content-down mb-4">
                                            <h5>Observation Elevator</h5>
                                            <div class="triangle-down">
                                            </div>
                                        </div>
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-observation.png')}}" class="img-fluid rounded-top" alt="Observation Elevator">
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-freight-elevator.png')}}" class="img-fluid rounded-top" alt="Freight Elevator<">
                                        </div>
                                        <div class="pline-item-content-up mb-4">
                                            <h5>Freight Elevator</h5>
                                            <div class="triangle-up">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                                        <div class="pline-item-content-down mb-4">
                                            <h5>Dumb Waiter</h5>
                                            <div class="triangle-down">
                                            </div>
                                        </div>
                                        <div class="pline-item-icon mb-4">
                                            <img src="{{asset('images/section/icon-dumbwaiter.png')}}" class="img-fluid rounded-top" alt="Dumb Waiter">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Product Line End -->

            @elseif($sec->section_design_type_id==6 && count($projects))
            <input type="hidden" id="NoOfTeamMember" value="{{$sec->no_of_slide_col}}">
            <!-- Project Start -->
                <div class="portfolio-area pb-70">
                    <div class="tm-title text-uppercase text-center mt-2">
                        <h1>{{ $sec->section_name }}</h1>
                    </div>
                    <div class="container">
                        <div class="tab portfolio-tab">
                            <div class="tab_content current active pt-45">
                                <div class="tabs_item current">
                                    <div class="row portfolio-item">
                                        @foreach($projects as $project)
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="{{ route('project.single', $project->id) }}">
                                                        <img src="{{ $project->img_paths['original'] }}" alt="{{ $project->title }}">
                                                    </a>
                                                    <div class="content active">
                                                        <div class="title">
                                                            <h3><a href="{{ route('project.single', $project->id) }}">{{ $project->title }}</a></h3>
                                                        </div>
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('project.single', $project->id) }}">{{ $project->lift_type }}</a>
                                                            </li>
                                                            <li>
                                                                <a>{{ $project->location }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center mt-5">
                                                <a href="{{ url('our-projects') }}" class="default-btn">View All Products</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Project End -->

            @elseif($sec->section_design_type_id==7)
            <!-- Trademark Certificates Start -->
                <div class="section-six">
                    <div class="container-fluid">
                        <div class="tm-title text-uppercase text-center mt-2">
                            <h1>{{ $sec->section_name }}</h1>
                        </div>
                        <div class="inner-bg d-none d-lg-block">
                        </div>
                        <div class="inner-bg2 d-block d-lg-none d-sm-block d-md-block ">
                            <img src="{{asset('images/section/tm-bg.png')}}" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" class="tm-bg ">
                        </div>

                        <div class="row section-six-inner">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="flag-tm-left">
                                    <img src="{{asset('images/section/bd-flag.png')}}" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" class="bd-flag animate-5">
                                    <img src="{{asset('images/section/tm-bd.png')}}" alt="1st Trademark™ Registered® Lift Brand in Bangladesh" class="tm-bd">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="flag-tm-right">
                                    <img src="{{asset('images/section/tm-cn.png')}}" alt="1st Trademark™ Registered® Bangladeshi Lift Brand in China" class="tm-cn">
                                    <img src="{{asset('images/section/cn-flag.png')}}" alt="1st Trademark™ Registered® Bangladeshi Lift Brand in China" class="cn-flag animate-6">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <!-- Trademark Certificates End -->

            @elseif($sec->section_design_type_id==8 && count($services))
            <!-- Services Start -->
                <div class="section-seven bg-black">
                    <div class="container-fluid">
                        <div class="section-seven-inner">
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-5 col-md-6 col-11">
                                    <div class="service-title">
                                        <h1>{{ $sec->section_name }}</h1>
                                    </div>
                                </div>
                                <div class="row service-list justify-content-center">
                                    @foreach ($services as $item )
                                    {{-- <div class="col-xl-3 col-lg-4 col-md-6"> --}}
                                    <div class="
                                    @if($sec->col == 2)
                                        col-lg-6 col-md-6 col-sm-12
                                    @elseif($sec->col == 3)
                                        col-lg-4 col-md-6 col-sm-12
                                    @elseif($sec->col == 4)
                                        col-lg-3 col-md-6 col-sm-12
                                    @endif">

                                        <div class="service-item">
                                            <div class="service-item-inner text-center">
                                                <div class="service-icon">
                                                    <img src="{{ $item->img_paths['original'] }}" alt="{{ $item->title }}" class="">
                                                </div>
                                                <h2>{{ $item->title }}</h2>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Services End -->

            @elseif($sec->section_design_type_id==9 && count($products))
            <!-- Products Start -->
                <div class="feature-product">
                    <div class="container">
                        <div class="inner">
                            <div class="tm-title text-uppercase text-center mt-2">
                                <h1>{{ $sec->section_name }}</h1>
                            </div>
                            <div class="portfolio-bg">
                                <img src="{{asset('images/section/portfolio-bd-left.png')}}" alt="Latest Products" class="portfolio-bd-left">
                            </div>
                            <div class="portfolio-bg">
                                <img src="{{asset('images/section/portfolio-bd-rignt.png')}}" alt="Latest Products" class="portfolio-bd-rignt">
                            </div>
                            <div class="row feature-product-inner justify-content-center">
                                @foreach($products as $product)
                                    <div class="col-xl-3 col-lg-6 col-md-6">
                                        <div class="card">
                                            <div class="imgBox">
                                                <img src="{{ $product->img_paths['original'] }}"
                                                alt="{{ $product->name }}" class="product">
                                            </div>
                                            <div class="contentBox">
                                                <h3>{{ $product->name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <a href="{{ url('our-products') }}" class="default-btn">View All Products</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Products End -->

            @elseif($sec->section_design_type_id==10 && count($teams))
            <input type="hidden" id="NoOfTeamMember" value="{{$sec->no_of_slide_col}}">
            <!-- Team Start -->
                <div class="section9">
                    <div class="team-bg-item">
                        <img src="{{asset('images/section/team-bg.png')}}" alt="Our TEAM" class="team-bg">
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
                                <div class="">
                                    <div class="team-item">
                                        <div class="team-item-inner text-center">
                                            <div class="team-member position-relative">
                                                <div style="top: 8%;">
                                                    <div class="hexagon">
                                                        <div class="hexagon-inner" style="overflow: hidden;">
                                                            <img src="{{ $team->img_paths['original'] }}" alt="{!! $team->name !!}" class="" >
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
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="text-center mt-5">
                                        <a href="{{ url('our-management') }}" class="default-btn">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Team End -->

            @elseif($sec->section_design_type_id==11 && count($newes))
            <!-- Blog Start -->
                    <div class="blog-area pt-100 pb-70">
                        <div class="container">
                            <div class="section-title-two text-center">
                                <span class="sp-before">Recent Articles</span>
                                <div class="section-title">
                                    <h2>{{ $sec->section_name }}</h2>
                                </div>
                            </div>
                            <div class="row pt-45">
                                @foreach ($newes as $news)
                                <div class="
                                        @if($sec->col == 2)
                                            col-lg-6 col-md-6 col-sm-12
                                        @elseif($sec->col == 3)
                                            col-lg-4 col-md-6 col-sm-12
                                        @elseif($sec->col == 4)
                                            col-lg-3 col-md-6 col-sm-12
                                        @endif
                                    ">
                                    <div class="blog-card blog-card-pb text-center">
                                        <a href="{{ route('news.single', $news->slug) }}">
                                            <img src="{{ $news->img_paths['medium'] }}" alt="{{ $news->title }}">
                                        </a>
                                        <div class="content">
                                            <span><a href="#">Lift</a> / {{ \Carbon\Carbon::parse($news->publish_date)->format('d-m-Y')}}</span>
                                            <h3><a href="{{ route('news.single', $news->slug) }}">{{ $news->title }}</a></h3>
                                            <a href="{{ route('news.single', $news->slug) }}" class="learn-btn">
                                                Read more
                                                <i class="flaticon-right-arrow-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <a href="{{ url('blog') }}" class="default-btn">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- Blog End -->

            @elseif($sec->section_design_type_id==12 && count($clients))
            <input type="hidden" id="NoOfClient" value="{{$sec->no_of_slide_col}}">
            <!-- Client Start -->
                <div class="client-area pb-70">
                    <div class="container">
                        @if ($sec->section_name_is_show == 1)
                        <div class="section-title">
                            <h2>{{ $sec->section_name }}</h2>
                        </div>
                        @endif
                        <section class="customer-logos slider">
                            @foreach ($clients as $client)
                                <div class="slide"><img src="{{ $client->img_paths['original'] }}" alt="{{ $client->title}}"></div>
                            @endforeach
                        </section>
                    </div>
                </div>
            <!-- Client End -->
            @endif
        @endforeach
    @endif
<!-- Section End -->


@endsection

@section('footer')

<!-- Sweet Alert 2 JS -->
<script src="{{ asset('plugins/sweetalert2@9.3.0/sweetalert2.all.min.js') }}"></script>

@if(Session::has('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ Session::get('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

<script>

$("#videoeModal").on('hidden.bs.modal', function (e) {
    $("#videoeModal iframe").attr("src", $("#videoeModal iframe").attr("src"));
});

</script>

<script>
    $(".portfolio-item").slick({
    autoplay: false,
    mobileFirst:true,
    slidesToScroll: 1,
    autoplaySpeed: 1500,
    infinite: true,
    arrows: true,
    responsive:[

    {
    breakpoint: 768,
    settings: {
              slidesToShow: 2
            }
    },
    {
    breakpoint: 1024,
    settings: {
              slidesToShow: 3
            }
    },
    {
    breakpoint: 1200,
    settings: {
              slidesToShow: 3
            }
    },
    {
    breakpoint: 1800,
    settings: {
              slidesToShow: 4
            }
    }
    ]
});

$(".team-list").slick({
    autoplay: false,
    mobileFirst:true,
    slidesToScroll: 1,
    autoplaySpeed: 1500,
    infinite: true,
    arrows: false,
    responsive:[
    {
    breakpoint: 1024,
    settings: {
              slidesToShow: 2
            }
    },
    {
    breakpoint: 1200,
    settings: {
              slidesToShow: 3
            }
    },
    {
    breakpoint: 1800,
    settings: {
              slidesToShow: 4
            }
    }
    ]
});
    $('.team-list').mouseover(function() {
    $(this).slick('play')
});

    $('.customer-logos').slick({
        slidesToShow: $('#NoOfClient').val(),
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
</script>

<script>

$('.section-one-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 4000,
  mobileFirst:true,
  infinite: true,
  arrows: false,
});
</script>

@endsection


