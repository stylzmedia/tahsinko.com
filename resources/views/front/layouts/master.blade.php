<!doctype html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $main_menu_left = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu Left')->active()->first();
    $main_menu_right = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu Right')->active()->first();
    $footer_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Footer')->active()->first();

    $widgets = App\Models\Widget::with('Menu', 'Menu.SingleMenuItems')->where('status', 1)->where('placement', 'Footer')->orderBy('position')->get();

    $socials = \App\Models\Settings::where(['group'=>'social'])->get();
    $general = \App\Models\Settings::where(['group'=>'general'])->get();

@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FabIcons -->
    <link rel="shortcut icon" href="{{$settings_g['favicon'] ?? ''}}">

    @yield('head')

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />

     {{-- <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/bootstrap.min.css') }}">
     <!-- Boxicons CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/boxicons.min.css')}}"> --}}

     <!-- Flaticon CSS -->
     <link rel="stylesheet" href="{{ asset('front/assets/fonts/flaticon.css') }}">
     <!-- Font Awesome CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
     <!-- Owl Carousel Min CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/owl.carousel.min.css')}}">
     <link rel="stylesheet" href="{{asset('/front/assets/css/owl.theme.default.min.css')}}">
     <!-- Magnific Popup CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/magnific-popup.css')}}">
     <!-- Animate Min CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/animate.min.css')}}">
     <!-- Meanmenu CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/meanmenu.css')}}">
     <!-- Nice Select CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/nice-select.min.css')}}">
     <!-- Style CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/style.css')}}">
     <link rel="stylesheet" href="{{asset('/front/assets/css/custom.css')}}">
     {{-- <link rel="stylesheet" href="{{asset('/front/css/main.css')}}"> --}}


    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

     <!-- Animation CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

     <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">


    <!-- Font-Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

     <!-- Responsive CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/responsive.css') }}">
      <!-- Theme Dark CSS -->
      <link rel="stylesheet" href="{{asset('/front/assets/css/theme-dark.css') }}">

</head>

<body>
    <!-- PreLoader Start -->
    {{-- <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-cube-area">
                    <div class="sk-cube1 sk-cube"></div>
                    <div class="sk-cube2 sk-cube"></div>
                    <div class="sk-cube4 sk-cube"></div>
                    <div class="sk-cube3 sk-cube"></div>
                </div>
            </div>
        </div>
    </div> --}}
        <!-- PreLoader End -->

        <!-- Top Nav Start -->
        <div class="top-navbar d-none d-sm-block" style="background-color: #FF0000">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2  text-white">
                        <i class="fa-solid fa-phone-flip fa-xl"></i> <a class="text-white me-3" href="tel:+8801720397476" rel="noopener noreferrer" target="_blank"> {{$settings_g['mobile_number'] ?? ''}} </a>
                        <i class="fa-solid fa-envelope text-md fa-xl"></i> {{$settings_g['email'] ?? ''}}
                    </div>
                    <div class="col-md-6 p-2 text-white text-md-end y-1">
                        <div class="top-bar-left">

                            <ul class="social-wrap">
                                @if(Info::Social($socials, 'facebook'))
                                <li>
                                    <a href="{{Info::Social($socials,  'facebook')}}" target="_blank">
                                        <i class="fa-brands fa-square-facebook"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'linkedin'))
                                <li>
                                    <a href="{{Info::Social($socials,  'linkedin')}}" target="_blank">
                                        <i class="fa-brands fa-square-linkedin"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials,  'twitter'))
                                <li>
                                    <a href="{{Info::Social($socials,  'twitter')}}" target="_blank">
                                        <i class="fa-brands fa-square-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'instagram'))
                                <li>
                                    <a href="{{Info::Social($socials,  'instagram')}}" target="_blank">
                                        <i class="fa-brands fa-square-instagram"></i>>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'youtube'))
                                <li>
                                    <a href="{{Info::Social($socials,  'youtube')}}" target="_blank">
                                        <i class="fa-brands fa-square-youtube"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Top Nav End -->


        <!-- Start Navbar Area -->
 <!-- Start Navbar Area -->
 <div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('homepage') }}" class="logo">
            <img src="{{$settings_g['logo'] ?? ''}}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav bg-white">
        <div class="container-fluid">
            <nav class="container-max-2 navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="{{ route('homepage') }}">
                    <img src="{{$settings_g['logo'] ?? ''}}" class="nav-link-logo1" alt="{{$settings_g['title'] ?? ''}}">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                    <ul class="navbar-nav nav-ml">
                        @isset($main_menu_left->SingleMenuItems)
                            @foreach ($main_menu_left->SingleMenuItems as $item)
                                <li class="nav-item">
                                    <a href="{{$item->menu_info['url']}}" class="nav-link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}"> {{ $item->menu_info['text'] }} @if(count($item->Items))<i class="fa-solid fa-chevron-down"></i>@endif</a>

                                    @if(count($item->Items))
                                    <ul class="dropdown-menu">
                                        @foreach ($item->Items as $sub_item)
                                            <li class="nav-item">
                                                <a href="{{ $sub_item->menu_info['url'] }}" class="nav-link">
                                                    {{ $sub_item->menu_info['text'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </div>
            </nav>
        </div>
    </div>

</div>
<!-- End Navbar Area -->
        <!-- End Navbar Area -->


       @yield('master')


        <!-- Footer Area -->
        <div class="footer-area footer-bg pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-widget-color">
                            <a href="{{ route('homepage') }}" class="footer-logo">
                                <img src="{{$settings_g['dark_logo'] ?? ''}}" alt="Images">
                                <p>{{$settings_g['title'] ?? ''}}</p>
                            </a>
                            <ul class="footer-contact-list">
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-plr">
                        <div class="footer-widget footer-widget-color">
                            <h3>BANGLADESH OFFICE</h3>
                            <ul class="footer-list">

                                <li>
                                    <span> Address:</span> {{$settings_g['street'] ?? ''}}, {{$settings_g['city'] ?? ''}}
                                </li>
                                <li>
                                    <span>Message:</span> <a href="mailto:{{$settings_g['email'] ?? ''}}"></a> {{$settings_g['email'] ?? ''}}
                                </li>
                                <li>
                                    <span>Phone:</span> <a href="tel:{{$settings_g['mobile_number'] ?? ''}}"> {{$settings_g['mobile_number'] ?? ''}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @foreach ($widgets as $widget)
                    <div class="col-lg-3 col-md-6 footer-widget-color">
                        <div class="footer-widget footer-widget-color pl-4">
                            <h3>{{$widget->title}}</h3>
                            @if($widget->type == 'Menu' && $widget->Menu)
                            <ul class="footer-list">
                                @foreach ($widget->Menu->SingleMenuItems as $item)
                                <li>
                                    <a href="{{$item->menu_info['url']}}" target="_blank">
                                        {{$item->menu_info['text']}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                            @else
                            {!! $widget->text !!}
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Footer Area End -->

        <!-- Copy-right Area two End -->
        <div class="copy-right-area-two">
                <div class="container p-2">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-5">
                            <div class="copy-right-icon-two">
                                <p>© Copyright 2020 - {{ date('Y') }} TAHSINKO Limited. All Right Reserved </p>
                            </div>
                        </div>

                        {{-- <div class="col-lg-6 col-md-7">
                            <div class="copyright-text-two">
                                <p>
                                    website by
                                    <a href="https://stylzmedia.com/" target="_blank">stylzMedia Limited</a>
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
        </div>
        <!-- Copy-right Area two End -->
    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    {{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}

    <!-- Jquery Min JS -->
    <script src="{{ asset('/front/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{asset('/front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{asset('/front/assets/js/owl.carousel.min.js')}}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{asset('/front/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('/front/assets/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Wow Min JS -->
    <script src="{{asset('/front/assets/js/wow.min.js')}}"></script>
    <!-- Meanmenu JS -->
    <script src="{{asset('/front/assets/js/meanmenu.js')}}"></script>
    <!-- Nice Select Min JS -->
    <script src="{{asset('/front/assets/js/jquery.nice-select.min.js')}}"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="{{asset('/front/assets/js/jquery.ajaxchimp.min.js')}}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{asset('/front/assets/js/form-validator.min.js')}}"></script>
    <!-- Contact Form JS -->
    <script src="{{asset('/front/assets/js/contact-form-script.js')}}"></script>
    <!-- Custom Min JS -->
    <script src="{{asset('/front/assets/js/custom.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


    <script>



   //   animate css start
    const animateOnScroll = () => {
    const animate1 = document.querySelectorAll(".animate-1");
    const animate2 = document.querySelectorAll(".animate-2");
    const animate3 = document.querySelectorAll(".animate-3");

    animate1.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "animate__bounceInLeft");
        } else {
        element.classList.remove("animate__animated", "animate__bounceInLeft");
        }
    });

    animate2.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "animate__bounceInRight");
        } else {
        element.classList.remove("animate__animated", "animate__bounceInRight");
        }
    });

    animate3.forEach((element) => {
        const position = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (position < windowHeight) {
        element.classList.add("animate__animated", "rotateIn");
        } else {
        element.classList.remove("animate__animated", "rotateIn");
        }
    });
    };

    window.addEventListener("scroll", animateOnScroll);
//   animate css end
    </script>

    @yield('footer')
</body>

</html>
