<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tranparent Menu with silde</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
     {{-- <script src="./js/slider.js"></script> --}}
     <link rel="stylesheet" href="./front/css/main.css">
     <link rel="stylesheet" href="./front/css/main2.css">
    <style>

  .overlap-grid {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  position: relative;
}
@media (min-width: 768px) {
  .overlap-grid-2 .item:nth-child(1) {
    width: 70%;
    margin-top: 0;
    margin-left: 30%;
    z-index: 3;
  }
  .overlap-grid-2 .item:nth-child(2) {
    width: 55%;
    margin-top: -45%;
    margin-left: 0;
    z-index: 4;
  }
  .overlap-grid-2 .item:nth-child(3) {
    width: 60%;
    margin-top: -35%;
    margin-left: 40%;
    z-index: 2;
  }
}
@media (max-width: 767px) {
  .overlap-grid-2 .item {
    width: 100%;
  }
  .overlap-grid-2 .item+.item {
    margin-top: 1.5rem;
  }
}

.item,
.swiper-slide {
  figure {
    position: relative;
  }
  figure .item-link,
  figure .item-like,
  figure .item-view {
    opacity: 0;
    position: absolute;
    right: 0;
    bottom: 1rem;
    width: 2.2rem;
    height: 2.2rem;
    line-height: 2.2rem;
    z-index: 1;
    transition: all .3s ease-in-out;
    opacity: 0;
    color: $main-dark;
    background: rgba($white, 0.7);
    box-shadow: $box-shadow-sm;
    border-radius: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    backface-visibility: hidden;
    &:hover {
      background: rgba($white, 0.9);
    }
  }
  &:hover figure .item-link,
  &:hover figure .item-like,
  &:hover figure .item-view {
    opacity: 1;
    right: 1rem;
  }
  figure .item-like,
  figure .item-view {
    background: $white;
  }
  figure .item-like {
    bottom: auto;
    top: 1rem;
  }
  figure .item-view {
    bottom: auto;
    top: 3.7rem;
  }
  figure .item-cart {
    opacity: 0;
    position: absolute;
    bottom: -2.0rem;
    padding: 0.8rem;
    margin: 0;
    left: 0;
    width: 100%;
    height: auto;
    color: $white;
    background: rgba($dark, 0.8);
    backface-visibility: hidden;
    text-align: center;
    transition: all .3s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: $headings-font-weight;
    i {
      font-weight: normal;
      margin-right: 0.25rem;
      margin-top: -0.05rem;
    }
    &:hover {
      background: rgba($dark, 0.9);
    }
  }
  &:hover figure .item-cart {
    opacity: 1;
    bottom: 0;
  }
}
    </style>
</head>
<body>
    <div class="container-mains skew-aminamtion" style="background: #222;">
      <!-- Breadcrumb -->
    @php
    if(empty($page->breadcrumb_background)){
        $back_value="#2c3232b0";
    }else{
        $back_value=$page->breadcrumb_background;
    }
    if($page->is_color == 2){
        $bg_bread="background:rgba(0, 0, 0, 0) url('../$back_value') no-repeat scroll center center / cover;";
    }else{
        $bg_bread="background:".$back_value;
    }

@endphp
<section id="page-header" class="section background" style="{{$bg_bread}}">
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
        </div>
    </div><!-- end row -->
</div><!-- end container -->
</section>
        <section class="InnerPage_section">
            <div class="mission-vision">
                <div class="container">

                    <section class="wrapper">
                        <div class="container py-14 py-md-16">
                          <div class="row gx-lg-8 gx-xl-12 gy-10 text-white align-items-center">
                            <div class="col-lg-6 position-relative order-lg-2">
                              <div class="shape bg-dot primary rellax w-16 h-20" data-rellax-speed="1" style="top: 3rem; left: 5.5rem"></div>
                              <div class="overlap-grid overlap-grid-2">
                                <div class="item">
                                  <figure class="rounded shadow"><img src="./front/images/about2.jpg" srcset="./assets/img/photos/about2@2x.jpg 2x" alt=""></figure>
                                </div>
                                <div class="item">
                                  <figure class="rounded shadow"><img src="./front/images/about1.jpg" srcset="./assets/img/photos/about3@2x.jpg 2x" alt=""></figure>
                                </div>
                              </div>
                            </div>
                            <!--/column -->
                            <div class="col-lg-6">
                              <div class="row gx-xl-10 gy-6">
                                <div class="col-md-12 mb-5">
                                  <div class="d-flex flex-row">
                                    <div style="margin-right: 5px;width:70px">
                                        <img style="width:100%" src="./front/images/mission.png" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
                                    </div>
                                    <div>
                                      <h4 class="mb-1">Our Mission</h4>
                                      <p class="mb-0">To maintain our core services as an independent and leading provider of Verticals Transportation Systems(VTS) namely Elevator , Escalator, Moving walks, Parking System and all sort of Construction hoits. </p>
                                    </div>
                                  </div>
                                </div>
                                <!--/column -->
                                <div class="col-md-12">
                                  <div class="d-flex flex-row">
                                    <div style="margin-right: 5px;width:70px">
                                      <img style="width:100%" src="./front/images/vision.png" class="svg-inject icon-svg icon-svg-sm me-4" alt="" />
                                    </div>
                                    <div>
                                      <h4 class="mb-1">Our Vision</h4>
                                      <p class="mb-0">To become the industry reference for what we do and to make our Company a happy and inspirational place to work and elevate living standard of our compatriots.</p>
                                    </div>
                                  </div>
                                </div>
                                <!--/column -->
                              </div>
                              <!--/.row -->
                            </div>
                            <!--/column -->
                          </div>
                          <!--/.row -->
                        </div>
                        <!-- /.container -->
                      </section>
                      <!-- /section -->

                </div>
            </div>
            {{-- our service --}}
        <section class="servicesNew scroll-animation-section show-on-scroll">
            <div class="servicesNewline scroll-animation-section show-on-scroll">
                <div class="container">
                    <div class="section-title">
                        {{-- <h5>Services</h5> --}}
                        <h3>Our Services</h3>
                    </div>
                    <div class="row services-list justify-content-center">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Planning</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor sit amet...</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-server" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Installation</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor sit amet...</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa fa-cog" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Maintenance</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor </p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-cogs" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Modernization</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor sit amet...</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-cubes" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Supply</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor </p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-hard-of-hearing" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Commissioning</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor </p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="services-item">
                                <div class="services-item-inner">
                                    <div class="line_box line_top"></div>
                                    <div class="line_box line_bottom"></div>
                                    <div class="line_box line_left"></div>
                                    <div class="line_box line_right"></div>
                                    <div class="services-content"> <i class="fa fa-object-ungroup" aria-hidden="true"></i>
                                        <div class="service-description">
                                            <h4><a href="services-detail.html">Spare Parts</a></h4>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et Rorem ipsum dolor sit amet...</p> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

        {{-- our value --}}
        <div class="our-value-section">
            {{-- <img src="https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-036.jpg"/> --}}
            <div class="our-value scroll-animation-section show-on-scroll">
                <div class="container">
                    <div class="heading-title" style="font-weight: bold;color: #fff;">
                        <label>Our Value</label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Quality</h5>
                                    <p>Zero tolarance to all our activities,service & products</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Reliability</h5>
                                    <p>We are a reliable partner in all aspects of out business being trustworthy </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Environment</h5>
                                    <p>Focus on environment and apply eco friendly products and activity</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Wxcellence</h5>
                                    <p>we strive to be the best-in-class and we are proud to put our name to what</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Safety</h5>
                                    <p>Safety is our hightest priority and may never be compromised.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Compliance</h5>
                                    <p>Engage utmost effort to comply industry , norms on the products, service and </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="our-value-box">
                                <div class="content-box">
                                    <h5>Innovation</h5>
                                    <p>We proactively explore new territory to benefit both our clients & our</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- end our value --}}
        </section>
        {{-- counter --}}
        <div class="counter-section scroll-animation-section show-on-scroll" >
            <img src="./front/images/elevator-buttons.webp" style="width: 100%;">
            <div  style="position: absolute; top: 0%; margin: 0 auto; width: 100%; height: 100%; background: #000000b8;">
                <div class="container">

                    <div class="row">

                    <div class="four col-md-3">
                        <div class="counter-box">
                            <i class="fa fa-thumbs-o-up"></i>
                            <span class="counter">2147</span>
                            <p>Customers</p>
                        </div>
                    </div>
                    <div class="four col-md-3">
                        <div class="counter-box">
                            <i class="fa fa-group"></i>
                            <span class="counter">3275</span>
                            <p>Client</p>
                        </div>
                    </div>
                    <div class="four col-md-3">
                        <div class="counter-box">
                            <i class="fa  fa-shopping-cart"></i>
                            <span class="counter">289</span>
                            <p>Complete project</p>
                        </div>
                    </div>
                    <div class="four col-md-3">
                        <div class="counter-box">
                            <i class="fa  fa-user"></i>
                            <span class="counter">1563</span>
                            <p>Support Given</p>
                        </div>
                    </div>
                  </div>
                </div>

            </div>

        </div>
        {{-- end counter --}}
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
                    <div class="col-lg-4">
                        <div class="footer_logo">
                            <img src="./front/images/logo.png" alt="">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit vivamus nibh dolor, gravida faucibus dolor consectetur, pulvinar rhoncus risus. Fusce vel rutrum mi..</p>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4> Usefull link</h4>
                                        <div class="footer_links">
                                            <ul>
                                                <li><a href="index.html">Home</a></li>
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="blog.html">Blog</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Features</h4>
                                        <div class="footer_links">
                                            <ul>
                                                <li><a href="gallery.html">Gallery</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="services-detail.html">Services Detail Us</a></li>
                                                <li><a href="team.html">Team</a></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h4>Follow Us</h4>
                                <p>Explore thousands of inspiring interior designs, from our best team here.</p>
                                <ul class="social-icons">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright2">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="p-2 copyright mt-0">
                        <p class="mb-0">Copyright 2022, All Right Reserved</p>
                    </div>
                    <div class="p-2 copyright mt-0">
                        <p class="mb-0">website by <a class="text-decoration-none" href="https://www.stylzmedia.com">stylzMedia Limited</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
