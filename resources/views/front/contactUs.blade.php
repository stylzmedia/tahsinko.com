@extends('front.layouts.master')
@php
    $socials = \App\Models\Settings::where(['group'=>'social'])->get();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'Contact Us'
    ])
    <style>
        .header {
            position: relative;
        }
        .contact_form_page input[type=email], .contact_form_page input[type=text], .contact_form_page input[type=url], .contact_form_page input[type=tel], .contact_form_page input[type=number], .contact_form_page textarea {
            display: block;
            width: 100%;
            background: 0 0;
            padding: 0;
            border: none;
            border-bottom: 1px solid #b9b9b9;
            border-radius: 0;
            font-size: 16px;
            line-height: 60px;
            margin: 0 0 20px;
            color: #fff;
        }
        textarea:focus, input:focus {
            border-color: #fff !important;
        }
    </style>
@endsection

@section('master')
    <div class="container-mains skew-aminamtion" style="background: #222;">
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
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="conFormWrapper">
                            <div class="row">
                                <div class="col-md-7">
                                    <h2>Get in touch!</h2>
                                    <div class="contact_form_page">
                                        <form action="{{route('contact.us.store')}}" method="POST" class="row" id="contact_form_page">
                                            @csrf
                                            @method('POST')
                                            <div class="col-md-6">
                                                <input class="required" type="text" name="name" id="con_name" placeholder="Name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input class="required" type="email" name="email" id="con_email" placeholder="E-mail" required>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="phone" id="con_phone" placeholder="Phone">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="subject" id="con_subject" placeholder="Subject">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea class="required" name="message" id="con_message" placeholder="Your Message here" required></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit" class="dgBtn">Submit Message</button>
                                                <div class="con_message"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-5">

                                    <div class="contactInfo">
                                        <img src="{{asset('/front/images/telephone.png')}}" alt="">
                                        <h4>Phone</h4>
                                        <p>
                                            Phone : {{$settings_g['mobile_number'] ?? ''}}<br>
                                            Telephone : {{$settings_g['tel'] ?? ''}}
                                        </p>
                                    </div>
                                     <div class="contactInfo">
                                        <img src="{{asset('/front/images/email.png')}}" alt="">
                                        <h4>Email</h4>
                                        <p>
                                            <a href="">{{$settings_g['email'] ?? ''}}</a>
                                        </p>
                                    </div>
                                    <div class="contactInfo">
                                        <img src="{{asset('/front/images/placeholder.png')}}" alt="">
                                        <h4>Address</h4>
                                        <p>
                                            {{$settings_g['street'] ?? ''}}, {{$settings_g['city'] ?? ''}}-{{$settings_g['zip'] ?? ''}}
                                            <br>
                                            {{$settings_g['state'] ?? ''}}, {{$settings_g['country'] ?? ''}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact" class="contactWrapp position-relative">
            <div class="contact-map">
                <div id="map">
                    {!! $settings_g['gmap'] ?? ''!!}
                </div>
            </div>
        </section>
@endsection
