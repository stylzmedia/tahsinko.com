@extends('back.layouts.master')
@section('title', 'Edit Project')
@section('head')
    <link rel="stylesheet" href="{{asset('back/css/dropzone.css')}}">
@endsection
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Project</h4>

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
                    <form action="{{ route('back.portfolio.update', $portfolio->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit Project</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row live-preview">
                                            <div class="col-lg-12">

                                                <div class="form-group">
                                                    <label for="title" class="form-label">Project Name <b
                                                            style="color: red;">*</b></label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        value="{{ old('title') ?? $portfolio->title }}" required>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label for="editor" class="form-label">About Project</label>
                                                    <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                                        name="description">{{ old('description') ?? $portfolio->description }}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Project Feature Image</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="img_group">
                                            <img class="img-thumbnail uploaded_img" src="{{$portfolio->img_paths['small']}}">
                                            <br>
                                            <div class="form-group text-center">
                                                <div class="custom-file text-left ft_image">
                                                    <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                                    <input type="file"
                                                        class="custom-file-input image_upload form-control" id="imageInput" name="image"
                                                        accept="image/*">

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        {{-- <div class="form-group">
                                            <label for="categorySelect">Project<b style="color: red;">*</b></label>
                                            <select name="product_id" class="form-select" id="">
                                                <option value="">Select Project</option>
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}" {{ $portfolio->product_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br> --}}

                                        <div class="form-group">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="position"
                                                name="position" value="{{ old('position') ?? $portfolio->position }}">
                                        </div>

                                    </div>
                                </div>
                                {{-- Product Image Gallery --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">Project Gallery</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="dropzone {{count($portfolio->Gallery) ? 'dz-clickable dz-started' : ''}}">
                                            <div class="fallback">
                                                <input name="file" accept="image/" type="file" multiple />
                                            </div>

                                            @foreach ($portfolio->Gallery as $media_item)
                                                <div class="dz-preview dz-processing dz-image-preview dz-complete">
                                                    <div class="dz-image">
                                                        <img class="whp" data-dz-thumbnail src="{{$media_item->paths['small']}}">
                                                    </div>

                                                    <a class="dz-remove" href="#" data-dz-remove="">Remove file</a>
                                                    <input type="hidden" name="old_gallery_id[]" value="{{$media_item->id}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                {{-- product Image gallery end --}}

                                {{-- portfolio client information --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">Project Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="lift_type" class="form-label">Type of Lift</label>
                                            <input type="text" class="form-control" id="lift_type" name="lift_type" value="{{old('lift_type') ?? $portfolio->lift_type }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="total_capacity" class="form-label">Capacity</label>
                                            <input type="text" class="form-control" id="total_capacity" name="total_capacity" value="{{old('total_capacity') ?? $portfolio->total_capacity }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="stop_opening" class="form-label">Stop/Opening</label>
                                            <input type="text" class="form-control" id="stop_opening" name="stop_opening" value="{{old('stop_opening') ??$portfolio->stop_opening }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="location" class="form-label">Project Location</label>
                                            <input type="text" class="form-control" id="location" name="location" value="{{old('location') ?? $portfolio->location }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- portfolio client information end --}}

                                {{-- product seo section --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">SEO Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="title" name="meta_title" value="{{old('meta_title') ?? $portfolio->meta_title }}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" id="meta_description" cols="" rows="5">{{old('meta_description') ?? $portfolio->meta_description }}</textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Tag</label>
                                            <input type="text" class="form-control" id="title" name="meta_tags" value="{{old('meta_tags') ?? $portfolio->meta_tags}}">
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                style="width: 100%;">Update</button>
                                            <small><b>NB: <span style="color: red;">*</span></b> marked are required
                                                field.</small>
                                        </div>
                                    </div>
                                </div>
                                {{-- product seo section End --}}
                            </div>
                        </div>
                    </form>
                    <!-- Create form end -->

                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
    <!-- ck Editor -->

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <!-- dropzone -->
    <script src="{{asset('back/js/dropzone.js')}}"></script>

    <script>
        // summernote editor
        $(function() {
            CKEDITOR.replace('editor', {
                height: 400
            });
        });


        $(document).on('click', '.video_radio', function() {
            let video_type = $(this).val();

            if (video_type == 'File') {
                $('.video_input').show();
                $('.video_embade_code').hide();
            } else {
                $('.video_input').hide();
                $('.video_embade_code').show();
            }
        });
        $(document).on('click', '.feature_type_radio', function() {
            let ft = $(this).val();

            if (ft == 0) {
                $('.ft_image').show();
                $('.uploaded_img').show();
                $('.ft_video').hide();
            } else {
                $('.ft_image').hide();
                $('.uploaded_img').hide();
                $('.ft_video').show();
            }
        });

        $(document).ready(function() {
            $('#categorySelect').select2();
        });

        // dropzone
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            // previewTemplate: document.getElementById('preview-template').innerHTML,
            url: "{{route('back.media.upload')}}",
            success: function(file, response){
                // alert(response);
                // console.log(file.previewElement);
                // file.previewElement.formData.append("name", value);
                $('.dropzone div:last-child').append('<input type="hidden" name="gallery_id[]" value="'+ response.success.media_id +'">');
                // file.previewElement.id = 'input_id_' + response.success.media_id;
                // file.previewElement.formData('dfgfdg', 'dfgfdfg');
            }
        });

        // Remove Item
        $(document).on('click', '.dz-remove', function(){
            if(confirm('Are you sure to remove?')){
                $(this).closest('.dz-preview').remove();
            }
        });

    </script>
@endsection

