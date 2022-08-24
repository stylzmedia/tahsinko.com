@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => $page->title . ' - ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $page->media_id ? $page->img_paths['medium'] : null,
        'description' => $page->meta_description
    ])
    <style>
        .header {
            position: relative;
        }
        .page-area{
            padding: 50px 0;
        }
        .page-area p{
            color: #ddd;
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
 <section id="page-header" class="section background" style="{{$bg_bread}}">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>@if(empty($page->breadcrumb_title)){{$page->title}}@else{{$page->breadcrumb_title}}@endif</h3>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>
<!-- End Breadcrumb -->

{{-- page section start --}}
<section class="page-area">
    <div class="container">
       <div class="page-desc">
            @if($page->media_id)
                <div class="page-img">
                    <img src="{{$page->img_paths['large']}}" class="h-full w-full object-cover" alt="{{$page->title}}">
                </div>
            @endif
            <div class="page-content">
                {!! $page->description !!}
            </div>
       </div>
    </div>
</section>
{{-- page section end --}}


@endsection

@section('footer')

@endsection
