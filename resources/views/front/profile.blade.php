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
@include('front.includes.breadcrumb')
<!-- Breadcrumb End-->

{{-- page section start --}}
<section class="page-area">
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="page-desc">
                @if($page->media_id)
                    <div class="page-content mb-5 float-left">
                        <img src="{{asset('images/section/profile-image.jpg')}}" class="h-full w-1/2 object-cover" alt="{{$page->title}}">
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
