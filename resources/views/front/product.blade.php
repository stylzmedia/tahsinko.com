@extends('front.layouts.master')
@php
    $products = \App\Models\Product::where(['status'=>1])->orderBy('position','ASC')->paginate(8);
    // dd($products);
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
        .feature-product .title-bar {
            padding: 0.5rem 0.5rem;
            color: red;
            font-weight: 600;
            font-size: 20px;
        }
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
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            @foreach($products as $product)
                                <div class="col-lg-6 col-sm-6 mb-4">
                                    <div class="cart-box shadow rounded p-4">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="title-bar text-uppercase">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="product-description">
                                                    <table class="table table-borderless">
                                                        <tbody>
                                                          <tr>
                                                            <td>Celling</td>
                                                            <td>:</td>
                                                            <td>{{ $product->ceiling }}</td>
                                                          </tr>
                                                          <tr>
                                                            <tr>
                                                            <td>Cabin Wall</td>
                                                            <td>:</td>
                                                            <td>{{ $product->cabin_wall }}</td>
                                                          </tr>
                                                          <tr>
                                                            <td>Handrail</td>
                                                            <td>:</td>
                                                            <td>{{ $product->handrail }}</td>
                                                          </tr>
                                                          <tr>
                                                            <td>Floor</td>
                                                            <td>:</td>
                                                            <td>{{ $product->floor }}</td>
                                                          </tr>
                                                          <tr>
                                                            <td>Category</td>
                                                            <td>:</td>
                                                            <td>{{ $product->tag }}</td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                </div>
                                                {{-- <a class="text-center" href=" {{ route('product.single', $product->name) }}">
                                                    <div class="feature-detail">
                                                        <div class="detail-btn">Details</div> <i class="fa fa-link" ></i>
                                                    </div>
                                                </a> --}}
                                            </div>
                                            <div class="col-5">
                                                <div class="cart-image ">
                                                    <img src="{{$product->img_paths['original']}}" class="img-fluid"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center text-center">
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
