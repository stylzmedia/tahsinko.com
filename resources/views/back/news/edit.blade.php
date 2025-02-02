@extends('back.layouts.master')
@section('title', 'Edit News')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">News</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row project-wrapper">
                <div class="col-xxl-12">
                    <!-- Create form start -->
                    <div class="row">
                        <div class="card">
                            <div class="blog-table-header card-header">
                                <h4 class="card-title mb-0 flex-grow-1">News</h4>
                                <ul class="list-inline">
                                    <li class="list-inline-item"> <a href="{{ route('back.news.index') }}" class="btn btn-info float-right"><i class="ri-book-open-line"></i> All News</a></li>
                                    <li class="list-inline-item"> <a href="{{ route('back.news.create') }}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> Create New</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <form action="{{route('back.news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="row live-preview">
                                        <div class="col-lg-8">

                                            <div class="form-group">
                                                <label for="title" class="form-label">Title <b style="color: red;">*</b></label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{old('title') ?? $news->title}}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="slug" class="form-label">Slug <b style="color: red;">*</b></label>
                                                <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug') ?? $news->slug}}" required>
                                            </div>


                                            <br>

                                            <div class="form-group">
                                                <label for="sub_title" class="form-label">Sub Title</label>
                                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="{{old('sub_title') ?? $news->sub_title}}">
                                            </div>

                                            <br>
                                            <div class="form-group">
                                                <label for="editor" class="form-label">Description <b
                                                        style="color: red;">*</b></label>
                                                <textarea class="form-control" id="editor"
                                                    name="description">{{ old('description') ?? $news->description}}</textarea>
                                            </div>
{{--
                                            <div class="form-group">
                                                <label for="editor" class="form-label">Description <b style="color: red;">*</b></label>
                                                <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                                    name="description">{{old('description') ?? $news->description}}</textarea>
                                            </div> --}}

                                            <div class="row">
                                                <h4 style="margin: 30px 0; text-align:center;">News Source</h2>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="source_name" class="form-label">Source Name</label>
                                                        <input type="text" class="form-control" id="source_name" name="source_name" value="{{old('source_name') ?? $news->source_name}}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Source Link</label>
                                                        <input type="url" class="form-control" id="source_link" name="source_link" value="{{old('source_link') ?? $news->source_link}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <h4 style="margin: 30px 0; text-align:center;">SEO</h2>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Meta Title</label>
                                                        <input type="text" class="form-control" id="title" name="meta_title" value="{{old('meta_title') ?? $news->meta_title}}">
                                                    </div>

                                                    <br>

                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Meta Tag</label>
                                                        <input type="text" class="form-control" id="title" name="meta_tags" value="{{old('meta_tags') ?? $news->meta_tags}}">
                                                    </div>
                                                </div>


                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="title" class="form-label">Meta Description</label>
                                                        <textarea name="meta_description" class="form-control" id="meta_description" cols="" rows="5">{{old('meta_description') ?? $news->meta_description}}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-lg-4">
                                            <div class="img_group">
                                                @if($news->feature_type==0)
                                                    <img class="img-thumbnail uploaded_img" src="{{$news->img_paths['small']}}">

                                                    @if($news->media_id)
                                                        <a href="{{route('back.news.removeImage', $news->id)}}" onclick="return confirm('Are you sure to remove?');" class="btn btn-sm btn-danger remove_image" title="Remove image"><i class="ri-delete-bin-5-line"></i></a>
                                                    @endif
                                                @else
                                                    {!! $news->video_html !!}
                                                @endif
                                                <br>
                                                <div class="form-group text-center">
                                                    <label><b>Featured</b></label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input feature_type_radio" type="radio" name="feature_type" id="feature_type_1" value="0" {{$news->feature_type == 0 ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="feature_type_1">Image</label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input feature_type_radio" type="radio" name="feature_type" id="feature_type_2" value="1" {{$news->feature_type == 1 ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="feature_type_2">Video link(Youtube/Vimo)</label>
                                                    </div>

                                                    <div class="custom-file text-left ft_image">
                                                        <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                                        <input type="file" id="imageInput" class="custom-file-input image_upload form-control" name="image" accept="image/*">
                                                    </div>
                                                    <div class="text-left ft_video form-group" style="display: none">
                                                        <input type="text" class="form-control form-control-sm feature_video" name="feature_video" value="{{ $news->feature_video }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label for="floatingSelect">Category <b style="color: red;">*</b></label>
                                                <select class="form-control" id="categorySelect" aria-label="Floating label select example" name="category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="form-group mt-2">
                                                <label class="form-label"><b>Footer Video</b></label>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input video_radio" type="radio" name="video_type" id="video_type_1" value="File" {{$news->video_type == 'File' ? 'checked' : ''}}>

                                                    <label class="form-check-label form-label" for="video_type_1">File</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input video_radio" type="radio" name="video_type" id="video_type_2" value="Embade Code" {{$news->video_type == 'Embade Code' ? 'checked' : ''}}>

                                                    <label class="form-check-label form-label" for="video_type_2">Embade Code</label>
                                                </div>

                                                <input type="file" name="video" accept="video/*" class="video_input form-control mt-2" style="{{$news->video_type == 'Embade Code' ? 'display: none' : ''}}">

                                                <textarea name="video_embade_code" class="form-control mt-2 video_embade_code"  style="{{$news->video_type == 'File' ? 'display: none' : ''}}" cols="30" rows="5" placeholder="Video embade code">{{old('video_embade_code') ?? $news->video_embade_code}}</textarea>

                                                @if($news->video_type == 'File')
                                                    <video style="width: 100%;height:auto;" class="mt-2" controls controlsList="nodownload">
                                                        <source src="{{$news->video_path}}" type="video/mp4">
                                                    </video>
                                                @endif

                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label class="form-label" for="pdf_file"><b>Pdf File</b></label>
                                                <input type="file" id="pdf_file" name="pdf_file" class="pdf_input form-control">
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="exampleInputdate" class="form-label">Publish Date</label>
                                                <input type="date" class="form-control" id="exampleInputdate" name="publish_date" value="{{old('publish_date') ?? $news->publish_date}}">
                                            </div>
                                            <br>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Update</button>
                                                <small><b>NB: <span style="color: red;">*</span></b> marked are required field.</small>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Create form end -->

                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <!-- summernote Editor -->

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
        // summernote editor
        $(function() {
            CKEDITOR.replace('editor', {
                height: 400,
                filebrowserUploadUrl: "{{route('imageUpload')}}?"
            });
        });

        $(document).ready(function() {
            $('#editor').summernote();
        });

        $(document).on('click', '.video_radio', function(){
            let video_type = $(this).val();

            if(video_type == 'File'){
                $('.video_input').show();
                $('.video_embade_code').hide();
            }else{
                $('.video_input').hide();
                $('.video_embade_code').show();
            }
        });
        $(document).on('click', '.feature_type_radio', function(){
            let ft = $(this).val();

            if(ft == 0){
                $('.ft_image').show();
                $('.uploaded_img').show();
                $('.ft_video').hide();
            }else{
                $('.ft_image').hide();
                $('.uploaded_img').hide();
                $('.ft_video').show();
            }
        });

        $(document).ready(function() {
            $('#categorySelect').select2();
        });
    </script>
@endsection
