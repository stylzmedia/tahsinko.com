@extends('front.layouts.master')
@php
    $products = \App\Models\Product::where(['status'=>1])->orderBy('position','ASC')->paginate(8);
@endphp
@section('head')
        @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

        ])
    <style>
        .header {
            position: relative;
        }
        /* .cart-image img {
            height: 425px;
        } */
    </style>
@endsection

@section('master')
<!-- Breadcrumb -->
@include('front.includes.breadcrumb')
<!-- Breadcrumb End-->

    {{-- all-products --}}
    <section class="all-product">
        <div class="feature-product scroll-animation-section show-on-scroll">
            <div class="container">
                <div class="heading-title text-white">
                    <label>{{ $page->title }}</label>
                </div>
                <div class="row justify-content-center">
                    @foreach($products as $product)
                        <div class="col-lg-6 col-sm-6 mb-4">
                            <div class="cart-box shadow rounded p-4">
                                <div class="cart-image ">
                                    <img src="{{$product->img_paths['original']}}" class="img-fluid"/>
                                    {{-- <a class="text-center" href=" {{ route('product.single', $product->name) }}">
                                        <div class="feature-detail">
                                            <div class="detail-btn">Details</div> <i class="fa fa-link" ></i>
                                        </div>
                                    </a> --}}
                                </div>
                                {{-- <div class="title-bar text-uppercase">
                                    {{ $product->name }}
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center text-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
