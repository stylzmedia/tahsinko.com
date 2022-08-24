@extends('front.layouts.master')
@php
    $page_title = $product->name;
@endphp
@section('head')
    @include('meta::manager', [
        'title' => $product->name.'- ' . ($settings_g['slogan'] ?? '')
    ])
    <style>
        .header {
            position: relative;
        }
        .single-blog p{
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

    {{-- single blog section --}}
    <section class="single-blog">

    </section>

@endsection
