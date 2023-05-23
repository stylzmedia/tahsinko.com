@extends('front.layouts.master')

@section('head')
    @include('meta::manager', [
        'title' => ('Project'). ' - ' .$project->title . ' | ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $project->media_id ? $project->img_paths['original'] : null,
        'description' => $project->meta_description
    ])
    <style>
        .single-project{
            margin-top: 100px;
        }
        .card-body img {
            height: 65vh;
        }
        .np_button {
            top: 50%;
        }
        @media only screen and (max-width: 575px){

            .np_button {
                display: none;
            }

        }
        .np_button.next {
            right: 25%;
        }
        @media only screen and (max-width: 768px){
            .np_button.next {
                right: 11%;
            }
        }
        .np_button.previous {
            left: 32%;
        }
        @media only screen and (max-width: 1024px){
            .np_button.previous {
                left: 22%;
            }
        }
        @media only screen and (max-width: 768px){
            .np_button.previous {
                left: 8%;
            }
        }
    </style>
@endsection

@section('master')
    <section class="single-project position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="text-center">
                        <div class="card">
                            <div class="card-body">

                                {{-- <img src="{{$project->img_paths['original'] }}" alt="{{ $project->title }}" srcset=""> --}}

                                <a data-fslightbox href="{{$project->img_paths['original'] }}" class="d-block mb-3" style="border-radius: 4px;overflow: hidden;">
                                    <img src="{{$project->img_paths['original'] }}" alt="{{$project->title}}" class="whp">
                                </a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-4">
            <div div="np_button">
            @php
                    $currentProjectIndex = $projects->search(function ($item) use ($project) {
                        return $item->id === $project->id;
                    });
                    $previousProject = $projects->get($currentProjectIndex - 1) ?? null;
                    $nextProject = $projects->get($currentProjectIndex + 1) ?? null;
                    @endphp
                    <div class="row">
                        <div class="col-12">
                            <div class="np_button previous position-absolute">
                                @if ($previousProject)
                                <a href="{{ route('project.single', $previousProject->id) }}" class="btn btn-danger">Previous</a>
                                @endif
                            </div>

                            <div class="np_button next position-absolute">
                            @if ($nextProject)
                            <a href="{{ route('project.single', $nextProject->id) }}" class="btn btn-danger">Next</a>
                            @endif
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </section>
@endsection

@section('footer')
    <script src="{{asset('plugins/fslightbox-basic@3.4.1/fslightbox.js')}}"></script>
@endsection

