@extends('front.layouts.master')
@php
    $socials = \App\Models\Settings::where(['group'=>'social'])->get();
    // $page = \App\Models\Page::where('title', 'Contact Us')->first();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
        'description' => $page->meta_description,
        'keywords' => $page->meta_tags,
        'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])
    <style>
        #background-video {
        width: 100%;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        margin: auto;
        min-height: 50%;
        min-width: 50%;
        position: absolute;
        }

        .video-inner {
        position: relative;
        height: 500px;
        overflow: hidden;
        }
    </style>

@endsection

@section('master')
  <!-- Breadcrumb Start -->
    <div class="inner-banner-video">
            <div class="video-inner">
                <video id="background-video" autoplay loop muted poster="{{ asset('front/video/ElevatorsGoingUpAndDown.png') }}">
                    <source src="{{ asset('front/video/ElevatorsGoingUpAndDown.mp4') }}" type="video/mp4">
                </video>
            </div>
        <div class="container">
            <div class="inner-title text-center">
                <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
                <ul>
                    <li>
                        <i class="flaticon-fireplace"></i>
                    </li>
                    <li>
                        <a href="{{ route('homepage') }}">Home /</a>
                    </li>
                    <li>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section -->
    <div class="contact-section pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6 pr-0">
                    <div class="contact-section-img">
                        <img src="{{ asset('front/images/section/sec1-group-photo-2.png') }}" alt="Images">
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 pl-0">
                    <div class="contact-section-content">
                        <h3>Contact Info</h3>
                        <ul class="contact-section-list">
                            <li>
                                <span> Address:</span> {{$settings_g['street'] ?? ''}}, {{$settings_g['city'] ?? ''}}-{{$settings_g['zip'] ?? ''}}
                                {{$settings_g['state'] ?? ''}}, {{$settings_g['country'] ?? ''}}
                            </li>
                            <li>
                                <span>Message:</span> <a href="mailto:{{$settings_g['email'] ?? ''}}">{{$settings_g['email'] ?? ''}}</a>
                            </li>
                            <li>
                                <span>Phone:</span> <a href="tel:+88{{$settings_g['tel'] ?? ''}}"> {{$settings_g['tel'] ?? ''}}</a>
                            </li>
                            <li>
                                <span>Mobile:</span> <a href="tel:+88{{$settings_g['mobile_number'] ?? ''}}"> {{$settings_g['mobile_number'] ?? ''}}</a>
                            </li>
                            <li>
                                <span>Open:</span>  Sat - Thu / 9:00 AM - 6:00 PM
                            </li>
                        </ul>

                        <ul class="social-link">
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
    <!-- Contact Section End -->

    <!-- Contact Area Two -->
    <div class="contact-area-two">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-two-form pt-100 pb-70">
                        <div class="contact-wrap-form">
                            <h2>Contact Us</h2>
                            <form action="{{route('contact.us.store')}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-user'></i>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Your Name*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-envelope'></i>
                                            <input type="email" name="email" id="email_address" required data-error="Please enter email address" class="form-control" placeholder="Email Address*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-phone'></i>
                                            <input type="text" name="phone" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Your Phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <i class='bx bx-git-compare'></i>
                                            <input type="text" name="subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Your Subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <i class='bx bx-envelope'></i>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="Your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            Send Your Message
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-map">
                        {!! $settings_g['gmap'] ?? ''!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area Two End -->
@endsection
