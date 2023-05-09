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
@include('front.includes.breadcrumb')
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
