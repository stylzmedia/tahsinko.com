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
            <div style="/* text-align: center; *//* align-items: center; *//* justify-content: center; */padding: 10px;margin-bottom: 37px;">
                <div class="ceo-message-Title" style="margin:0 auto;text-align: center;color: #d39e00;padding: 0px;font-size: 39px;border: 1px solid;font-weight: bold;text-transform: uppercase;width: 28%;"> Message From our Ceo</div>
            </div>

            <div class="container text-white">
                <div style="float: left;width: 287px;padding: 17px;">
                    <img style="width:100%;" src="./front/images/ceo.png"/>
                </div>
                <div>
                    <p>Vertical Transportation Systems(VTS) are one of the ten major components in Construction Industry. Elevator,Escaltor, Moving walks and other lifting equipment are mostly dealt under VTS.</p>
                    <p>VTS equipment stand on two major factors that are, completely pre-engineered production process and quality installation and commissing at job site. These two characters toghther ensures the performance and longevity of the quipment besides safety and comgort
                        .</p>
                    <p>I am associated with this VTS Inducstry since 1988. Worked in serval reputed Companies and have undergone various types of training in home and abroad.</p>
                    <p>Amongst many the major area of trainings are EN 81 Standard, design factors, installation process and quality control in on site installation, maintenance types and process, installation management,maintenance management etc.</p>
                    <p>My journey starts with Property Lifts under PRAN-RFL Group from 1988 to 1997 where I learnt to establish a Lift Company from scrap and run the business.</p>
                    <p>Thereafter, I worked for Aziz &Company Ltd. , the then the largest and oldest Lift Company in Bangladesh from 1997 to 2004. There I got the Exposure of leading 300+ team members.</p>
                    <p>Later I joined Orbit Technologies Ltd. , concern of Pandughar Group as a shareholding director and run the Company from 2005 to 2021. Later I decided to establish my 100% own Company , thus MATRIX is born.</p>
                    <p>Matrix is designed to expand its wings to create a competitive platform to provide world class VTS equipment viz,elevators,escalator, moving walk and all sorts of lifting equipment ensuring quality, safety, reliability and riding comport.</p>
                    <p>Our aim is to bring Global Standard in Local Environment.</p>
                    <div style="font-size: 21px;font-weight: bold;color: #f8f9fa;">
                        Emdad ur Rahman<br/>
                        Cheif Executive Officer
                    </div>
                </div>

            </div>
        </section>
        <section class="ct_newsletter_wrap" style="background:#555555">
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
                        <p class="mb-0">Copyright 2020 - {{ date('Y') }} All Right Reserved</p>
                    </div>
                    {{-- <div class="p-2 copyright mt-0">
                        <p class="mb-0">website by <a class="text-decoration-none" href="https://www.stylzmedia.com">stylzMedia Limited</a></p>
                    </div> --}}
                </div>

            </div>
        </div>
    </div>
</body>
</html>
