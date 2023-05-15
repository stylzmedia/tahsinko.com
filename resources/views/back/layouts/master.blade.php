<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>

    <meta charset="utf-8" />
    <title>@yield('title') - {{$settings_g['title'] ?? env('APP_NAME')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{$settings_g['favicon'] ?? ''}}">

    <!-- jsvectormap css -->
    <link href="{{ asset('back/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('back/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ asset('back/assets/js/layout.js') }}"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('back/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--data table-->
    <link href="{{ asset('plugins/DataTables/datatables.min.css') }}" rel="stylesheet"/>

    <link rel="stylesheet" href="{{ asset('plugins/select2@4.1.0-rc.0/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- App Css-->
    <link href="{{ asset('back/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('back/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .uploaded_img {
            /* height: 168px; */
            margin: 0 auto;
            display: block;
            width: auto;
        }
        .remove_image {
            position: absolute;
            top: 0;
            left: 60%;
        }
    </style>
    @yield('head')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    @include('switcher::code')

    <script>
        window.application_root = '{{url("/")}}';
        window.application_root_api = '{{url("/api")}}';
    </script>

</head>

<body>
    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
        @csrf
    </form>
     <!-- Begin page -->
     <div class="main" id="app">

        <header id="page-topbar">
            <div class="layout-width">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box horizontal-logo">
                            <a href="{{route('dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    @if(isset($settings_g['logo']) && $settings_g['logo'])
                                        <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="22">
                                    @else
                                        {{$settings_g['title'] ?? ''}}
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    @if(isset($settings_g['logo']) && $settings_g['logo'])
                                        <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="17">
                                    @else
                                        {{$settings_g['title'] ?? ''}}
                                    @endif
                                </span>
                            </a>

                            <a href="{{route('dashboard')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    @if(isset($settings_g['logo']) && $settings_g['logo'])
                                        <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="22">
                                    @else
                                        {{$settings_g['title'] ?? ''}}
                                    @endif
                                </span>
                                <span class="logo-lg">
                                    @if(isset($settings_g['logo']) && $settings_g['logo'])
                                        <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="17">
                                    @else
                                        {{$settings_g['title'] ?? ''}}
                                    @endif
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                            id="topnav-hamburger-icon">
                            <span class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>

                        <!-- App Search-->
                        <form class="app-search d-none d-md-block">
                            <div class="position-relative" style="display: none;">
                                <input type="text" class="form-control" placeholder="Search..." autocomplete="off"
                                    id="search-options" value="">
                                <span class="mdi mdi-magnify search-widget-icon"></span>
                                <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
                                    id="search-close-options"></span>
                            </div>

                        </form>
                    </div>
                    <div class="d-flex align-items-center">
                       <a href="{{route('homepage')}}" target="_blank" >
                        <button type="button" class="btn btn-danger text-white"> <i class="ri-eye-fill"></i> View Website</button>
                        </a>
                    </div>
                    <div class="d-flex align-items-right">
                        <div class="dropdown ms-sm-3 header-item topbar-user">
                            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="d-flex align-items-center">
                                    @if (auth()->user()->profile_image != Null)
                                        <img class="rounded-circle header-profile-user" src="{{auth()->user()->profile_path}}" alt="{{ auth()->user()->last_name }}">
                                    @else
                                        <img class="rounded-circle header-profile-user" src="{{ asset('back/assets/images/avatar.png') }}"
                                    alt="{{ auth()->user()->last_name }}">
                                    @endif
                                    <span class="text-start ms-xl-2">
                                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->last_name }}</span>
                                        {{-- <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span> --}}
                                    </span>
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome {{ auth()->user()->last_name }}</h6>
                                <a class="dropdown-item" href="{{route('admin.update-profile')}}"><i
                                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle">Profile</span></a>
                                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span
                                        class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{route('dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        @if(isset($settings_g['logo']) && $settings_g['logo'])
                            <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="22">
                        @else
                            {{$settings_g['title'] ?? ''}}
                        @endif
                    </span>
                    <span class="logo-lg">
                        @if(isset($settings_g['logo']) && $settings_g['logo'])
                            <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="50">
                        @else
                            {{$settings_g['title'] ?? ''}}
                        @endif
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{route('dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        @if(isset($settings_g['logo']) && $settings_g['logo'])
                            <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="22">
                        @else
                            {{$settings_g['title'] ?? ''}}
                        @endif
                    </span>
                    <span class="logo-lg">
                        @if(isset($settings_g['logo']) && $settings_g['logo'])
                            <img src="{{$settings_g['logo'] ?? env('APP_NAME')}}" alt="{{$settings_g['title'] ?? env('APP_NAME')}}" height="50">
                        @else
                            {{$settings_g['title'] ?? ''}}
                        @endif
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link menu-link {{Route::is('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-widgets">Dashboards</span>
                            </a>
                        </li>
                        @if(auth()->user()->permission('news','list'))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.news.index') || Route::is('back.news.create') || Route::is('back.news.edit') || Route::is('back.news.categories')) ? 'active' : 'collapsed'}}" href="#sidebarNews" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.news.index') || Route::is('back.news.create') || Route::is('back.news.edit') || Route::is('back.news.categories')) ? 'true' : 'false'}}" aria-controls="sidebarNews">
                                <i class="ri-newspaper-line"></i> <span data-key="t-apps">News</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.news.index') || Route::is('back.news.create') || Route::is('back.news.edit') || Route::is('back.news.categories')) ? 'show' : ''}}" id="sidebarNews">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('news','list'))
                                    <li class="nav-item">
                                        <a href="{{route('back.news.index')}}" class="nav-link {{Route::is('back.news.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('news','add'))

                                    <li class="nav-item">
                                        <a href="{{route('back.news.create')}}" class="nav-link {{Route::is('back.news.create') ? 'active' : ''}}" data-key="t-mailbox"> Create </a>
                                    </li>
                                    @endif

                                    <li class="nav-item">
                                        <a href="{{route('back.news.categories')}}" class="nav-link {{Route::is('back.news.categories') ? 'active' : ''}}" data-key="t-mailbox"> Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(auth()->user()->permission('portfolio','list'))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.portfolio.index') || Route::is('back.portfolio.create') || Route::is('back.portfolio.edit')) ? 'active' : 'collapsed'}}" href="#sidebarPortfolio" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.portfolio.index') || Route::is('back.portfolio.create') || Route::is('back.portfolio.edit')) ? 'true' : 'false'}}" aria-controls="sidebarPortfolio">
                                <i class="ri-artboard-2-line"></i> <span data-key="t-apps">Project</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.portfolio.index') || Route::is('back.portfolio.create') || Route::is('back.portfolio.edit')) ? 'show' : ''}}" id="sidebarPortfolio">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('portfolio','list'))
                                    <li class="nav-item">
                                        <a href="{{route('back.portfolio.index')}}" class="nav-link {{Route::is('back.portfolio.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('portfolio','add'))

                                    <li class="nav-item">
                                        <a href="{{route('back.portfolio.create')}}" class="nav-link {{Route::is('back.portfolio.create') ? 'active' : ''}}" data-key="t-mailbox"> Create </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(auth()->user()->permission('product','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['product']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.product.index') || Route::is('back.product.create') || Route::is('back.product.edit') || Route::is('back.product.category')) ? 'active' : 'collapsed'}}" href="#sidebarPeople" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.product.index') || Route::is('back.product.create') || Route::is('back.product.edit') || Route::is('back.product.category')) ? 'true' : 'false'}}" aria-controls="sidebarPeople">
                                <i class="ri-shopping-cart-fill"></i> <span data-key="t-apps">Products</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.product.index') || Route::is('back.product.create') || Route::is('back.product.edit') || Route::is('back.product.category')) ? 'show' : ''}}" id="sidebarPeople">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('product','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['product']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.product.index')}}" class="nav-link {{Route::is('back.product.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('product','add'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['product']['add']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.product.create')}}" class="nav-link {{Route::is('back.product.create') ? 'active' : ''}}" data-key="t-mailbox"> Create </a>
                                    </li>
                                    @endif
                                    <li class="nav-item">
                                        <a href="{{route('back.product.category')}}" class="nav-link {{Route::is('back.product.category') ? 'active' : ''}}" data-key="t-mailbox"> Category </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        @endif
                        @if(auth()->user()->permission('customer','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['customer']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.customer.index') || Route::is('back.customer.edit')) ? 'active' : ''}}" href="{{route('back.customer.index')}}">
                                <i class="ri-reserved-line"></i> <span data-key="t-widgets">Valuable Clients</span>
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->permission('faq','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['faq']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.faq.index') || Route::is('back.faq.create') || Route::is('back.faq.edit')) ? 'active' : 'collapsed'}}" href="#sidebarFaq" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.faq.index') || Route::is('back.faq.create') || Route::is('back.faq.edit')) ? 'true' : 'false'}}" aria-controls="sidebarFaq">
                                <i class="ri-question-line"></i> <span data-key="t-apps">FAQ</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.faq.index') || Route::is('back.faq.create') || Route::is('back.faq.edit')) ? 'show' : ''}}" id="sidebarFaq">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('faq','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['faq']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.faq.index')}}" class="nav-link {{Route::is('back.faq.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('faq','add'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['faq']['add']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.faq.create')}}" class="nav-link {{Route::is('back.faq.create') ? 'active' : ''}}" data-key="t-mailbox"> Add New </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('testimonial','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['testimonial']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.testimonial.index') || Route::is('back.testimonial.create') || Route::is('back.testimonial.edit')) ? 'active' : 'collapsed'}}" href="#sidebarTestimonial" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.testimonial.index') || Route::is('back.testimonial.create') || Route::is('back.testimonial.edit')) ? 'true' : 'false'}}" aria-controls="sidebarTestimonial">
                                <i class="ri-chat-quote-line"></i> <span data-key="t-apps">Testimonials</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.testimonial.index') || Route::is('back.testimonial.create') || Route::is('back.testimonial.edit')) ? 'show' : ''}}" id="sidebarTestimonial">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('testimonial','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['testimonial']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.testimonial.index')}}" class="nav-link {{Route::is('back.testimonial.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('testimonial','add'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['testimonial']['add']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.testimonial.create')}}" class="nav-link {{Route::is('back.testimonial.create') ? 'active' : ''}}" data-key="t-mailbox"> Add New </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('service','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['service']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.service.index') || Route::is('back.service.create') || Route::is('back.service.edit')) ? 'active' : 'collapsed'}}" href="#sidebarService" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.service.index') || Route::is('back.service.create') || Route::is('back.service.edit')) ? 'true' : 'false'}}" aria-controls="sidebarService">
                                <i class="ri-service-line"></i> <span data-key="t-apps">Services</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.service.index') || Route::is('back.service.create') || Route::is('back.service.edit')) ? 'show' : ''}}" id="sidebarService">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('service','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['service']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.service.index')}}" class="nav-link {{Route::is('back.service.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('service','add'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['service']['add']) --}}
                                    <li class="nav-item">
                                        <a href="{{route('back.service.create')}}" class="nav-link {{Route::is('back.service.create') ? 'active' : ''}}" data-key="t-mailbox"> Add New </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('team','list'))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.team.index') || Route::is('back.team.create') || Route::is('back.team.edit')) ? 'active' : 'collapsed'}}" href="#sidebarTeams" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.team.index') || Route::is('back.team.create') || Route::is('back.team.edit')) ? 'true' : 'false'}}" aria-controls="sidebarTeams">
                                <i class="ri-honour-line"></i> <span data-key="t-apps">Teams</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.team.index') || Route::is('back.team.create') || Route::is('back.team.edit')) ? 'show' : ''}}" id="sidebarTeams">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('team','list'))
                                    <li class="nav-item">
                                        <a href="{{route('back.team.index')}}" class="nav-link {{Route::is('back.team.index') ? 'active' : ''}}" data-key="t-mailbox"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('team','add'))
                                    <li class="nav-item">
                                        <a href="{{route('back.team.create')}}" class="nav-link {{Route::is('back.team.create') ? 'active' : ''}}" data-key="t-mailbox"> Add New </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('galleries','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['galleries']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.galleries.index') || Route::is('back.galleries.create') || Route::is('back.galleries.edit') || Route::is('back.galleries.category')) ? 'active' : 'collapsed'}}" href="#sidebarMedia" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.galleries.index') || Route::is('back.galleries.create') || Route::is('back.galleries.edit') || Route::is('back.galleries.category')) ? 'true' : 'false'}}" aria-controls="sidebarMedia">
                                <i class="ri-gallery-line"></i> <span data-key="t-pages">Media</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.galleries.index') || Route::is('back.galleries.create') || Route::is('back.galleries.edit') || Route::is('back.galleries.category')) ? 'show' : ''}}" id="sidebarMedia">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('back.galleries.index')}}" class="nav-link {{Route::is('back.galleries.index') ? 'active' : ''}}" data-key="t-starter"> Media </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('back.galleries.category')}}" class="nav-link {{Route::is('back.galleries.category') ? 'active' : ''}}" data-key="t-starter"> Category </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('pages','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['pages']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.pages.index') || Route::is('back.pages.create') || Route::is('back.pages.edit')) ? 'active' : 'collapsed'}}" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.pages.index') || Route::is('back.pages.create') || Route::is('back.pages.edit')) ? 'true' : 'false'}}" aria-controls="sidebarPages">
                                <i class="ri-book-open-line"></i> <span data-key="t-pages">Pages</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.pages.index') || Route::is('back.pages.create') || Route::is('back.pages.edit')) ? 'show' : ''}}" id="sidebarPages">
                                <ul class="nav nav-sm flex-column">
                                    @if(auth()->user()->permission('pages','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['pages']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('back.pages.index') }}" class="nav-link {{Route::is('back.pages.index') ? 'active' : ''}}" data-key="t-starter"> All </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('pages','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['pages']['add']) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('back.pages.create') }}" class="nav-link {{Route::is('back.pages.create') ? 'active' : ''}}" data-key="t-starter"> Create </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('menus','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['menus']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{Route::is('back.menus.index') ? 'active' : ''}}" href="{{route('back.menus.index')}}">
                                <i class="ri-menu-add-line"></i> <span data-key="t-widgets">Menus</span>
                            </a>
                        </li>
                        @endif
                        @if(auth()->user()->permission('settings','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['settings']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.frontend.general') || Route::is('back.sliders.index') || Route::is('back.media.settings') || Route::is('back.frontend.section') || Route::is('back.footer-widgets.index') || Route::is('back.footer-widgets.edit')) ? 'active' : 'collapsed'}}" href="#sidebarUI" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.frontend.general') || Route::is('back.sliders.index') || Route::is('back.media.settings') || Route::is('back.frontend.section') || Route::is('back.footer-widgets.index') || Route::is('back.footer-widgets.edit')) ? 'true' : 'false'}}" aria-controls="sidebarUI">
                                <i class="ri-settings-5-line"></i> <span data-key="t-base-ui">Settings</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu {{(Route::is('back.frontend.general') || Route::is('back.sliders.index') || Route::is('back.media.settings') || Route::is('back.frontend.section')|| Route::is('back.footer-widgets.index') || Route::is('back.footer-widgets.edit')) ? 'show' : ''}}" id="sidebarUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{route('back.frontend.general')}}" class="nav-link {{Route::is('back.frontend.general') ? 'active' : ''}}" data-key="t-alerts">General Settings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('back.sliders.index')}}" class="nav-link {{Route::is('back.sliders.index') ? 'active' : ''}}" data-key="t-colors">Slider</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('back.media.settings')}}" class="nav-link {{Route::is('back.media.settings') ? 'active' : ''}}" data-key="t-cards">Media</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('back.frontend.section')}}" class="nav-link {{Route::is('back.frontend.section') ? 'active' : ''}}" data-key="t-carousel">Section</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('back.footer-widgets.index')}}" class="nav-link {{(Route::is('back.footer-widgets.index') || Route::is('back.footer-widgets.edit')) ? 'active' : ''}}" data-key="t-carousel">Footer Widgets</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif

                        @if(auth()->user()->permission('request-contact','list'))
                        {{-- @isset(auth()->user()->role->permission['permission']['request-contact']['list']) --}}
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.request-contact.index') || Route::is('back.request-contact.edit')) ? 'active' : ''}}" href="{{route('back.request-contact.index')}}">
                                <i class="ri-contacts-book-line"></i> <span data-key="t-widgets">Contact Form Request</span>
                            </a>
                        </li>
                        @endif

                        {{-- @isset(auth()->user()->role->permission['permission']['admins']['list']) --}}
                        @if(auth()->user()->permission('admins','list'))
                        <li class="nav-item">
                            <a class="nav-link menu-link {{(Route::is('back.admins.index') || Route::is('back.admins.edit') || Route::is('back.admins.create') || Route::is('back.role.index') || Route::is('back.role.create') || Route::is('back.role.edit') || Route::is('back.permission.index') || Route::is('back.permission.create') || Route::is('back.permission.edit')) ? 'active' : 'collapsed'}}" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                                aria-expanded="{{(Route::is('back.admins.index') || Route::is('back.admins.edit') || Route::is('back.admins.create') || Route::is('back.role.index') || Route::is('back.role.create') || Route::is('back.role.edit') || Route::is('back.permission.index') || Route::is('back.permission.create') || Route::is('back.permission.edit')) ? 'true' : 'false'}}" aria-controls="sidebarUsers">
                                <i class="ri-account-box-line"></i> <span data-key="t-pages">Admin</span>
                            </a>
                            <div class="collapse menu-dropdown {{(Route::is('back.admins.index') || Route::is('back.admins.edit') || Route::is('back.admins.create') || Route::is('back.role.index') || Route::is('back.role.create') || Route::is('back.role.edit') || Route::is('back.permission.index') || Route::is('back.permission.create') || Route::is('back.permission.edit')) ? 'show' : ''}}" id="sidebarUsers">
                                <ul class="nav nav-sm flex-column">
                                    {{-- @isset(auth()->user()->role->permission['permission']['admins']['list']) --}}
                                    @if(auth()->user()->permission('admins','list'))
                                    <li class="nav-item">
                                        <a href="{{ route('back.admins.index') }}" class="nav-link {{(Route::is('back.admins.index') || Route::is('back.admins.edit') || Route::is('back.admins.create')) ? 'active' : ''}}" data-key="t-starter"> Users </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('role','list'))
                                    <li class="nav-item">
                                        <a href="{{ route('back.role.index') }}" class="nav-link {{(Route::is('back.role.index') || Route::is('back.role.edit') || Route::is('back.role.create')) ? 'active' : ''}}" data-key="t-starter"> Role </a>
                                    </li>
                                    @endif
                                    @if(auth()->user()->permission('permissions','list'))
                                    {{-- @isset(auth()->user()->role->permission['permission']['permissions']['list']) --}}
                                    <li class="nav-item">
                                        <a href="{{ route('back.permission.index') }}" class="nav-link {{(Route::is('back.permission.index') || Route::is('back.permission.edit') || Route::is('back.permission.create')) ? 'active' : ''}}" data-key="t-starter"> Permission </a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            @if(isset($errors))
                @include('extra.error-validation')
            @endif
            @if(session('success'))
                @include('extra.success')
            @endif
            @if(session('error'))
                @include('extra.error')
            @endif

            @yield('master')


            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            © <script  type="application/javascript">document.write(new Date().getFullYear())</script> {{$settings_g['title'] ?? ''}}.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-sm-block">
                                website by  <a href="https://jamunasoft.com/" target="_blank" rel="noopener noreferrer">JamunaSoft</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('back/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('back/assets/js/plugins.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('back/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Vector map-->
    <script src="{{ asset('back/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('back/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

    <!--Swiper slider js-->
    <script src="{{ asset('back/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('back/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

     <!--data table-->
     <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>


     <!-- Select2 -->
     <script src="{{ asset('plugins/select2@4.1.0-rc.0/js/select2.full.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('back/assets/js/app.js') }}"></script>

    <!-- Sweetalert2 -->
    <script src="{{ asset('plugins/sweetalert2@9.3.0/sweetalert2.all.min.js') }}"></script>

    <script src="{{asset('back/js/main.js')}}"></script>

        @if(session('success-alert'))
            <script>
                cAlert('success', "{{session('success-alert')}}");
            </script>
        @endif

        @if(session('error-alert'))
            <script>
                cAlert('error', "{{session('error-alert')}}");
            </script>
        @endif

        @if(session('error-alert2'))
            <script>
                Swal.fire(
                    'Failed!',
                    '{{session("error-alert2")}}',
                    'error'
                )
            </script>
        @endif

        @if(session('success-alert2'))
            <script>
                Swal.fire(
                    'Success!',
                    '{{session("success-alert2")}}',
                    'success'
                )
            </script>
        @endif

        @if(session('error-transaction'))
            <script>
                Swal.fire(
                    'Transaction Failed!',
                    '{{session("error-transaction")}}',
                    'error'
                );


            </script>
        @endif

        @yield('footer')

</body>

</html>
