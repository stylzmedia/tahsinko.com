@extends('front.layouts.master')

@section('head')
    {{-- @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? '')
    ]) --}}

    <style>


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
                                <img class="d-block w-100" src="{{$slider->img_paths['original']}}" alt="Second slide">
                            </div>
                        @elseif($slider->slider_type==2)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <video class="img-fluid" autoplay loop muted>
                                    <source src="{{ $slider->video_path }}" type="video/mp4" />
                                </video>
                            </div>
                        @elseif($slider->slider_type== 3)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <iframe class="background-video-embed" frameborder="0" allowfullscreen="1" src="{!! $slider->slider_script !!}?autoplay=1&mute=1&controls=0&playlist=3TRq1IMZGFg&loop=1" style="width: 100%; height: 902.812px; pointer-events: none;"></iframe>
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


    @if(count($home_sections))
        @foreach($home_sections as $key=>$sec)
            @if($sec->section_design_type_id==1)
                    <!-- About Area -->
                <div class="about-area pt-100 pb-70">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="about-content">
                                    <div class="    ">
                                        <span class="sp-before">About Us</span>
                                        <h2>{{ $sec->title }}</h2>
                                        <p>{!! \Illuminate\Support\Str::words($sec->description,100,'...') !!}</p>
                                    </div>
                                    <ul class="signature">
                                        <li>
                                            <img src="{{asset('/front/assets/img/about-img/signatures.png')}}" class="signature-img1" alt="Images">
                                            <img src="{{asset('/front/assets/img/about-img/signatures2.png')}}" class="signature-img2" alt="Images">
                                        </li>
                                        <li>
                                            <h3>Tarequl Islam</h3>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="about-img">
                                    <img src="{{ $sec->img_paths['original'] }}" alt="Image">
                                    <div class="about-img-text">
                                        <span>Build</span>
                                        <h3>2015</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- About Area End -->

            @elseif ($sec->section_design_type_id==4)
            <!-- Product Category -->
                <div class="about-area pt-100 pb-70">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="">
                                    <img src="{{asset('/front/images/Type-of-Product.png')}}" alt="Image">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="section2">
                                    <h2>{{ $sec->section_name }}</h2>
                                    <p>{!! \Illuminate\Support\Str::words($sec->description,150,'...') !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Product Category End -->

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
                                        <img src="{{ $news->img_paths['small'] }}" alt="{{ $news->title }}">
                                    </a>
                                    <div class="content">
                                        <span><a href="#">Home style</a> / {{ \Carbon\Carbon::parse($news->publish_date)->format('d-m-Y')}}</span>
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
            @elseif($sec->section_design_type_id==3 && count($products))
                {{-- feature products --}}
                <div class="feature-product scroll-animation-section show-on-scroll">
                    <div class="container" style="padding: 70px 0;">
                        <div class="section-title">
                            <h2>{{ $sec->section_name }}</h2>
                        </div>
                        <div class="row justify-content-center">
                            @foreach($products as $product)
                                <div class="
                                    @if($sec->col == 2)
                                        col-lg-6 col-sm-6 mb-4
                                    @elseif($sec->col == 3)
                                        col-lg-4 col-sm-6 mb-4 px-4
                                    @elseif($sec->col == 4)
                                        col-lg-3 col-sm-6 mb-4
                                    @endif">
                                    <div class="card">
                                        <div class="imgBox">
                                            <img src="{{$product->img_paths['original']}}" alt="{{ $product->name }}" class="mouse">
                                        </div>
                                        <div class="contentBox">
                                            <h3>{{ $product->name }}</h3>
                                            {{-- <h2 class="price">61.<small>98</small> €</h2>
                                            <a href="#" class="buy">Buy Now</a> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                {{-- <a href="services-1.html" class="default-btn">
                                    More Service

                                </a> --}}

                                <div class="text-center mt-5"> <a href="{{ url('/page/products') }}" class="default-btn">View All Products  <i class="flaticon-right-arrow-1"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end feature product --}}
            @elseif($sec->section_design_type_id==6 && count($services))
                <!-- Portfolio Area -->
                    <div class="portfolio-area pb-70">
                        <div class="container-fluid">
                            <div class="tab portfolio-tab">
                                <div class="container">
                                    <div class="section-title">
                                        <h2>Our Portfolio</h2>
                                    </div>
                                    <ul class="tabs active">
                                        <li class="current">
                                            <a href="#">All</a>
                                        </li>

                                        <li>
                                            <a href="#">Hospitality</a>
                                        </li>

                                        <li>
                                            <a href="#">Interior</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab_content current active pt-45">
                                    <div class="tabs_item current">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item1.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Royal palace</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Hospitality /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item1.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Royal palace</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Hospitality /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item1.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Royal palace</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Hospitality /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item1.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Royal palace</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Hospitality /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="tabs_item">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item1.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content active">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Royal palace</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Hospitality /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item2.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Glass foundation building</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item3.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">White house building</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">Royal /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Interior</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6">
                                                <div class="portfolio-item-two">
                                                    <a href="portfolio-details.html">
                                                        <img src="{{asset('/front/assets/img/portfolio/portfolio-item4.jpg') }}" alt="Images">
                                                    </a>
                                                    <div class="content">
                                                        <div class="title">
                                                            <h3><a href="portfolio-details.html">Rectangle building</a></h3>
                                                        </div>

                                                        <ul>
                                                            <li>
                                                                <a href="#">-Interior /</a>
                                                            </li>
                                                            <li>
                                                                <a href="#">Royal</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Portfolio Area End -->
            @elseif($sec->section_design_type_id==10 && count($projects))
                {{-- our project --}}
                <div class="our-project scroll-animation-section show-on-scroll" style="background: {{$sec->background_color}}">
                    <div class="container" style="margin:0;max-width:100%;">
                        <div class="heading-title">
                            <label>{{ $sec->section_name }}</label>

                        </div>
                        <div class="row">
                            @foreach($projects as $project)
                                <div class="
                                    @if($sec->col == 2)
                                        col-lg-6 col-sm-6 mb-4
                                    @elseif($sec->col == 3)
                                        col-lg-4 col-sm-6 mb-4
                                    @elseif($sec->col == 4)
                                        col-lg-3 col-sm-6 mb-4
                                    @endif
                                ">
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

            @elseif($sec->section_design_type_id==7 && count($teams))
                {{-- our team --}}
                <div class="team-area team-bg pt-100 pb-70">
                    <div class="container">
                        <div class="section-title-two text-center">
                            <span class="sp-before">Creative Team</span>
                            <h2>Our Motivated Team</h2>
                        </div>
                        <div class="row pt-45 customer-logo">
                            @foreach($teams as $team)
                            <div class="col-lg-4 col-sm-6">
                                <div class="team-card">
                                    <div class="images">
                                        <a href="single-team.html">
                                            <img src="{{ $team->img_paths['medium'] }}" alt="Images">
                                        </a>
                                        <ul class="social-link">
                                            <li>
                                                <a href="{{ $team->facebook }}" target="_blank"><i class="bx bxl-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $team->twitter }}#" target="_blank"><i class="bx bxl-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="{{ $team->linkedin }}" target="_blank"><i class="bx bxl-linkedin"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="content">
                                        <h3><a href="single-team.html">{{ $team->name }}</a></h3>
                                        <ul class="sub-title">
                                            <li>{{ $team->designation }}</li>
                                            {{-- <li>ARCHITECT</li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- end our value --}}

            @elseif($sec->section_design_type_id==12 && count($testimonials))
                {{-- Client Testimonial --}}
                <section class="testimonial text-center" style="background: {{$sec->background_color}}">
                    <div class="container">

                        <div class="heading white-heading">
                            {{ $sec->section_name }}
                        </div>
                        <div id="testimonial4" class="carousel slide testimonial4_indicators testimonial4_control_button thumb_scroll_x swipe_x" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">

                            <div class="carousel-inner" role="listbox">
                                @foreach ($testimonials as $key=>$testimonial)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="testimonial4_slide">
                                            <img src="{{ $testimonial->img_paths['small'] }}" class="img-circle img-responsive" />
                                            {!! $testimonial->message !!}
                                            <h4>{{ $testimonial->name }}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#testimonial4" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#testimonial4" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </section>
                {{-- end client Testimonial --}}




            @elseif($sec->section_design_type_id==8)
                {{-- counter --}}
                <div class="counter-section scroll-animation-section show-on-scroll" >
                    <img src="./front/images/elevator-buttons.webp" style="width: 100%;">
                    <div  style="position: absolute; top: 0%; margin: 0 auto; width: 100%; height: 100%; background: {{$sec->background_color}}">
                        <div class="container">

                            <div class="row">

                            <div class="four col-md-3">
                                <div class="counter-box">
                                    <i class="fa fa-thumbs-up"></i>
                                    <span class="counter">2147</span>
                                    <p>Customers</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box">
                                    <i class="fa fa-users"></i>
                                    <span class="counter">3275</span>
                                    <p>Client</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="counter">289</span>
                                    <p>Complete project</p>
                                </div>
                            </div>
                            <div class="four col-md-3">
                                <div class="counter-box">
                                    <i class="fa fa-user"></i>
                                    <span class="counter">1563</span>
                                    <p>Support Given</p>
                                </div>
                            </div>
                        </div>
                        </div>

                    </div>

                </div>
                {{-- end counter --}}
            @elseif($sec->section_design_type_id==9 && count($clients))
                {{-- valueable client --}}
                <div class="client-area pt-100 pb-70">
                    <div class="container">
                        <div class="section-title">
                            <h2>{{ $sec->section_name }}</h2>
                        </div>
                        <section class="customer-logos slider">
                            @foreach ($clients as $client)
                                <div class="slide"><img src="{{ $client->img_paths['original'] }}" alt="{{ $client->title}}"></div>
                            @endforeach
                        </section>
                    </div>
                </div>
            @endif

        @endforeach
    @endif
@endsection

@section('footer')

<script>
  $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
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
    $('.customer-logo').slick({
        slidesToShow: 4,
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
});

</script>
@endsection


