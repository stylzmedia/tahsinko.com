@extends('front.layouts.master')

@section('head')
        @include('meta::manager', [
        'title' => ('Project'). ' - ' .$project->title . ' | ' . ($settings_g['title'] ?? env('APP_NAME')),
        'image' => $project->media_id ? $project->img_paths['original'] : null,
        'description' => $project->meta_description
    ])


<style>
    #single-project {
    padding: 130px 0 50px;
}
</style>
@endsection
@section('master')
    <section id="single-project">
        <div class="container">
            <div class="text-center">
                @foreach ($project->Gallery as $media_item)
                    <img src="{{$media_item->paths['original']}}" alt="{{ $project->title }}" srcset="">
                @endforeach
            </div>
        </div>
    </section>
@endsection
