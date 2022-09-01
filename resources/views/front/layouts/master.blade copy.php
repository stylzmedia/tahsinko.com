<!doctype html>

<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $main_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu')->active()->first();
    $main_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Main Menu')->active()->first();

    $footer_menu = App\Models\Menu::with('SingleMenuItems')->where('name', 'Footer')->active()->first();
    $widgets = App\Models\Widget::with('Menu', 'Menu.SingleMenuItems')->where('status', 1)->where('placement', 'Footer')->orderBy('position')->get();
    $socials = \App\Models\Settings::where(['group'=>'social'])->get();
    $general = \App\Models\Settings::where(['group'=>'general'])->get();

@endphp
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{$settings_g['favicon'] ?? ''}}">

    <title> {{ config('app.name') }} | {{$settings_g['slogan'] ?? ''}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/solid.min.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
     {{-- <script src="./js/slider.js"></script> --}}
     {{-- <link rel="stylesheet" href="{{ asset('/front/css/style.css') }}"> --}}
     <link rel="stylesheet" href="{{ asset('/front/css/main.css') }}">
     <link rel="stylesheet" href="{{ asset('/front/css/responsive.css') }}">
     <style>
         .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background: #1A1A1A2B;
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-animation: stickySlideDown 0.65s cubic-bezier(.23,1,.32,1) both;
            -moz-animation: stickySlideDown 0.65s cubic-bezier(.23,1,.32,1) both;
            animation: stickySlideDown 0.65s cubic-bezier(.23,1,.32,1) both;
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            padding: 0px 30px 0px 30px;
        }
     </style>

    @yield('head')
</head>

<body>
    <div class="container-mains skew-aminamtion" style="background: black;">
        <!--Main Navigation-->
        <div class="header">
           {{-- top navbar start --}}
           <div class="top-navbar">
               <div class="container">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="top-bar-left">
                               <div class="social">
                                   <ul>
                                        @if(Info::Social($socials, 'facebook'))
                                            <li>
                                                <a href="{{Info::Social($socials,  'facebook')}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if(Info::Social($socials, 'linkedin'))
                                            <li>
                                                <a href="{{Info::Social($socials,  'linkedin')}}"><i class="fa fa-linkedin" target="_blank"></i></a>
                                            </li>
                                        @endif
                                        @if(Info::Social($socials,  'twitter'))
                                            <li>
                                                <a href="{{Info::Social($socials,  'twitter')}}"><i class="fa fa-twitter" target="_blank"></i></a>
                                            </li>
                                        @endif
                                        @if(Info::Social($socials, 'instagram'))
                                            <li>
                                                <a href="{{Info::Social($socials,  'instagram')}}"><i class="fa fa-instagram" target="_blank"></i></a>
                                            </li>
                                        @endif
                                        @if(Info::Social($socials, 'youtube'))
                                            <li>
                                                <a href="{{Info::Social($socials,  'youtube')}}"><i class="fa fa-youtube" target="_blank"></i></a>
                                            </li>
                                        @endif
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-8">
                           <div class="top-bar-right">
                               <div class="top-bar-email">
                                   <i class="fa fa-envelope"></i>
                                   {{$settings_g['email'] ?? ''}}
                               </div>

                               @php
                               $phones=explode(',', $settings_g['mobile_number']);
                               $tels=explode(',', $settings_g['tel']);
                               @endphp

                               <div class="top-bar-phone">
                                   <i class="fa fa-phone"></i>
                                    @if (count($phones) > 0)
                                        @foreach ( $phones as $key => $phone)
                                            @if ( count($phones) == 1)
                                            <a class="text-white" href="tel:+{{$phone ?? ''}}">{{$phone ?? ''}}</a>
                                                @elseif (count($phones) == 1+$key)
                                                <a class="text-white" href="tel:+{{$phone ?? ''}}">{{$phone ?? ''}}</a>
                                                @else
                                            <a class="text-white" href="tel:+{{$phone ?? ''}}">{{$phone ?? ''}},</a>
                                            @endif
                                        @endforeach
                                    @endif
                               </div>
                               <div class="top-bar-phone">
                                    &nbsp;&nbsp;<i class="fa fa-phone"></i>
                                    @if (count($tels) > 0)
                                        @foreach ( $tels as $key => $tel)
                                            @if ( count($tels) == 1)
                                            <a class="text-white" href="tel:+{{$tel ?? ''}}">{{$tel ?? ''}}</a>
                                                @elseif (count($tels) == 1+$key)
                                                <a class="text-white" href="tel:+{{$tel ?? ''}}">{{$tel ?? ''}}</a>
                                                @else
                                            <a class="text-white" href="tel:+{{$tel ?? ''}}">{{$tel ?? ''}},</a>
                                            @endif
                                        @endforeach
                                    @endif
                               </div>
                            </div>
                       </div>
                   </div>
               </div>
           </div>
           {{-- top navbar end --}}

           {{-- bottom navbar --}}
            <div class="top-menubar" id="top-menubar">
                <div class="container">
                    <nav class="navbar">
                        <div class="logo">
                            <a href="{{route('homepage')}}">
                                <img src="{{$settings_g['logo'] ?? ''}}" alt="{{$settings_g['title'] ?? ''}}">
                            </a>
                        </div>
                        @if($main_menu)
                            <div class="push-left">
                            <button id="menu-toggler" data-class="menu-active" class="hamburger">
                                <span class="hamburger-line hamburger-line-top"></span>
                                <span class="hamburger-line hamburger-line-middle"></span>
                                <span class="hamburger-line hamburger-line-bottom"></span>
                            </button>

                                <!--  Menu compatible with wp_nav_menu  -->
                                <ul id="primary-menu" class="menu nav-menu">
                                    <li class="menu-item current-menu-item">
                                        <a href="{{route('homepage')}}" class="nav__link {{ url('/') == url()->current() ? 'active' : ''}}">Home</a>
                                    </li>
                                    @foreach ($main_menu->SingleMenuItems as $item)

                                        <li class="menu-item @if(count($item->Items)) dropdown @endif">
                                            <a class="nav__link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}"  href="{{$item->menu_info['url']}}">{{ $item->menu_info['text'] }}</a>

                                            @if(count($item->Items))
                                                <ul class="sub-nav">
                                                    @foreach ($item->Items as $item)
                                                        <li>
                                                            <a class="sub-nav__link {{$item->menu_info['url'] == url()->current() ? 'active' : ''}}" href="{{$item->menu_info['url']}}">
                                                                {{ $item->menu_info['text'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        @else
                            <p class="text-danger text-right">Please create "Main Menu"</p>
                        @endif
                    </nav>
                </div>
            </div>
       </div>
       <!--Main Navigation-->

       @yield('master')

       {{-- call center --}}
    {{-- <section class="call-center-section fullscreen background parallax" >
        <div class="container">
            <div class="row contactdetails">
                <div class="col-lg-3 col-xs-12 leftside wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <h2>Call us everyday </h2>
                    <h5>From 8 a.m to 4 p.m </h5>
                </div>
                <div class="col-lg-6 col-xs-12 second-side wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <h1>(+0641)-281-58317</h1>
                </div>
                <div class="col-lg-3 col-xs-12 third-side wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                    <h6>Or click here to </h6>
                    <a href="#" class="btn btn-primary btn-block btn-lg">Send us a Message</a>
                </div>
            </div>
        </div>
    </section> --}}
    {{-- end call center --}}

    {{-- get quota --}}
    {{-- <div class="quota-section">
        <div class="container">
            <div class="quota-title">Do You Have A Elavator Project We Can Help With?</div>
        </div>
        <button class="contact100-btn-show">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
        </button>
        <div class="quota-button">
            <a href="#" class="btn btn-primary contact100-btn-show btn-block btn-lg" data-toggle="modal" data-target="#myModal">Get a free quote</a>
        </div>
    </div> --}}
    {{-- <!-- The Modal --> --}}
    {{-- <div class="modal" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">



            <!-- Modal body -->
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <form class="contact100-form validate-form">
                    <div class="contact100-form-title" style="text-align: center;/* justify-content: center; */display: flex;flex-direction: column;align-items: center;">
                        Talk To Us – We’re Here To Help
                        <div style="width: 45%;height: 1px;background: #ff4b5a;margin-top: 9px;"></div>
                    </div>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">FIRST NAME *</span>
                        <input class="input100" type="text" name="name" placeholder="Enter your first name">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                        <span class="label-input100">LAST NAME </span>
                        <input class="input100" type="text" name="name" placeholder="Enter your last name">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <span class="label-input100">EMAIL ADDRESS *</span>
                        <input class="input100" type="text" name="email" placeholder="Enter your email addess">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <span class="label-input100">PHONE NUMBER</span>
                        <input class="input100" type="text" name="phone" placeholder="Enter your phone number">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Message is required">
                        <span class="label-input100">HOW CAN WE HELP? *</span>
                        <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
                            <span>
                                Submit
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>
                    </div>
                </form>
                <span class="contact100-more">
                    For any question contact our 24/7 call center: <span class="contact100-more-highlight">+00123 456 789</span>
                </span>
            </div>



        </div>
        </div>
    </div> --}}
    {{-- end modal --}}
    {{-- end get quota --}}

       {{-- footer --}}
       <section class="ct_newsletter_wrap">
           <div class="container">
               <div class="newletter_des">
                   <h3>Subscribe Newsletter</h3>
                   <form action="#">
                       <label class="fa fa-envelope-o"></label>
                       <input type="text" placeholder="Enter Your Email" class="form-control">
                       <button>Subscribe</button>
                   </form>
               </div>
           </div>
       </section>
       <footer class="footer-wrap2">
           <div class="container">
               <div class="row">
                   <div class="col-md-4">
                        <div class="footer_logo">
                            <img src="{{$settings_g['og_image'] ?? ''}}" alt="{{$settings_g['title'] ?? ''}}">
                            @php echo $settings_g['footer_description'] ?? ''; @endphp
                        </div>
                   </div>
                   <div class="col-md-8 row">

                    @foreach ($widgets as $widget)
                        <div class="col-lg-4">
                            <h4>{{$widget->title}}</h4>
                            @if($widget->type == 'Menu' && $widget->Menu)
                                <div class="footer_links">
                                    <ul>
                                        @foreach ($widget->Menu->SingleMenuItems as $item)
                                            <li><a href="{{$item->menu_info['url']}}">{{$item->menu_info['text']}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                {!! $widget->text !!}
                            @endif
                        </div>
                   @endforeach

                   </div>
               </div>
           </div>
       </footer>
       <div class="copyright2">
           <div class="container">
               <div class="copyright-res d-flex justify-content-between">
                   <div class="p-2 copyright mt-0">
                       <p class="mb-0">&copy; {{date('Y')}} All Right Reserved {{$settings_g['title'] ?? ''}}</p>
                   </div>
                   <div class="p-2 copyright mt-0">
                       <p class="mb-0">website by <a class="text-decoration-none" href="https://www.stylzmedia.com">stylzMedia Limited</a></p>
                   </div>
               </div>

           </div>
       </div>

   </div>
    <!-- End Fixed Mobile Menu -->
    {{-- <script src="{{asset('front/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> --}}
    <script>
        //counter
        $(document).ready(function() {

        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
                }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        });
        //end counter
        $('#header-slider').carousel({
            interval: 5000
        });
        $('#short-story-slider').carousel({
            interval: 500
        });
        // $('#cascade-slider').cascadeSlider({
        // });

    // scroll animation
            var scroll = window.requestAnimationFrame ||
                    // IE Fallback
                    function(callback){ window.setTimeout(callback, 1000/60)};
            var elementsToShow = document.querySelectorAll('.show-on-scroll');

            function loop() {

                Array.prototype.forEach.call(elementsToShow, function(element){
                if (isElementInViewport(element)) {
                    element.classList.add('is-visible');
                } else {
                    element.classList.remove('is-visible');
                }
                });

                scroll(loop);
            }

        // Call the loop for the first time
        loop();

        // Helper function from: http://stackoverflow.com/a/7557433/274826
        function isElementInViewport(el) {
        // special bonus for those using jQuery
        if (typeof jQuery === "function" && el instanceof jQuery) {
            el = el[0];
        }
        var rect = el.getBoundingClientRect();
        return (
            (rect.top <= 0
            && rect.bottom >= 0)
            ||
            (rect.bottom >= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.top <= (window.innerHeight || document.documentElement.clientHeight))
            ||
            (rect.top >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight))
        );
        }

//skew animation
// const section = document.querySelector('.skew-aminamtion');

// let currentPos = window.pageYOffset;

// const update = () => {
//   const newPos = window.pageYOffset;
//   const diff = newPos - currentPos;
//   const speed = diff * 0.5;

//   section.style.transform = `skewX(${ speed }deg)`;

//   currentPos = newPos;

//   requestAnimationFrame(update);
// }

        // update();
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
        });


        $(document).ready(function() {
  // Toggle menu on click
  $("#menu-toggler").click(function() {
    toggleBodyClass("menu-active");
  });

  function toggleBodyClass(className) {
    document.body.classList.toggle(className);
  }

 });
    </script>
    <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("top-menubar");
        var sticky = navbar.offsetTop;

        function myFunction() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
        </script>

        <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        </script>

    @yield('footer')
</body>

</html>
