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
    <!-- Title  -->
    <title> {{ config('app.name') }} | {{$settings_g['slogan'] ?? ''}}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/front/assets/css/bootstrap.min.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('/front/assets/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('/front/assets/css/responsive.css') }}">


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

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <!-- Menu For Mobile Device -->
        <div class="mobile-nav">
            <a href="{{route('homepage')}}" class="logo">
                <img src="{{$settings_g['logo'] ?? ''}}" alt="{{$settings_g['title'] ?? ''}}">
            </a>
        </div>

        <!-- Menu For Desktop Device -->
        <div class="main-nav nav-two">
            <div class="container-fluid">
                <nav class="container-max-2 navbar navbar-expand-md navbar-light ">
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <div class="menu-contact d-in-line">
                            <a href="tel:+180012356789" class="menu-contact-btn">
                                <i class="flaticon-telephone"></i>
                                +1 800 123 56 789
                            </a>
                        </div>
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    Home
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link">
                                            Home One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-2.html" class="nav-link active">
                                            Home Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-3.html" class="nav-link">
                                            Home Three
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">
                                    About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Pages
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="team.html" class="nav-link">
                                            Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="single-team.html" class="nav-link">
                                            Single Team
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">
                                            FAQ
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="testimonials.html" class="nav-link">
                                            Testimonials
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="404.html" class="nav-link">
                                            404 page
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="sign-in.html" class="nav-link">
                                            Sign In
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="sign-up.html" class="nav-link">
                                            Sign Up
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="terms-condition.html" class="nav-link">
                                            Terms & Conditions
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">
                                            Privacy Policy
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="coming-soon.html" class="nav-link">
                                            Coming Soon
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Portfolio
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="portfolio.html" class="nav-link">
                                            Portfolio
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="portfolio-details.html" class="nav-link">
                                            Portfolio Details
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item logo">
                                <a href="index.html" class="nav-link">
                                    <img src="assets/img/logo/logo3.png" class="nav-link-logo1" alt="Image">
                                    <img src="assets/img/logo/logo1.png" class="nav-link-logo2" alt="Logo">
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Services
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="services-1.html" class="nav-link">
                                            Services Style One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="services-2.html" class="nav-link">
                                            Services Style Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="service-details.html" class="nav-link">
                                            Service Details
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Shop
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="shop.html" class="nav-link">
                                            Shop
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="cart.html" class="nav-link">
                                            Cart
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="checkout.html" class="nav-link">
                                            Checkout
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="shop-details.html" class="nav-link">
                                            Shop Details
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Blog
                                    <i class='bx bx-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="blog-1.html" class="nav-link">
                                            Blog Style One
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-2.html" class="nav-link">
                                            Blog Style Two
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-details.html" class="nav-link">
                                            Blog Details
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">
                                    Contact
                                </a>
                            </li>
                        </ul>

                        <div class="other-side d-in-line">
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
                        </div>
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

    <!-- Sidebar Modal -->
    <div class="sidebar-modal">
        <div class="sidebar-modal-inner">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <img src="assets/img/logo/logo2.png" class="sidebar-logo1" alt="Image">
                    <img src="assets/img/logo/logo1.png" class="sidebar-logo2" alt="Image">
                </div>

                <span class="close-btn sidebar-modal-close-btn">
                    <i class="bx bx-x"></i>
                </span>
            </div>

            <div class="sidebar-about">
                <div class="title">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut tur incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                    </p>
                </div>
            </div>

            <div class="contact-us">
                <h2>Contact Us</h2>

                <ul>
                    <li>
                        <i class='bx bx-current-location'></i>
                        Address: 2659 Autostrad St, London, UK
                    </li>

                    <li>
                        <i class='bx bx-mail-send'></i>
                        <a href="mailto:hello@sprio.com">hello@sprio.com</a>
                        <a href="#">Skype: example</a>
                    </li>

                    <li>
                        <i class='bx bx-phone-call'></i>
                        <a href="tel:+215-123-4567"> +215 - 123 - 4567</a>
                        <a href="tel:+215-123-8587"> +215 - 123 - 8587</a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-instagram-feed">
                <h2>Instagram</h2>

                <ul>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram1.jpg" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram2.jpg" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram3.jpg" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram4.jpg" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram5.jpg" alt="image">
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <img src="assets/img/instagram/instagram6.jpg" alt="image">
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-follow-us">
                <h2>Sidebar Follow</h2>

                <ul class="social-wrap">
                    <li>
                        <a href="#" target="_blank">
                            <i class="bx bxl-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="bx bxl-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="bx bxl-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="bx bxl-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar Modal -->

       @yield('master')


       <!-- Footer Area -->
       <div class="footer-area footer-bg pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-widget footer-widget-color">
                        <a href="{{route('homepage')}}" class="footer-logo">
                            <img src="{{$settings_g['logo'] ?? ''}}" alt="{{$settings_g['title'] ?? ''}}">
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
                                    <i class='bx bx-plus'></i>
                                    Interior Design
                                </a>
                            </li>
                            <li>
                                <a href="services-1.html" target="_blank">
                                    <i class='bx bx-plus'></i>
                                    Architecture Modeling
                                </a>
                            </li>
                            <li>
                                <a href="services-1.html" target="_blank">
                                    <i class='bx bx-plus'></i>
                                    Rendering Buildings
                                </a>
                            </li>
                            <li>
                                <a href="services-1.html" target="_blank">
                                    <i class='bx bx-plus'></i>
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
                                <i class='bx bx-time-five'></i>
                                <div class="content">
                                    <span>12 Jun 2020</span>
                                    <a href="#">Visiting rabat bridge</a>
                                </div>
                            </li>
                            <li>
                                <i class='bx bx-time-five'></i>
                                <div class="content">
                                    <span>30 April 2020</span>
                                    <a href="#">Meet iceland’s rivers & hills</a>
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
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-5">
                    <div class="copy-right-icon-two">
                        <ul class="social-link">
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                            <li>
                                <a href="#" target="_blank"><i class='bx bxl-youtube'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-7">
                    <div class="copyright-text-two">
                        <p>
                            Copyright @<script>document.write(new Date().getFullYear())</script> Sprio. All Rights Reserved by
                            <a href="https://hibootstrap.com/" target="_blank">HiBootstrap</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copy-right Area two End -->


   <!-- Jquery Min JS -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{asset('/front/assets/js/bootstrap.bundle.min.js') }}"></script>

    @yield('footer')
</body>

</html>
