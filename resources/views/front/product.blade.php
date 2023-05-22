@extends('front.layouts.master')
@php
    $categoryName = "{$page->title}"; // replace with the category name you want to filter by
    $products = \App\Models\Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($categoryName) {
            $query->where('title', $categoryName); })
        ->orderBy('position', 'ASC')
        ->paginate(8);
@endphp

@section('head')
    @include('meta::manager', [
        'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
        'description' => $page->meta_description,
        'keywords' => $page->meta_tags,
        'image' => $page->media_id ? $page->img_paths['original'] : null,
    ])

    <link rel="stylesheet" href="{{ asset('plugins/custom-lightbox/css/single-image-view.css') }}">
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
        .product-description {
            font-size: 14px;
        }
        /* lightbox */

        /* lightbox end */

        @media only screen and (min-width: 1800px) {
            .product-description {
                font-size: 20px;
            }
        }
        @media only screen and (min-width: 1440px) {
            .product-description {
                font-size: 13px;
            }
        }
        @media only screen and (max-width: 768px) {
            .product-description {
                font-size: 16px;
            }

        }
        @media only screen and (max-width: 426px) {
            .product-description {
                font-size: 16px;
            }
            .lightbox-overlay{
                display: none !important;
            }
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
                                <div class="col-lg-6 col-sm-12 mb-4">
                                    <div class="cart-box shadow rounded p-4">
                                        <div class="row">
                                            <div class="product-description2 col-lg-7 col-sm-7 col-12">
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
                                                                <td style="width: 35%">Cabin Wall</td>
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
                                            </div>
                                            <div class="col-lg-5 col-sm-5 col-12">
                                                <div class="cart-image">
                                                    <img src="{{$product->img_paths['original']}}" class="img-fluid lightbox-trigger" data-index="{{ $loop->index }}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="lightbox-overlay">
                            <button class="lightbox-prev" disabled></button>
                            <div class="lightbox-content">
                                <div class="lightbox-description"></div>
                                <img src="" class="lightbox-image" />
                            </div>
                            <button class="lightbox-next" disabled></button>
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

@section('footer')
<script>

</script>
<script>
    const lightboxTriggerElements = document.querySelectorAll('.lightbox-trigger');
    const lightboxOverlay = document.querySelector('.lightbox-overlay');
    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxDescription = document.querySelector('.lightbox-description');
    const prevButton = document.querySelector('.lightbox-prev');
    const nextButton = document.querySelector('.lightbox-next');
    let currentIndex = 0;
    let images = [];
    let descriptions = [];

    lightboxTriggerElements.forEach(function (lightboxTriggerElement, index) {
        lightboxTriggerElement.addEventListener('click', function (event) {
            event.preventDefault();
            currentIndex = index;
            images = Array.from(document.querySelectorAll('.lightbox-trigger')).map(element => element.getAttribute('src'));
            descriptions = Array.from(document.querySelectorAll('.cart-box .product-description2')).map(element => element.innerHTML);

            lightboxImage.src = lightboxTriggerElement.src;
            lightboxDescription.innerHTML = descriptions[index];
            lightboxDescription.classList.add('active');
            lightboxOverlay.style.display = 'flex';
            lightboxOverlay.classList.add('opened');

            updateNavigationButtons();
        });
    });

    lightboxOverlay.addEventListener('click', function (event) {
        if (
            event.target === lightboxOverlay &&
            event.target !== prevButton &&
            event.target !== nextButton
        ) {
            closeLightbox();
        }
    });

    prevButton.addEventListener('click', function () {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    showImageAtIndex(currentIndex);
    });

    nextButton.addEventListener('click', function () {
    currentIndex = (currentIndex + 1) % images.length;
    showImageAtIndex(currentIndex);
    });

    function showImageAtIndex(index) {
    const imageSrc = images[index];
    lightboxImage.src = imageSrc;
    lightboxDescription.innerHTML = descriptions[index];
    updateNavigationButtons();
    }

    function updateNavigationButtons() {
    prevButton.disabled = currentIndex === 0;
    nextButton.disabled = currentIndex === images.length - 1;
    }

    function closeLightbox() {
    lightboxDescription.classList.remove('active');
    lightboxOverlay.style.display = 'none';
    lightboxOverlay.classList.remove('opened');
}

    document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
        closeLightbox();
    } else if (event.key === 'ArrowLeft' && !prevButton.disabled) {
        prevButton.click();
    } else if (event.key === 'ArrowRight' && !nextButton.disabled) {
        nextButton.click();
    }
    });

</script>

@endsection
