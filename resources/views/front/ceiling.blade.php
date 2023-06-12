@extends('front.layouts.master')
@php
    $categoryName = "{$page->title}"; // replace with the category name you want to filter by
    $products = \App\Models\Product::where('status', 1)
        ->whereHas('categories', function ($query) use ($categoryName) {
            $query->where('title', $categoryName);
        })
        ->orderBy('position', 'ASC')
        ->paginate(9);
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

        .cart-image {
            height: 200px;
            display: grid;
            align-content: space-around;
            overflow: hidden;
        }

        /* lightbox  */
        .opened {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .lightbox-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80%;
            background: #fff;
            padding: 10px;
            width: 70%;
            flex-direction: column;
            overflow: hidden;
        }
        .lightbox-image {
            width: 80%;
        }
        .lightbox-description.active {
            display: contents;
        }
        /* lightbox  */
    </style>
@endsection

@section('master')
    <!-- Breadcrumb -->
    @include('front.includes.breadcrumb')
    <!-- Breadcrumb End-->
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
                                <div class="col-lg-4 col-sm-12 mb-4">
                                    <div class="cart-box shadow rounded p-4">
                                        <div class="product-description2 card-title text-center">
                                            <h4 class="text-danger">{{ $product->name }}</h4>
                                        </div>
                                        <div class="cart-image">
                                            <img src="{{ $product->img_paths['original'] }}" class="img-fluid lightbox-trigger" data-index="{{ $loop->index }}" />
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
