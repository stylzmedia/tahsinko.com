@extends('front.layouts.master')
@php
    $seriesName = "{$page->title}"; // replace with the seriesName name you want to filter by
    $products = \App\Models\Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($seriesName) {
            $query->where('tag', $seriesName); })
        // ->orderBy('position', 'ASC')
        ->orderByRaw("SUBSTRING_INDEX(name, '-', -1) + 0 ASC")
        ->paginate(12);
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
            font-variant-caps: all-small-caps;
            line-height: 14px;
        }
        .product-description p {
            color: #212529;
        }

        .product-image {
            width: 100%;
            overflow: hidden;
            height: 285px;
        }
        .cart-box, .product-inner {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
            align-content: space-around;
        }
        .short-description{
            font-size: 20px;
        }
        .table {
            --bs-table-border-color: red !important;
        }
        .table-bordered>:not(caption)>*>*{
            border-width: 0 !important;
        }
        /* lightbox */

        /* lightbox end */

        @media only screen and (min-width: 1800px) {
            .product-description {
                font-size: 20px;
            }
            /* .cart-box {
                height: 480px;
            } */
            .cart-image img {
                height: 430px;
            }
        }
        @media only screen and (min-width: 1440px) {
            .product-description {
                font-size: 13px;
            }
        }
        @media only screen and (min-width: 1024px) {
            /* .cart-box {
                height: 410px;
            } */
            .cart-image img {
                height: 360px;
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
                                    <div class="cart-box h-100 shadow rounded p-4">
                                        <div class="row">
                                            <div class="product-description2 p-0 col-lg-7 col-sm-7 col-12">

                                                <div class="title-bar text-uppercase">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="short-description product-description p-2">
                                                    @empty($product->description)
                                                        @else
                                                            {!! $product->description !!}
                                                    @endempty
                                                </div>

                                                <div class="product-description">
                                                    <table class="table table-bordered">
                                                        <tbody>

                                                            @empty($product->ceiling)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Celling</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->ceiling }}</td>
                                                                </tr>
                                                            @endempty

                                                            @empty($product->ceiling)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td style="width: 35%">Cabin Wall</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->cabin_wall }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->handrail)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Handrail</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->handrail }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->floor)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Floor</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->floor }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->rear_wall)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td style="width: 35%">Rear Wall</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->rear_wall }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->side_wall)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Side Wall</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->side_wall }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->center_plate)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Center Plate</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->center_plate }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->aux_plates)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Auxiliary Plate</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->aux_plates }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->center_back)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Center Back</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->center_back }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->center_side)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Center Side</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->center_side }}</td>
                                                                </tr>
                                                            @endempty
                                                            @empty($product->note)
                                                                <tr>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td>Note</td>
                                                                    <td>:</td>
                                                                    <td>{{ $product->note }}</td>
                                                                </tr>
                                                            @endempty



                                                        </tbody>
                                                    </table>

                                                    <div class="mt-50 mb-10 shop-info-box">
                                                        <p class="mb-10 text-danger">
                                                            <i class="fa-solid fa-phone-volume fa-lg "></i>
                                                            <a href="tel:{{$settings_g['mobile_number'] ?? ''}}" class="link-dark">{{$settings_g['mobile_number'] ?? ''}}</a>
                                                        </p>
                                                        <p class="mb-10 text-danger">
                                                            <i class="fa-solid fa-envelope fa-lg"></i>
                                                            <a href="mailto:{{$settings_g['email2'] ?? ''}}" class="link-dark">{{$settings_g['email2'] ?? ''}}</a>
                                                        </p>
                                                        @php
                                                            $phoneNumber = str_replace(['+', ' '], '', $settings_g['mobile_number'] ?? '');
                                                            $whatsappLink = 'https://api.whatsapp.com/send?phone=' . $phoneNumber;
                                                        @endphp
                                                        <p class="mb-10 text-danger">
                                                            <i class="fa-brands fa-square-whatsapp fa-lg"></i>
                                                            <a class="link-dark" target="_blank" href="{{ $whatsappLink }}">{{$settings_g['mobile_number'] ?? '' }}</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-sm-5 col-12 product-inner">
                                                <div class="product-image">
                                                    <img
                                                    src="{{$product->img_paths['original']}}"
                                                    class="lightbox-trigger mx-auto d-block h-100"
                                                    data-index="{{ $loop->index }}"
                                                    srcset="{{ $product->img_paths['small'] }} 400w,
                                                    {{ $product->img_paths['medium'] }} 800w,
                                                    {{ $product->img_paths['original'] }} 1200w"
                                                    sizes="(max-width: 600px) 400px,
                                                    (max-width: 900px) 800px,
                                                    1200px"/>
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
                            {{ $products->onEachSide(1)->links() }}
                            {{-- {{ $products->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')

<script>
    const lightboxTriggerElements = document.querySelectorAll('.lightbox-trigger');
    const lightboxOverlay = document.querySelector('.lightbox-overlay');
    const lightboxImage = document.querySelector('.lightbox-image');
    const lightboxDescription = document.querySelector('.lightbox-description');
    const prevButton = document.querySelector('.lightbox-prev');
    const nextButton = document.querySelector('.lightbox-next');
    const shopInfoBox = document.querySelector('.shop-info-box');
    let currentIndex = 0;
    let images = [];
    let descriptions = [];
    let isLightboxOpen = false;

    lightboxTriggerElements.forEach(function (lightboxTriggerElement, index) {
        lightboxTriggerElement.addEventListener('click', function (event) {
            event.preventDefault();
            currentIndex = index;
            images = Array.from(document.querySelectorAll('.lightbox-trigger')).map(element => element.getAttribute('src'));
            descriptions = Array.from(document.querySelectorAll('.cart-box .product-description2' )).map(element => element.innerHTML);

            lightboxImage.src = lightboxTriggerElement.src;
            lightboxDescription.innerHTML = descriptions[index];
            lightboxDescription.classList.add('active');
            lightboxOverlay.style.display = 'flex';
            lightboxOverlay.classList.add('opened');

            toggleShopInfoBox(false); // Hide shop info box when lightbox is open
            isLightboxOpen = true;
            updateNavigationButtons();
        });
    });

    lightboxOverlay.addEventListener('click', function (event) {
        if (
            event.target === lightboxOverlay &&
            event.target === shopInfoBox &&
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

        toggleShopInfoBox(true); // Show shop info box when lightbox is closed
        isLightboxOpen = false;
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

    toggleShopInfoBox(true); // Show shop info box by default

    // Hide shop info box when clicking outside the lightbox
    document.addEventListener('click', function (event) {
        if (!isLightboxOpen && event.target !== shopInfoBox && !shopInfoBox.contains(event.target)) {
            toggleShopInfoBox(false);
        }
    });

</script>

@endsection
