@extends('front.layouts.master')
@php
    $page_title='Media';
@endphp
@section('head')
    @include('meta::manager', [
        'title' => 'Gallery - ' . ($settings_g['slogan'] ?? '')
    ])
    @php
        $galleries = \App\Models\Gallery::orderBy('position', 'DESC')
        ->active()
        ->get();
    @endphp

@endsection

@section('master')
    <!-- Breadcrumb -->
    <nav class="flex py-5 px-5 text-gray-700 bg-sky-400 border border-gray-200 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <div class="container">
            <h2 class="text-white text-2xl font-semibold mb-5">{{$page_title}}</h2>
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                <a href="{{route('homepage')}}" class="inline-flex items-center text-sm font-medium text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Home
                </a>
                </li>
                <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-sm font-medium text-white hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">{{$page_title}}</a>
                </div>
                </li>
            </ol>
        </div>
    </nav>
    <!-- End Breadcrumb -->

    {{-- gallery section start --}}
    <section class="py-20 bg-gray-100">
        <div class="container">

            <div class="mt-10 lg:flex lg:space-x-0 lg:flex-wrap">
                @foreach ($galleries as $gallery)
                    <div class="w-full lg:w-1/3 mb-5 pl-5 card">
                        <div class="overflow-hidden ovelay">
                            <img class="h-60 w-full object-cover" src="{{$gallery->img_paths['small']}}" alt="{{$gallery->name}}">
                        </div>
                        <div class="py-10 px-5 card-desc">
                            {{-- <span class="text-xs text-white font-bold">{{date('d M, Y', strtotime($gallery->created_at))}}</span> --}}
                            <h2 class="py-10 px-2 text-base font-medium text-white uppercase">{{$gallery->name}}</h2>
                            <a class="text-sm text-sky-400 hover:text-sky-500" href="{{route('gallery.single',$gallery->name)}}">View Details <i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('footer')

@endsection
