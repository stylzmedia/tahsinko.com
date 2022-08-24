@extends('front.layouts.master')

@section('head')
    {{-- @include('meta::manager', [
        'title' => ($settings_g['title'] ?? env('APP_NAME')) . ' - ' . ($settings_g['slogan'] ?? '')
    ]) --}}

@endsection

@section('master')
     {{-- sliders --}}
     <div class="header-slider">
        <div class="container" style="margin:0;max-width:100%;">

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
                        @endif
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    {{-- end sliders --}}


    @if(count($home_sections))
        @foreach($home_sections as $key=>$sec)
            @if($sec->section_design_type_id==1)
                {{-- about us --}}
                <div class="short-about-us scroll-animation-section show-on-scroll is-visible">
                    <div class="short-backgroud" style="background: {{$sec->background_color}}">
                        <ul class="circles">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <div class="short-inner-content scroll-section-content">
                            <div class="container">
                                <div class="ceo-box">
                                    <div class="row">
                                        @if($sec->text_align == 1)
                                            <div class="col-lg-5 col-md-6">
                                                <div class="ceo-img">
                                                    <img class="img-fluid d-block mx-auto" src="{{ $sec->img_paths['original'] }}" alt="{{ $sec->title }}" >
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-lg-7 col-md-6">
                                            <div class="content mt-4">
                                                <div class="ceo-title">
                                                    <label>{{ $sec->title }}</label>
                                                </div>
                                                <div class="ceo-details">


                                                    {!! \Illuminate\Support\Str::words($sec->description,100,'...') !!}
                                                </div>

                                            </div>
                                            @if(!empty($sec->button_name))
                                            <div class="my-4">
                                                <a href=" @if(empty($sec->button_url))javascript:void(0); @else {{$sec->button_url}} @endif">{{$sec->button_name}}</a>
                                            </div>
                                            @endif
                                        </div>
                                        @if($sec->text_align == 2)
                                            <div class="col-lg-5 col-md-6">
                                                <div class="ceo-img">
                                                    <img class="img-fluid" src="{{ $sec->img_paths['original'] }}" alt="{{ $sec->title }}" >
                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- end about us --}}

            @elseif($sec->section_design_type_id==3 && count($products))
                {{-- feature products --}}
                <div class="feature-product scroll-animation-section show-on-scroll" style="margin-bottom: 17px; background: {{$sec->background_color}}">
                    <div class="container" style="padding: 70px 0;">
                        <div class="heading-title text-white">
                            <label>{{ $sec->section_name }}</label>
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
                                @endif
                                ">
                                    <div class="cart-box">
                                        <div class="cart-image">
                                            <img src="{{$product->img_paths['original']}}" alt="{{ $product->name }}"/>
                                            {{-- <a class="text-center" href="#"> --}}
                                            <div class="feature-detail">

                                                <div class="detail-btn">Details</div> <i class="fa fa-link" ></i>

                                            </div>
                                        {{-- </a> --}}
                                        </div>
                                        <div class="title-bar text-uppercase">{{ $product->name }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-lg-12 ceo-box">
                                <div class="text-center mt-5"> <a href="{{ url('/page/products') }}" class="">View All Products</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end feature product --}}

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
            @elseif($sec->section_design_type_id==6 && count($services))
                {{-- our service --}}
                <section class="servicesNew scroll-animation-section show-on-scroll" style="background: {{$sec->background_color}}">
                    <div class="servicesNewline scroll-animation-section show-on-scroll">
                        <div class="container">
                            <div class="heading-title text-white">
                                <label>{{ $sec->section_name }}</label>
                            </div>
                            <div class="row services-list justify-content-center">
                                @foreach($services as $service)
                                    <div class="
                                        @if($sec->col == 2)
                                            col-lg-6 col-md-6 col-sm-12
                                        @elseif($sec->col == 3)
                                            col-lg-4 col-md-6 col-sm-12
                                        @elseif($sec->col == 4)
                                            col-lg-3 col-md-6 col-sm-12
                                        @endif
                                    ">
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
                {{-- end our service --}}
            @elseif($sec->section_design_type_id==11 && count($values))
                {{-- our value --}}
                <div class="our-value-section" style="background: {{$sec->background_color}}">
                    <div class="our-value scroll-animation-section show-on-scroll">
                        <div class="container">
                            <div class="heading-title" style="font-weight: bold;color: #fff;">
                                <label>{{ $sec->section_name }}</label>
                            </div>
                            <div class="row justify-content-center">
                                @foreach ($values as $value)
                                    <div class="
                                        @if($sec->col == 2)
                                            col-lg-6 col-md-6 col-sm-12
                                        @elseif($sec->col == 3)
                                            col-lg-4 col-md-6 col-sm-12
                                        @elseif($sec->col == 4)
                                            col-lg-3 col-md-6 col-sm-12
                                        @endif
                                    ">
                                        <div class="our-value-box">
                                            <div class="content-box">
                                                <h5>{{ $value->title }}</h5>
                                                {!! \Illuminate\Support\Str::limit($value->description,120) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>

                {{-- end our value --}}
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
                {{-- valueable client --}}
                @elseif($sec->section_design_type_id==9 && count($clients))
                <div class="client-section scroll-animation-section show-on-scroll" style="background: {{$sec->background_color}}">
                    <div class="container" style="padding: 70px 0;" >
                        <div class="heading-title text-white">
                            <label>{{ $sec->section_name }}</label>
                        </div>
                        <section class="customer-logos slider">
                            @foreach ($clients as $client)
                                <div class="slide bg-white" style="width: 160px;height: 160px;" >
                                    <img class="img-fluid  mx-auto" data-toggle="tooltip" style="height: 160px; width: 160px; padding: 10px;" src="{{ $client->img_paths['original'] }}" title="{{ $client->title}}">
                                </div>
                            @endforeach
                        </section>

                    </div>
                </div>

                {{-- end valuable client --}}
            @elseif($sec->section_design_type_id==2 && count($newes))
                {{-- News and Event --}}
                <div class="our-news scroll-animation-section show-on-scroll" style="padding-bottom: 15px; background: {{$sec->background_color}}">
                    <div class="container" >
                        <div class="heading-title">
                            <label>{{ $sec->section_name }}</label>

                        </div>
                        <div class="row">
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
                                    <div class="blog-item">
                                        <div class="image-wrap">
                                            <a href="blog-details">
                                                <img src="{{ $news->img_paths['small'] }}" alt="Blog">
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                        <ul class="blog-meta mb-10">
                                            <li class="date"> <i class="fa fa-calendar-check-o"></i> {{ \Carbon\Carbon::parse($news->publish_date)->format('d-M-Y')}}</li>
                                        </ul>
                                        <h3 class="blog-title"><a href="{{ route('news.single', $news->slug) }}">{{ $news->title }}</a></h3>
                                        {!! \Illuminate\Support\Str::limit($news->description,100) !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
            {{-- end News and Event --}}
        @endforeach
    @endif
@endsection

@section('footer')

@endsection


