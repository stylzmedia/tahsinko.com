@extends('front.layouts.master')
@php
$similar_products = App\Models\Product::where(['status'=>1])->orderBy('position','ASC') ->where('id', '!=', $product->id)->inRandomOrder()->limit(4)->get();
@endphp


@section('head')

    @include('meta::manager', [
        'title' => $product->name.'- ' . ($settings_g['slogan'] ?? '')
    ])

<style>
    #product {
    margin-top: 130px;
}
</style>

@endsection

@section('master')

    <section id="product" >
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <div class="single-product">
                        <img src="{{ $product->img_paths['original'] }}"
                        srcset="{{ $product->img_paths['small'] }} 400w,
                                {{ $product->img_paths['medium'] }} 800w,
                                {{ $product->img_paths['original'] }} 1200w"
                        sizes="(max-width: 600px) 400px,
                                (max-width: 900px) 800px,
                                1200px"
                        alt="{{ $product->name }}" >
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="product-desc">
                        <h1>{{ $product->name }}</h1>
                        <p>Product Description</p>
                        <p>Product Description</p>
                    </div>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <section id="similar-products" >
        <div class="container  my-4">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Similar Products</h2>
                </div>
            </div><!-- end row -->
            <div class="row">
                @foreach ($similar_products as $product)
                <div class="col-md-3 col-sm-6">
                    <div class="card">
                        <img src="{{ $product->img_paths['small'] }}"

                        alt="{{ $product->name }}" class="card-img-top">

                        {{-- <img src="https://via.placeholder.com/500x500" alt="" class="card-img-top"> --}}
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">product->description</p>
                            <a href="{{ route('product.single', $product->name) }}" class="btn btn-primary">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
