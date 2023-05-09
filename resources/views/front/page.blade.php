@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $page->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $page->media_id ? $page->img_paths['medium'] : null,
        'description' => $page->meta_description
    ])

<style>
    .page-img img {
    width: 100%;
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
                    <div class="page-img">
                        <img src="{{$page->img_paths['original']}}" class="h-full w-full object-cover" alt="{{$page->title}}">
                    </div>
                @endif
                <div class="page-content">
                    {!! $page->description !!}
                </div>
                <br>
                <div class="page-content">
                    <embed class="" style="height: 100vh; width: 100%;" src="{{ $page->pdf_file}}#view=FitH" type="application/pdf">
                </div>
           </div>
        </div>
    </div>
</section>

@endsection

@section('footer')

@endsection
