@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $page->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $page->media_id ? $page->img_paths['medium'] : null,
        'description' => $page->meta_description
    ])

<style>
    /* .page-img img {
    width: 100%;
} */
img.object-cover {
    width: 30%;
    float: left;
    padding-right: 20px;
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

{{-- page section start --}}
<section class="page-area">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="page-desc">
                @if($page->media_id)
                    <div class="page-content mb-5 float-left">
                        <img src="{{$page->img_paths['original']}}" class="h-full w-1/2 object-cover" alt="{{$page->title}}">
                        <h3>{!! $page->short_description !!}</h3>
                        <br>
                        {!! $page->description !!}
                    </div>
                @endif
                <div class="pdf-content mt-5">
                    <embed class="" style="height: 100vh; width: 100%;" src="{{ $page->pdf_file}}#view=FitH" type="application/pdf">
                </div>
           </div>
        </div>
    </div>
</section>

@endsection

@section('footer')

@endsection
