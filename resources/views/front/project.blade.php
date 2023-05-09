@extends('front.layouts.master')
@php
    $projects = \App\Models\Portfolio::where(['status'=>1])->orderBy('id','DESC')->paginate(8);

@endphp

@section('head')
        @include('meta::manager', [
            'title' => $page->meta_title. ' - ' . ($settings_g['title'] ?? ''),
            'description' => $page->meta_description,
            'keywords' => $page->meta_tags,
            'image' => $page->media_id ? $page->img_paths['original'] : null,

        ])

    <style>
        .header {
            position: relative;
        }
    </style>
@endsection

@section('master')

<!-- Breadcrumb -->
@include('front.includes.breadcrumb')
<!-- Breadcrumb End-->

    {{-- all-products --}}
    <section class="all-project">
        {{-- our project --}}
            <div class="portfolio-area pb-70">
                <div class="tm-title text-uppercase text-center mt-2">
                    <h1>{{ $page->breadcrumb_title }}</h1>

                </div>
                <div class="container">
                    <div class="tab portfolio-tab">
                        <div class="tab_content current active pt-45">
                            <div class="tabs_item current">
                                <div class="row justify-content-center portfolio-item">
                                    @foreach($projects as $project)
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="portfolio-item-two">
                                                <a href="{{ route('project.single', $project->id) }}">
                                                    <img src="{{ $project->img_paths['original'] }}" alt="Images">
                                                </a>
                                                <div class="content active">
                                                    <div class="title">
                                                        <h3><a href="{{ route('project.single', $project->id) }}">{{ $project->title }}</a></h3>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <a href="{{ route('project.single', $project->id) }}">{{ $project->lift_type }}</a>
                                                        </li>
                                                        <li>
                                                            <a>{{ $project->location }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center text-center">
                                    {{ $projects->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- end our porject --}}
    </section>

@endsection
