@extends('back.layouts.master')
@section('title', 'Edit Product')
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
                    <form action="{{ route('back.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="blog-table-header card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Edit Products</h4>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"> <a href="{{ route('back.product.index') }}" class="btn btn-info float-right"><i class="ri-book-open-line"></i> All Products</a></li>
                                            <li class="list-inline-item"> <a href="{{ route('back.product.create') }}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> Create Product</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body">
                                        <div class="row live-preview">
                                            <div class="col-lg-12">

                                                <div class="form-group">
                                                    <label for="name" class="form-label">Name <b
                                                            style="color: red;">*</b></label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        value="{{old('name') ?? $product->name}}" required>
                                                </div>

                                                <br>

                                                <div class="form-group">
                                                    <label for="editor" class="form-label">Description</label>
                                                    <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                                        name="description">{{ old('description') ?? $product->description }}</textarea>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- div class="card-body">
                                        <div class="row live-preview">
                                            <div class="col-lg-12">
                                                <h5 class="d-inline-block">Specification</h5>
                                                <button class="btn btn-success btn-sm float-right new_spc_btn" type="button"><i class="fas fa-plus"></i> New Field</button>

                                                <div class="spc_inputs">
                                                    {{-- @foreach ($user->UserKids as $kid) --}}
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Title*</b></label>

                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend">
                                                                        <button type="button" class="btn btn-danger remove_spc_field"><i class="ri-delete-bin-5-line"></i></button>
                                                                        </div>

                                                                        <input
                                                                        type="text"
                                                                        name="spc_title[]"
                                                                        value=""
                                                                        {{-- value="{{$kid->name}}"  --}}
                                                                        class="form-control fix-rounded-right" placeholder="Title"
                                                                        required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label><b>Value*</b></label>

                                                                    <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="spc_value[]"
                                                                    placeholder="Value"
                                                                    {{-- value="{{$kid->dob}}" required> --}}
                                                                    value="" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    {{-- @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                    </!-- -->
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Product Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="img_group">
                                            @if($product->feature_type==0)
                                                <img class="img-thumbnail uploaded_img" src="{{$product->img_paths['small']}}">

                                                @if($product->media_id)
                                                    <a href="{{route('back.product.removeImage', $product->id)}}" onclick="return confirm('Are you sure to remove?');" class="btn btn-sm btn-danger remove_image" title="Remove image"><i class="ri-delete-bin-5-line"></i></a>
                                                @endif
                                            @endif
                                            <br>
                                            <div class="form-group text-center">
                                                <label><b>Featured</b></label>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input feature_type_radio" type="radio"
                                                        name="feature_type" id="feature_type_1" value="0" {{$product->feature_type == 0 ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="feature_type_1">Image</label>
                                                </div>

                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input feature_type_radio" type="radio"
                                                        name="feature_type" id="feature_type_2" value="1" {{$product->feature_type == 1 ? 'checked' : ''}}>
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
                                            <select class="form-control" id="categorySelect" aria-label="Floating label select example" name="category[]" multiple="multiple">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        @foreach ($product->categories as $pro_cat)
                                                            {{ $pro_cat->id == $category->id ? 'selected' : '' }}
                                                        @endforeach
                                                    >
                                                        {{ $category->title }}
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
                                                name="position" value="{{ old('position') ?? $product->position }}">
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                {{-- Product Image Gallery --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">Product gallery</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="dropzone {{count($product->Gallery) ? 'dz-clickable dz-started' : ''}}">
                                            <div class="fallback">
                                                <input name="file" accept="image/" type="file" multiple />
                                            </div>

                                            @foreach ($product->Gallery as $media_item)
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

                                {{-- product seo section --}}
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-header">
                                        <h6 class="d-inline-block">SEO Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Title</label>
                                            <input type="text" class="form-control" id="title" name="meta_title" value="{{old('meta_title') ?? $product->meta_title}}">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Description</label>
                                            <textarea name="meta_description" class="form-control" id="meta_description" cols="" rows="5">{{old('meta_description') ?? $product->meta_description}}</textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">Meta Tag</label>
                                            <input type="text" class="form-control" id="title" name="meta_tags" value="{{old('meta_tags') ?? $product->meta_tags}}">
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

                    {{-- Product Specification start --}}
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="card border-light mt-3 shadow">
                                <div class="card-header">
                                    <h5 class="d-inline-block">Product Specification List</h5>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-sm" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productSpecifications as $category)
                                                <tr>
                                                    <th scope="row">{{$category->id}}</th>
                                                    <td>
                                                        {{$category->name}}
                                                    </td>
                                                    <td>
                                                        @include('switcher::switch', [
                                                            'table' => 'product_specifications',
                                                            'data' => $category
                                                        ])
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="{{route('back.product-specification.edit', $category->id)}}"><i class="ri-edit-2-line"></i></a>
                                                        <form class="d-inline-block" action="{{route('back.product-specification.destroy', $category->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf


                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove?')"><i class="ri-delete-bin-5-line"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-light mt-3 shadow">
                                <div class="card-header">
                                    <h5>Create Product Specification</h5>
                                </div>

                                <form action="{{route('back.product-specification.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="for" value="gallery">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><b>Title*</b></label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label><b>Position</b></label>
                                                    <input type="text" class="form-control" name="position" value="{{old('position')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Create</button>
                                        <br>
                                        <small><b>NB: *</b> marked are required field.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    {{-- Product Specification End --}}

                    {{-- product specification value start --}}
                    {{-- <div class="row">
                        <div class="col-md-8">
                            <div class="card border-light mt-3 shadow">
                                <div class="card-header">
                                    <h5 class="d-inline-block">Product Specification value List</h5>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-sm" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Specification</th>
                                            <th scope="col">Value</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productSpecificationValues as $category)
                                                <tr>
                                                    <th scope="row">{{$category->id}}</th>
                                                    <td>
                                                        {{$category->ProductSpecification->name}}
                                                    </td>
                                                    <td>
                                                        {{$category->name}}
                                                    </td>
                                                    <td>
                                                        @include('switcher::switch', [
                                                            'table' => 'product_specification_values',
                                                            'data' => $category
                                                        ])
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-primary btn-sm" href="{{route('back.product-specification-value.edit', $category->id)}}"><i class="ri-edit-2-line"></i></a>
                                                        <form class="d-inline-block" action="{{route('back.product-specification-value.destroy', $category->id)}}" method="POST">
                                                            @method('DELETE')
                                                            @csrf


                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove?')"><i class="ri-delete-bin-5-line"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card border-light mt-3 shadow">
                                <div class="card-header">
                                    <h5>Create Product Specification</h5>
                                </div>

                                <form action="{{route('back.product-specification-value.store')}}" method="POST">
                                    @csrf

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><b>Title*</b></label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label><b>Product Specification*</b></label>
                                                    <select class="form-select" name="product_specification_id" id="">
                                                        <option value="">Select Specification</option>
                                                        @foreach ($productSpecifications as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label><b>Position</b></label>
                                                    <input type="text" class="form-control" name="position" value="{{old('position')}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Create</button>
                                        <br>
                                        <small><b>NB: *</b> marked are required field.</small>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}
                    {{-- product specification value end --}}

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
    <script>
    $(document).on('click', '.new_spc_btn', function(){
        let spc_html = '<div class="row">'
                        + '<div class="col-md-6">'
                            + '<div class="form-group">'
                                + '<label><b>Title*</b></label>'

                                + '<div class="input-group">'
                                    + '<div class="input-group-prepend">'
                                        + '<button type="button" class="btn btn-danger remove_spc_field"><i class="ri-delete-bin-5-line"></i></button>'
                                    + '</div>'

                                    + '<input type="text" class="form-control fix-rounded-right" name="spc_title[]" placeholder="Title" required>'
                                + '</div>'
                            + '</div>'
                        + '</div>'
                        + '<div class="col-md-6">'
                            + '<div class="form-group">'
                                + '<label><b>Value*</b></label>'

                                + '<input type="text" class="form-control" name="spc_value[]" placeholder="Value" required>'
                            + '</div>'
                        + '</div>'
                    + '</div>';

        $('.spc_inputs').append(spc_html);
    });

    $(document).on('click', '.remove_spc_field', function(){
        $(this).closest('.row').remove();
    });
    </script>

@endsection
