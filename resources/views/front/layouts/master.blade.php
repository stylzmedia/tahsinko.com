<!doctype html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $main_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu')->active()->first();
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
     <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
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
        <div class="top-navbar bg-dark d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-2  text-white"><i class="fa-solid fa-phone-flip fa-xl"></i> +88-02-222242057 <i class="fa-solid fa-envelope text-md fa-xl"></i> info@tahsinko.com</div>
                    <div class="col-md-6 p-2 text-white text-md-end y-1">
                        <i class="fa-brands fa-facebook fa-xl "></i>
                        <i class="fa-brands fa-instagram fa-xl"></i>
                        <i class="fa-brands fa-twitter fa-xl"></i>
                        <i class="fa-brands fa-youtube fa-xl"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- Top Nav End -->


        <!-- Start Navbar Area -->
        <div class="navbar-area">
            <!-- Menu For Mobile Device -->
            <div class="mobile-nav bg-light ">
                <a href="" class="logo ">
                    <img class="" src="{{asset('images/logo/Logo-Tahsinko.png')}}" alt="Tahsinko Logo" width="170px" height="55px">
                </a>
            </div>

            <!-- Menu For Desktop Device -->
            <div class="main-nav nav-two sticky-top">
                <div class="container-fluid">
                    <nav class=" navbar navbar-expand-md navbar-light ">
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <!-- <div class="menu-contact d-in-line">
                                <a href="tel:+180012356789" class="menu-contact-btn">
                                    <i class="flaticon-telephone"></i>
                                    +1 800 123 56 789
                                </a>
                            </div> -->
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="" class="nav-link active">HOME</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">ABOUT US</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">DECORATION</a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">MAJOR COMPONENTS</a>
                                </li>

                                <li class="nav-item logo ">
                                    <a href="" class="nav-link">
                                        <img src="{{asset('images/logo/Logo-Tahsinko.png')}}" alt="Tahsinko Logo" width="180px" height="65px">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">DEMO NAME</a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">NEWS</a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">Q&A</a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">CONTACT US</a>
                                </li>
                            </ul>
                            <div class="other-side d-in-line"></div>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="side-nav-responsive nav-two-responsive">
                <div class="container">
                    <!-- <div class="dot-menu">
                        <div class="circle-inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div> -->

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
                                            +88-02-222242057, 01819014568
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
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-widget footer-widget-color">
                            <a href="index.html" class="footer-logo">
                                <img src="{{$settings_g['logo'] ?? ''}}" alt="Images">
                            </a>
                            <ul class="footer-contact-list">
                                <li>
                                    <span> Address:</span> 2659 Autostrad St, London, UK
                                </li>
                                <li>
                                    <span>Message:</span> <a href="mailto:support@sprio.com"></a> support@sprio.com
                                </li>
                                <li>
                                    <span>Phone:</span> <a href="tel:215-123-4567"> 215 - 123 - 4567</a>
                                </li>
                                <li>
                                    <span>Open:</span>  Mon - Fri / 9:00 AM - 6:00 PM
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-plr">
                        <div class="footer-widget footer-widget-color">
                            <h3>OUR SERVICES</h3>
                            <ul class="footer-list">
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        <i class="bx bx-plus"></i>
                                        Interior Design
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        <i class="bx bx-plus"></i>
                                        Architecture Modeling
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        <i class="bx bx-plus"></i>
                                        Rendering Buildings
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        <i class="bx bx-plus"></i>
                                        Landscape works
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-widget-color">
                        <div class="footer-widget footer-widget-color pl-4">
                            <h3>LATEST PROJECTS</h3>
                            <ul class="footer-list">
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        Chemical Engineering Projects
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        Construction Engineering
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        Interior Welding Engineering
                                    </a>
                                </li>
                                <li>
                                    <a href="services-1.html" target="_blank">
                                        Welding Engineering
                                    </a>
                                </li>
                            </ul>
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
