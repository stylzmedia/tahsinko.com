@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $page->meta_title.' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'description' => $page->meta_description,
        'keywords' => $page->meta_tags,
        'image' => $page->media_id ? $page->img_paths['original'] : null,
    ])

@php
    // $names = ['Certificates', 'License', 'Sole Agencies']; // replace with the names you want to retrieve
    // $galleries = App\Models\Gallery::paginate(12);
    // $galleries = App\Models\Gallery::whereIn('name', $names)->paginate(10);
    $categoryName = "{$page->title}"; // replace with the category name you want to filter by
    // dd($categoryName);

    $galleries = App\Models\Gallery::whereHas('category', function ($query) use ($categoryName) {
        $query->where('title', $categoryName);
    })->paginate(2);

@endphp

<link rel="stylesheet" href="ttps://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
<style>
  .preview-card {
	 position: relative;
	 /* margin: 15px; */
	 /* background: #fff; */

}
.preview-card__wrp{
    box-shadow: 0px 3px 10px rgba(34, 35, 58, 0.2);
	 padding: 30px 25px 30px;
	 border-radius: 25px;
	 transition: all 0.3s;

}
 .preview-card__item {
    flex-direction: row-reverse;
    align-items: center;
}

 .preview-card__img {
	 width: 300px;
	 flex-shrink: 0;
	 height: 300px;
	 border-radius: 20px;
	 transform: translateX(-80px);
}
 /* .preview-card__img:after {
	 content: "";
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
	 background-image: linear-gradient(147deg, #000 0%, #000 74%);
	 border-radius: 20px;
	 opacity: 0.4;
} */
 .preview-card__img img {
	 width: 100%;
	 height: 100%;
	 object-fit: cover;
	 display: block;
	 opacity: 1;
	 border-radius: 20px;
	 transition: all 0.3s;
}

 .preview-card__content > * {
	 transform: translateY(25px);
	 transition: all 0.4s;
}
.preview-card__content .default-btn {
    position: absolute;
    border-radius: 25px;
}
.preview-card__content .default-btn:hover::before {
    border-radius: 25px;
}
 .preview-card__code {
	 color: #7b7992;
	 margin-bottom: 15px;
	 display: block;
	 font-weight: 500;
}
 .preview-card__title {
	 font-size: 24px;
	 font-weight: 700;
	 color: #0d0925;
	 margin-bottom: 20px;
}
 .preview-card__text {
	 color: #4e4a67;
	 margin-bottom: 30px;
	 line-height: 1.5em;
}
 .preview-card__button {
    background-image: linear-gradient(272deg, #f00 0%, #7c0000 74%);
    padding: 15px 15px;
    border-radius: 50px;
    color: #fff;
    font-weight: 500;
    letter-spacing: 1px;
    position: absolute;
}
 .preview-card__button:hover {
	 color: #989898;
	 text-decoration: none;
}


</style>
@endsection

@section('master')

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
<!-- Breadcrumb End-->
<section class="galleries my-5">

   {{--  <div class="container">
            <div class="row justify-content-center">
                @foreach ($galleries as $gallery)
                    <div class="col-md-6 col-lg-2 galleries-list">
                        <div class="mb-4 galleries-item">
                            <img class="galleries_img" src="{{ $gallery->img_paths['original'] }}" alt="{{$gallery->name}}">

                            <div class="galleries-details">
                            <h6 class="galleries-title">{{$gallery->name}}</h6>
                            <a href="{{route('gallery', $gallery->id)}}" class="button button_md">View All {{$gallery->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        {{$galleries->links()}}
    </div>--}}
    <div class="container">
        <div class="row mt-5 justify-content-center">
            @foreach ($galleries as $gallery)
                <div class="col-md-6 preview-card">
                  <div class="m-5 preview-card__wrp">
                    <div class="row preview-card__item">
                        <div class="col-md-6 px-0 shadow preview-card__img">
                           <a href="{{route('gallery', $gallery->id)}}"><img src="{{ $gallery->img_paths['original'] }}" alt=""></a>
                        </div>
                        <div class="col-md-6 preview-card__content">
                        <a href="{{route('gallery', $gallery->id)}}" class="default-btn">See All {{$gallery->name}}</a>
                        </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center text-center">
            {{ $galleries->links() }}
        </div>


    </div>
</section>

@endsection

@section('footer')
<script src="{{ asset('back/assets/libs/swiper/swiper-bundle.min.js') }}"></script>
@endsection
