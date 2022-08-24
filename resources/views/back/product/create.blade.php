@extends('back.layouts.master')
@section('title', 'Create Product')
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
                        <h4 class="mb-sm-0">Product</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row project-wrapper">
                <div class="col-xxl-12">
                    <!-- Create form start -->
                    <form action="{{ route('back.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="blog-table-header card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Create Products</h4>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"> <a href="{{ route('back.product.index') }}" class="btn btn-info float-right"><i class="ri-book-open-line"></i> All Products</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="row live-preview">
                                            <div class="col-lg-12">

                                                <div class="form-group">
                                                    <label for="name" class="form-label">Name <b
                                                            style="color: red;">*</b></label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{ old('name') }}" required>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label for="editor" class="form-label">Description</label>
                                                    <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                                        name="description">{{ old('description') }}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Product Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="img_group">
                                            <img class="img-thumbnail uploaded_img"
                                                src="{{ asset('img/default-img.png') }}">
                                            <br>
                                            <div class="form-group text-center">
                                                <label><b>Featured</b></label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input feature_type_radio" type="radio"
                                                        name="feature_type" id="feature_type_1" value="0" checked>
                                                    <label class="form-check-label" for="feature_type_1">Image</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input feature_type_radio" type="radio"
                                                        name="feature_type" id="feature_type_2" value="1">
                                                    <label class="form-check-label" for="feature_type_2">Video
                                                        link(Youtube/Vimo)</label>
                                                </div>

                                                <div class="custom-file text-left ft_image">
                                                    <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                                    <input type="file" id="imageInput"
                                                        class="custom-file-input image_upload form-control" name="freature_image"
                                                        accept="image/*">
                                                </div>
                                                <div class="text-left ft_video form-group" style="display: none">
                                                    <input type="text"
                                                        class="form-control feature_video"
                                                        name="feature_video">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="categorySelect">Category <b style="color: red;">*</b></label>
                                            <select class="form-control" id="categorySelect"
                                                aria-label="Floating label select example" name="category[]" multiple="multiple">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label class="form-label" for="pdf_file"><b>Pdf File</b></label>
                                            <input type="file" id="pdf_file" name="pdf_file"
                                                class="pdf_input form-control">
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="text" class="form-control" id="position"
                                                name="position">
                                        </div>

                                    </div>
                                </div>
                                {{-- Product Image Gallery --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">Product gallery</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="dropzone">
                                            <div class="fallback">
                                                <input name="file" accept="image/*" type="file" multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- product Image gallery end --}}

                                {{-- product seo section --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">SEO Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="title" name="meta_title" value="{{old('meta_title')}}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" id="meta_description" cols="" rows="5">{{old('meta_description')}}</textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Tag</label>
                                            <input type="text" class="form-control" id="title" name="meta_tags" value="{{old('meta_tags')}}">
                                        </div>
                                        <br>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                style="width: 100%;">Create</button>
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

    </script>
@endsection
