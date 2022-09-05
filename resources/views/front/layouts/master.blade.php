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
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <!-- Title  -->
    <title> {{ config('app.name') }} | {{$settings_g['slogan'] ?? ''}}</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/bootstrap.min.css') }}">
     <!-- Flaticon CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/flaticon.css')}}">
     <!-- Boxicons CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/boxicons.min.css')}}">
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
     <!-- Responsive CSS -->
     <link rel="stylesheet" href="{{asset('/front/assets/css/responsive.css') }}">
      <!-- Theme Dark CSS -->
      <link rel="stylesheet" href="{{asset('/front/assets/css/theme-dark.css') }}">


    @yield('head')
</head>

<body>
    <!-- PreLoader Start -->
    <div class="preloader">
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
    </div>
        <!-- PreLoader End -->

        <!-- Top Nav Start -->
        <div class="top-navbar bg-dark d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2  text-white"><i class="fa-solid fa-phone-flip fa-xl"></i> {{$settings_g['mobile_number'] ?? ''}} <i class="fa-solid fa-envelope text-md fa-xl"></i> {{$settings_g['email'] ?? ''}}</div>
                    <div class="col-md-6 p-2 text-white text-md-end y-1">
                        <div class="top-bar-left">

                            <ul class="social-wrap">
                                @if(Info::Social($socials, 'facebook'))
                                <li>
                                    <a href="{{Info::Social($socials,  'facebook')}}" target="_blank">
                                        <i class="bx bxl-facebook"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'linkedin'))
                                <li>
                                    <a href="{{Info::Social($socials,  'linkedin')}}" target="_blank">
                                        <i class="bx bxl-linkedin"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials,  'twitter'))
                                <li>
                                    <a href="{{Info::Social($socials,  'twitter')}}" target="_blank">
                                        <i class="bx bxl-twitter"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'instagram'))
                                <li>
                                    <a href="{{Info::Social($socials,  'instagram')}}" target="_blank">
                                        <i class="bx bxl-instagram"></i>
                                    </a>
                                </li>
                                @endif
                                @if(Info::Social($socials, 'youtube'))
                                <li>
                                    <a href="{{Info::Social($socials,  'youtube')}}" target="_blank">
                                        <i class="bx bxl-youtube"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>

                            {{-- <div class="social">
                                     @if(Info::Social($socials, 'facebook'))
                                             <a href="{{Info::Social($socials,  'facebook')}}" target="_blank"><i class="fab fa-facebook"></i></a>
                                     @endif
                                     @if(Info::Social($socials, 'linkedin'))
                                             <a href="{{Info::Social($socials,  'linkedin')}}"><i class="fab fa-linkedin" target="_blank"></i></a>
                                     @endif
                                     @if(Info::Social($socials,  'twitter'))
                                             <a href="{{Info::Social($socials,  'twitter')}}"><i class="fab fa-twitter" target="_blank"></i></a>
                                     @endif
                                     @if(Info::Social($socials, 'instagram'))
                                             <a href="{{Info::Social($socials,  'instagram')}}"><i class="fab fa-instagram" target="_blank"></i></a>
                                     @endif
                                     @if(Info::Social($socials, 'youtube'))
                                             <a href="{{Info::Social($socials,  'youtube')}}"><i class="fab fa-youtube" target="_blank"></i></a>
                                     @endif
                            </div> --}}
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
        <a href="index.html" class="logo">
            <img src="assets/img/logo/logo1.png" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav nav-two">
        <div class="container-fluid">
            <nav class="container-max-2 navbar navbar-expand-md navbar-light ">
                <div class="collapse navbar-collapse mean-menu justify-content-center" id="navbarSupportedContent" >
                    {{-- <div class="menu-contact d-in-line">
                        <a href="tel:+180012356789" class="menu-contact-btn">
                            <i class="flaticon-telephone"></i>
                            +1 800 123 56 789
                        </a>
                    </div> --}}

                    <div class="row">
                        <div class="col-5">
                            <ul class="navbar-nav m-auto">

                                <li class="nav-item">
                                    <a href="{{route('homepage')}}" class="nav-link {{ url('/') == url()->current() ? 'active' : ''}}">HOME</a>
                                </li>


                                @foreach ($main_menu_left->SingleMenuItems as $item)
                                    <li class="nav-item">
                                        <a href="{{$item->menu_info['url']}}" class="nav-link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}"> {{ $item->menu_info['text'] }}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="col-2">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item logo">
                                    <a href="index.html" class="nav-link">
                                        <img src="{{$settings_g['logo'] ?? ''}}" class="nav-link-logo1" alt="{{$settings_g['title'] ?? ''}}">
                                        <img src="{{$settings_g['dark_logo'] ?? ''}}" class="nav-link-logo2" alt="{{$settings_g['title'] ?? ''}}">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-5">
                            <ul class="navbar-nav m-auto">
                                @foreach ($main_menu_right->SingleMenuItems as $item)
                                <li class="nav-item">
                                    <a href="{{$item->menu_info['url']}}" class="nav-link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}"> {{ $item->menu_info['text'] }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- <div class="other-side d-in-line">
                        <div class="search-area">
                            <div class="other-option">
                                <div class="search-item">
                                    <a href="#" class="search-btn-2">
                                        <i class="bx bx-search"></i>
                                    </a>
                                    <i class="close-btn bx bx-x"></i>
                                    <div class="search-overlay search-popup">
                                        <div class="search-box-2">
                                            <form class="search-form">
                                                <input class="search-input" name="search" placeholder="Search" type="text">
                                                <button class="search-button" type="submit">
                                                    <i class="bx bx-search"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="menu-icon d-in-line">
                            <a href="#" class="burger-menu menu-icon-two">
                                <i class='flaticon-menu'></i>
                            </a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive nav-two-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center  align-items-center">
                        <div class="side-item">
                            <div class="responsive-search-box">
                                <form class="search-form">
                                    <input class="form-control" name="search" placeholder="Search Your Result" type="text">
                                    <button class="search-btn" type="submit">
                                        <i class="bx bx-search"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="responsive-menu-icon">
                                <a href="#" class="burger-menu menu-icon-bg">
                                    <i class='flaticon-menu'></i>
                                </a>
                            </div>
                        </div>

                        <div class="side-item">
                            <div class="responsive-menu-contact">
                                <a href="tel:+180012356789" class="menu-contact-btn">
                                    <i class="flaticon-telephone"></i>
                                    +1 800 123 56 789
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
        <!-- End Navbar Area -->


       @yield('master')


        <!-- Footer Area -->
        {{-- <div class="footer-area footer-bg pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="footer_logo">
                                <img src="{{asset('images/logo/Logo-Tahsinko.png')}}" alt="Tahsinko Logo" srcset="">
                                <p class="text-footer">
                                    102/1, Sute # 6B, West Agargaon,<br>
                                    Sher-E-Bngla Nagar, Dhaka-1207 <br>
                                    Phone: +88-02-222242057, 01819014568<br>
                                    Email: info@tahsinko.com tahsinkolift@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="text-dark">NAVIGATION</h4>
                                    <div class="footer_link">
                                        <ul class="navbar-nav m-auto">
                                            <li class="nav-item">
                                                <a href="{{asset('')}}" class="nav-link text-footer">Q&A</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{asset('')}}" class="nav-link text-footer">NEWS</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{asset('')}}" class="nav-link text-footer">CONTACT US</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-dark">MANUFACTURER IN CHINA</h4>
                                    <p class="text-footer">
                                        Zhejiang KNK Elevator Co. Ltd. <br>
                                        Suzhou Fuji Hitech Elevator Co. Ltd.
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <h4 class="text-dark">MANUFACTURER IN EUROPE</h4>
                                    <p class="text-footer">
                                        DOPPLER S. A, <br>
                                        <i class="fa-brands fa-chrome"></i> www.doppler.gr <br>
                                        <i class="fa-solid fa-envelope"></i> info@doppler.gr
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div> --}}
        <div class="footer-area footer-bg pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-widget-color">
                            <a href="index.html" class="footer-logo">
                                <img src="{{$settings_g['dark_logo'] ?? ''}}" alt="Images">
                            </a>
                            <ul class="footer-contact-list">


                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-plr">
                        <div class="footer-widget footer-widget-color">
                            <h3>BANGLADESH OFFICE</h3>
                            <ul class="footer-list">
                                <p>{{$settings_g['title'] ?? ''}}</p>
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

                    <div class="col-lg-3 col-md-6 footer-widget-color">
                        <div class="footer-widget footer-widget-color pl-4">
                            @foreach ($widgets as $widget)
                                <h3>{{$widget->title[1]}}</h3>
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
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-widget-color">
                            <h3>RECENT NEWS</h3>
                            <ul class="footer-news">
                                <li>
                                    <i class="bx bx-time-five"></i>
                                    <div class="content">
                                        <span>12 Jun 2020</span>
                                        <a href="#">Visiting rabat bridge</a>
                                    </div>
                                </li>
                                <li>
                                    <i class="bx bx-time-five"></i>
                                    <div class="content">
                                        <span>30 April 2020</span>
                                        <a href="#">Meet iceland’s rivers &amp; hills</a>
                                    </div>
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
                                <p>© Copyright 2020 TAHSINKO Limited. All Right Reserved </p>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-7">
                            <div class="copyright-text-two">
                                <p>
                                    website by
                                    <a href="https://stylzmedia.com/" target="_blank">stylzMedia Limited</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
        </div>
        <!-- Copy-right Area two End -->



    <!-- Jquery Min JS -->
    <script src="{{ asset('/front/assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{asset('/front/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{asset('/front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('/front/assets/js/owl.min.js')}}"></script>
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









    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    @yield('footer')
</body>

</html>
