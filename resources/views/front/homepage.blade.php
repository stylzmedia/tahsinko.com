@extends('front.layouts.master')

@section('head')
    <!-- Title  -->
    @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? '')
    ])
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
                                <img class="d-block w-100" src="{{$slider->img_paths['original']}}" alt="Second slide">
                            </div>
                        @elseif($slider->slider_type==2)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <video class="img-fluid" autoplay loop muted>
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
                            <iframe class="background-video-embed" frameborder="0" allowfullscreen="1" src="{{'https://www.youtube.com/embed/' . $youtube_id}}?autoplay=1&mute=1&controls=0&playlist={{ $youtube_id }}&loop=1" style="width: 100%; height: 902.812px; pointer-events: none;"></iframe>
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

<!-- section One Start -->
   <div class="section-one">
        <div class="container-fluid">
            <div class="row section-one-inner">
                <div class="col-lg-6 col-md-6">
                    <div class="bg-media">
                        <img src="{{ asset('front/images/section/moving-together.png') }}" class="moving" alt="">
                        <img src="{{ asset('front/images/section/sec1-bg.png') }}" class="sec1-bg" alt="" >
                    </div>
                    <div class="section-one-content ms-5">
                        <div class="section-one-inner-item">
                            <img src="{{ asset('front/images/section/tahsinko-liftnescalator.png') }}" class="tahsinko-logo" alt="TAHSINKO® Lift & Escalator Logo" >
                        </div>
                        <div class="section-one-inner-item">
                        <img src="{{ asset('front/images/section/1st-tm-bd.png') }}" class="tm-img animate-1" alt="1st Trademark™ Registered® Lift Brand in Bangladesh">
                        </div>
                        <div class="section-one-inner-item">
                        <img src="{{ asset('front/images/section/1st-tm-china.png') }}" class="tm-img animate-1" alt="1st Trademark™ Registered® Bangladeshi Lift Brand in China" >
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">

                    <div class="section-one-media">
                        <img src="{{asset('front/images/section/sec1-group-photo.png')}}" class="group-img" alt="">
                    </div>
                    <div class="js-shape">
                        <img src="{{asset('front/images/section/sec1-shape-1.png')}}" class="shape-1 move-1" alt="shape" >
                        <img src="{{asset('front/images/section/sec1-shape-2.png')}}" class="shape-2 move-1" alt="shape" >
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- section One End -->

<!-- Section Two Start -->
    <div class="section-two">
        <div class="container-fluid">
            <div class="section-two-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <img src="{{asset('front/images/section/sec2-bg-left.png')}}" class="sec2-bg-left" alt="">
                        <img src="{{asset('front/images/section/sec2-ceo.png')}}" alt="" class="tareq move-3">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <img src="{{asset('front/images/section/sec2-artwork.png')}}" class="sec2-artwork move-1" alt="">
                        <div class="section-content">
                            <div class="section-content-inner">
                                <p>
                                    Our products and solutions allow us to install lifts of any size, configuration, speed and load for every section of industry. Working closely with all stakeholders, architects, principal designers and end user, TAHSINKO® Limited can provide our clients with full turnkey projects, or small bespoke single private sector works. Our installation teams work to the highest levels of safety and quality alongside our very experienced Project Managers. TAHSINKO® is our own brand that’s why its quality different then others. We invite you to be proud owner of our lift at your prestigious project.
                                </p>
                                <p>- Tarequl Islam, CEO</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Two End -->

<!-- Section Three Start -->
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
                                <img src="{{asset('front/images/section/quote.png')}}" class="quote" alt="">
                            </div>
                            <div class="inner">
                                <p>Our mission in to provide innovative and reliable vertical transportation solutions that enable people to move safety and efficiently in buildings of all sizes and types, while also promoting sustainability, accessibility, and exceptional customer service in Bangladesh.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row section-three-vision">
                    <div class="col-lg-8 col-md-8">
                        <div class="section-three-content">
                            <div class="quote">
                                <img src="{{asset('front/images/section/quote.png')}}" class="quote" alt="">
                            </div>
                            <div class="inner">
                                <p>Our vision is to lead the elevator industry by providing smart, sustainable, and user-centered vertical transportation solutions that enhance the human experience, improve urban mobility, and create more livable and inclusive cities around the world.</p>
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
<!-- Section Three End -->

<!-- Section Four Start -->
    <div class="section-four bg-black">
        <div class="container">
            <div class="row counter-list justify-content-center">
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="counter-item">
                        <div class="counter-item-inner justify-content-center text-center d-flex">
                            <h2>Valuable Partners <span>100+</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="counter-item">
                        <div class="counter-item-inner justify-content-center text-center d-flex">
                            <h2>Completed Projects<span>100+</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="counter-item">
                        <div class="counter-item-inner justify-content-center text-center d-flex">
                            <h2>Ongoing Projects<span>100+</span></h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="counter-item">
                        <div class="counter-item-inner justify-content-center text-center d-flex">
                            <h2>Coworkers<span>100+</span></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Four End -->

<!-- Section Five Start -->
     <div class="section-five">
        <div class="container-fluid p-0">
            <div class="row section-five-inner">

                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12">
                    <img src="{{asset('front/images/section/sec5-bgleft.png')}}" alt="" class="sec5-bgleft">
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-8 col-sm-12 col-12">
                    <img src="{{asset('front/images/section/sec5-bgright.png')}}" alt="" class="sec5-bgright float-end">
                </div>

                <div class="pline-content position-absolute my-2">
                    <div class="row justify-content-center">
                        <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-8 col-sm-12 col-12">
                            <div class="pline-title my-5">
                                <h2>product line</h2>
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
                                <img src="{{asset('front/images/section/icon-elevators.png')}}" class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                            <div class="pline-item-icon mb-4">
                                <img src="{{asset('front/images/section/icon-home-elevators.png')}}" class="img-fluid rounded-top" alt="">
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
                                <img src="{{asset('front/images/section/icon-hospital-elevator.png')}}" class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                            <div class="pline-item-icon mb-4">
                                <img src="{{asset('front/images/section/icon-passenger-elevator.png')}}" class="img-fluid rounded-top" alt="">
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
                                <img src="{{asset('front/images/section/icon-car-elevator.png')}}" class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                            <div class="pline-item-icon mb-4">
                                <img src="{{asset('front/images/section/icon-escalator.png')}}" class="img-fluid rounded-top" alt="">
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
                                <img src="{{asset('front/images/section/icon-observation.png')}}" class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-2 col-md-3 col-6">
                            <div class="pline-item-icon mb-4">
                                <img src="{{asset('front/images/section/icon-freight-elevator.png')}}" class="img-fluid rounded-top" alt="">
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
                                <img src="{{asset('front/images/section/icon-dumbwaiter.png')}}" class="img-fluid rounded-top" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Five End -->

<!-- Section Six Start -->
    <div class="section-six">
        <div class="container-fluid">
            <div class="tm-title text-uppercase text-center mt-2">
                <h1>Trademark Certificates</h1>
            </div>
            <div class="inner-bg">
                <img src="{{asset('front/images/section/tm-bg.png')}}" alt="" class="tm-bg">
            </div>
            <div class="row section-six-inner">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="flag-tm-left">
                        <img src="{{asset('front/images/section/bd-flag.png')}}" alt="" class="bd-flag">
                        <img src="{{asset('front/images/section/tm-bd.png')}}" alt="" class="tm-bd">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="flag-tm-right">
                        <img src="{{asset('front/images/section/tm-cn.png')}}" alt="" class="tm-cn">
                        <img src="{{asset('front/images/section/cn-flag.png')}}" alt="" class="cn-flag">
                    </div>

                </div>
            </div>
        </div>
    </div>
<!-- Section Six End -->

<!-- Section Seven Start -->
    <div class="section-seven bg-black">
        <div class="container-fluid">
            <div class="section-seven-inner">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-11">
                        <div class="service-title">
                            <h1>Our Services</h1>
                        </div>
                    </div>
                    <div class="row service-list justify-content-center">
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-planning.png')}}" alt="" class="">
                                    </div>
                                    <h2>Planning</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon--supply.png')}}" alt="" class="">
                                    </div>
                                    <h2>Supply</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-installation.png')}}" alt="" class="">
                                    </div>
                                    <h2>Installation</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-commissioning.png')}}" alt="" class="">
                                    </div>
                                    <h2>Commissioning</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-service-main.png')}}" alt="" class="">
                                    </div>
                                    <h2>Service & Maintenance</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-renovation.png')}}" alt="" class="">
                                    </div>
                                    <h2>Renovation</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="service-item">
                                <div class="service-item-inner text-center">
                                    <div class="service-icon">
                                        <img src="{{asset('front/images/section/icon-spare-parts.png')}}" alt="" class="">
                                    </div>
                                    <h2>Spare Parts</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Seven End -->

<!-- Section Eight Start -->
    <div class="feature-product">

        <div class="container">
            <div class="inner">
                <div class="tm-title text-uppercase text-center mt-2">
                    <h1>Latest Products</h1>
                </div>
                <div class="portfolio-bg">
                    <img src="{{asset('front/images/section/portfolio-bd-left.png')}}" alt="" class="portfolio-bd-left">
                </div>
                <div class="portfolio-bg">
                    <img src="{{asset('front/images/section/portfolio-bd-rignt.png')}}" alt="" class="portfolio-bd-rignt">
                </div>

                <div class="row feature-product-inner justify-content-center">
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="imgBox">
                                <img src="https://demo.tahsinko.com/uploads/2022/09/1662476048.jpg" alt="" class="product">
                            </div>
                            <div class="contentBox">
                                <h3>TK-J111</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="imgBox">
                                <img src="https://demo.tahsinko.com/uploads/2022/09/1662476048.jpg" alt="" class="product">
                            </div>
                            <div class="contentBox">
                                <h3>TK-J111</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="imgBox">
                                <img src="https://demo.tahsinko.com/uploads/2022/09/1662476048.jpg" alt="" class="product">
                            </div>
                            <div class="contentBox">
                                <h3>TK-J111</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="imgBox">
                                <img src="https://demo.tahsinko.com/uploads/2022/09/1662476048.jpg" alt="" class="product">
                            </div>
                            <div class="contentBox">
                                <h3>TK-J111</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-5">
                            <a href="#" class="default-btn">View All Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Eight End -->

<!-- Section Nine Start -->
    <div class="portfolio-area pb-70">
            <div class="tm-title text-uppercase text-center mt-2">
                <h1>Our Project</h1>
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
                                            <img src="{{ $project->img_paths['original'] }}" alt="Images">
                                        </a>
                                        <div class="content active">
                                            <div class="title">
                                                <h3><a href="#">{{ $project->title }}</a></h3>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="#">{{ $project->lift_type }}</a>
                                                </li>
                                                <li>
                                                    <a>{{ $project->location }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($projects as $project)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="portfolio-item-two">
                                        <a href="{{ route('project.single', $project->id) }}">
                                            <img src="{{ $project->img_paths['original'] }}" alt="Images">
                                        </a>
                                        <div class="content active">
                                            <div class="title">
                                                <h3><a href="#">{{ $project->title }}</a></h3>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="#">{{ $project->lift_type }}</a>
                                                </li>
                                                <li>
                                                    <a>{{ $project->location }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @foreach($projects as $project)
                                <div class="col-lg-3 col-sm-6">
                                    <div class="portfolio-item-two">
                                        <a href="{{ route('project.single', $project->id) }}">
                                            <img src="{{ $project->img_paths['original'] }}" alt="Images">
                                        </a>
                                        <div class="content active">
                                            <div class="title">
                                                <h3><a href="#">{{ $project->title }}</a></h3>
                                            </div>
                                            <ul>
                                                <li>
                                                    <a href="#">{{ $project->lift_type }}</a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Section Nine End -->

<!-- Section Ten Start -->

<!-- Section Ten End -->


@if(count($home_sections))
            @foreach($home_sections as $key=>$sec)
            @if($sec->section_design_type_id==7 && count($teams))
            <input type="hidden" id="NoOfTeamMember" value="{{$sec->no_of_slide_col}}">
            <div class="section9">
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
            </div>


            @elseif($sec->section_design_type_id==9 && count($clients))
            {{-- valueable client --}}
            <input type="hidden" id="NoOfClient" value="{{$sec->no_of_slide_col}}">
            <div class="client-area pt-100 pb-70">
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
            @elseif($sec->section_design_type_id==2 && count($newes))
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
                                <div class="blog-card blog-card-pb">
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
                        </div>
                    </div>
                </div>
                {{-- end News --}}
            @endif

        @endforeach
    @endif


@endsection

@section('footer')


<script>

$("#videoeModal").on('hidden.bs.modal', function (e) {
    $("#videoeModal iframe").attr("src", $("#videoeModal iframe").attr("src"));
});

</script>

<script>
$('.portfolio-item').slick({
    autoplay: true,
    autoplaySpeed: 1500,
    infinite: true,
    slidesToShow: 4,
    arrows: true,
    responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 520,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$(".team-list").slick({
    slidesToShow: 3,
    autoplay: false,
    autoplaySpeed: 1500,
    infinite: true,
    responsive:[
    {
        breakpoint: 1200,
        settings: {
        slidesToShow: 3,
        },
        breakpoint: 520,
        settings: {
        slidesToShow: 1,
        }
    },
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

@endsection


