<!doctype html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $main_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu')->active()->first();
    $socials = \App\Models\Settings::where(['group'=>'social'])->get();
    // $main_menu_right = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu Right')->active()->first();
    // $footer_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Footer')->active()->first();
    // $widgets = App\Models\Widget::with('Menu', 'Menu.SingleMenuItems')->where('status', 1)->where('placement', 'Footer')->orderBy('position')->get();
    // $general = \App\Models\Settings::where(['group'=>'general'])->get();

@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- FabIcons -->
    <link rel="shortcut icon" href="{{$settings_g['favicon'] ?? ''}}">

<!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0JY61M6DLL"> </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0JY61M6DLL');
    </script>
<!-- Google Tag  -->

    @yield('head')

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/font-awesome@6.1.2/css/all.min.css') }}" />

    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.theme.default.min.css')}}">

    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/magnific-popup.css')}}">

    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{asset('plugins/animate.css@4.1.1/animate.min.css')}}">

    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.css')}}">

    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/nice-select.min.css')}}">

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('front/assets/css/custom.css')}}">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/slick-theme.css')}}">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="{{ asset('plugins/bootstrap@5.2.1/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css') }}">

    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/theme-dark.css') }}">

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
    <div class="top-navbar d-sm-block" style="background-color: #FF0000">
        <div class="container">
            <div class="row">
                <div class="col-md-8 p-2  text-white">
                    <i class="fa-solid fa-phone-flip fa-xl"></i> <a class="text-white" href="tel:{{$settings_g['mobile_number'] ?? ''}}" rel="noopener noreferrer"> {{$settings_g['mobile_number'] ?? ''}} </a>, <a class="text-white me-3" href="tel:{{$settings_g['mobile_number2'] ?? ''}}" rel="noopener noreferrer"> {{$settings_g['mobile_number2'] ?? ''}} </a>
                    <i class="fa-solid fa-envelope text-md fa-xl"></i> {{$settings_g['email'] ?? ''}}
                </div>
                <div class="col-md-4 p-2 text-white text-md-end y-1">
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
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="{{ route('homepage') }}" class="logo">
                <img src="{{$settings_g['logo'] ?? asset('images/tahsinko-lift-n-escalator.png')}}" alt="{{$settings_g['title'] ?? ''}}">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav bg-white">
            <div class="container-fluid">
                <nav class="container-max-2 navbar navbar-expand-md navbar-light ">
                    <a class="navbar-brand" href="{{ route('homepage') }}">
                        <img src="{{$settings_g['logo'] ?? asset('images/tahsinko-lift-n-escalator.png')}}" class="nav-link-logo1" alt="{{$settings_g['title'] ?? ''}}">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                        <ul class="navbar-nav nav-ml">
                            @isset($main_menu->SingleMenuItems)
                                @foreach ($main_menu->SingleMenuItems as $item)
                                    <li class="nav-item">
                                        <a href="{{$item->menu_info['url']}}" class="nav-link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}"> {{ $item->menu_info['text'] }} @if(count($item->Items))<i class="fa-solid fa-chevron-down"></i>@endif</a>

                                        @if(count($item->Items))
                                            <ul class="dropdown-menu">
                                                @foreach ($item->Items as $sub_item)
                                                    <li class="nav-item">
                                                        <a href="{{ $sub_item->menu_info['url'] }}" class="nav-link">
                                                            {{ $sub_item->menu_info['text'] }}
                                                            @if(count($sub_item->Items))
                                                                <i class="fa-solid fa-chevron-right"></i>
                                                            @endif
                                                        </a>

                                                        @if(count($sub_item->Items))
                                                            <ul class="dropdown-menu">
                                                                @foreach ($sub_item->Items as $sub_sub_item)
                                                                    <li class="nav-item">
                                                                        <a href="{{ $sub_sub_item->menu_info['url'] }}" class="nav-link">
                                                                            {{ $sub_sub_item->menu_info['text'] }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
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


@yield('master')


<!-- Footer Area -->
    <div class="footer-area footer-bg" style="padding-top: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="footer-widget footer-widget-color">
                        <a href="{{ route('homepage') }}" class="footer-logo">
                            <img src="{{$settings_g['dark_logo'] ?? asset('images/tahsinko-lift-n-escalator-dark.png')}}" alt="Images">
                        </a>
                    </div>
                </div>

                <div class="col-lg-10 col-md-10 footer-plr">
                    <div class="footer-widget footer-widget-color">
                        <ul class="footer-list">
                            <li>
                                <span> Address:</span> {{$settings_g['street'] ?? ''}}, {{$settings_g['city'] ?? ''}} - {{$settings_g['zip'] ?? ''}}, {{$settings_g['country'] ?? ''}}
                            </li>
                            <li>
                                <span>Phone:</span><a href="tel:{{$settings_g['tel'] ?? ''}}"> {{$settings_g['tel'] ?? ''}}</a> Mobile:<a href="tel:{{$settings_g['mobile_number'] ?? ''}}"> {{$settings_g['mobile_number'] ?? ''}}</a>, <a href="tel:{{$settings_g['mobile_number2'] ?? ''}}"> {{$settings_g['mobile_number2'] ?? ''}}</a>,
                                <span>Email:</span> <a href="mailto:{{$settings_g['email'] ?? ''}}"></a> {{$settings_g['email'] ?? ''}}
                            </li>
                            <li>
                            </li>
                        </ul>
                    </div>
                </div>
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
                            <p>© Copyright 2020 - {{ date('Y') }} {{$settings_g['title'] ?? ''}}. All Right Reserved </p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- Copy-right Area two End -->


<!-- Script Start  -->

    <!-- Jquery Min JS -->
    <script src="{{ asset('front/assets/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Min JS -->
    <script src="{{ asset('plugins/bootstrap@5.2.3/js/bootstrap.min.js') }}"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Owl Carousel Min JS -->
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>

    <!-- Magnific Popup JS -->
    <script src="{{asset('front/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!-- Wow Min JS -->
    <script src="{{asset('front/assets/js/wow.min.js')}}"></script>

    <!-- Meanmenu JS -->
    <script src="{{asset('front/assets/js/meanmenu.js')}}"></script>

    <!-- Nice Select Min JS -->
    <script src="{{asset('front/assets/js/jquery.nice-select.min.js')}}"></script>

    <!-- Ajaxchimp Min JS -->
    <script src="{{asset('front/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- Form Validator Min JS -->
    <script src="{{asset('front/assets/js/form-validator.min.js')}}"></script>

    <!-- Contact Form JS -->
    <script src="{{asset('front/assets/js/contact-form-script.js')}}"></script>

    <!-- Custom Min JS -->
    <script src="{{asset('front/assets/js/custom.js')}}"></script>
    <!--Custom Animate JS-->
    <script src="{{asset('front/assets/js/custom-animate.js')}}"></script>

    <!--Slick JS-->
    <script src="{{asset('front/assets/js/slick.js')}}"></script>




<!-- Script End -->

@yield('footer')

</body>

</html>
