@extends('front.layouts.master')
@php
    $clients = \App\Models\Customer::where(['status'=>1])->orderBy('position','ASC')->get();
@endphp

@section('head')
    @include('meta::manager', [
        'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
        'description' => $page->meta_description,
        'keywords' => $page->meta_tags,
        'image' => $page->media_id ? $page->img_paths['original'] : null,

    ])
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

<div class="client-section my-5">
<div class="container">
    <div class="row last-row">
        @foreach ( $clients as $client )
            <div class="col-md-3 client-list">
                <div class="client-inner">
                    <div class="client-item">
                        <img src="{{ $client->img_paths['original'] }}" alt="" class="client-logo">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</div>


@endsection
