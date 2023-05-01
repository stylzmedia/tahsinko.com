@extends('front.layouts.master')
@php
    $page_title="Products";
    $products = \App\Models\Product::where(['status'=>1])->orderBy('position','ASC')->get();
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'Products - ' . ($settings_g['slogan'] ?? '')
    ])
    <style>
        .header {
            position: relative;
        }
    </style>
@endsection

@section('master')
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
    <div class="inner-banner">
        <div class="inner-image" style="{{$bg_bread}}">
            <img src="{{ $page->media_id ? $page->img_paths['original'] : null }}" alt="">
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
                    <li>Page/</li>
                    <li>{{$page->title}}</li>
                </ul>
            </div>
        </div>
    </div>

    {{-- all-products --}}
    <section class="all-product">
        <div class="feature-product scroll-animation-section show-on-scroll">
            <div class="container">
                <div class="heading-title text-white">
                    <label>{{ $page_title }}</label>
                </div>
                <div class="row justify-content-center">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <div class="cart-box">
                                <div class="cart-image">
                                    <img src="{{$product->img_paths['original']}}"/>
                                    <a class="text-center" href="#">
                                        {{-- <a class="text-center" href="{{ route('product.single', $product->name) }}"> --}}
                                        <div class="feature-detail">
                                            <div class="detail-btn">Details</div> <i class="fa fa-link" ></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="title-bar text-uppercase">
                                    {{ $product->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection
