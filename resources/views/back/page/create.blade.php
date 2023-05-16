@extends('back.layouts.master')
@section('title', 'Create page')

@section('master')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Create Page</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create page</li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Page</h4>
                            <ul class="list-inline">
                                <li class="list-inline-item"> <a href="{{ route('back.pages.index') }}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> All Page</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="{{route('back.pages.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row live-preview">
                                    <div class="col-lg-8">

                                        <div class="form-group">
                                            <input type="hidden" name="for" value="blog">
                                            <label for="title" class="form-label">Title <b style="color: red;">*</b></label>
                                            <input type="text" class="form-control" id="title" name="title" value="">
                                        </div>

                                        <br>

                                        <div class="form-group">
                                            <label for="short_description" class="form-label">Short Description</label>
                                            <textarea class="form-control" id="short_description" name="short_description" value=""></textarea>
                                        </div>

                                        <br>

                                        <div class="form-group">
                                            <label for="editor" class="form-label">Description <b style="color: red;">*</b></label>
                                            {{-- <div class="snow-editor" style="height: 300px;">
                                            </div> <!-- end Snow-editor--> --}}
                                            <textarea class="form-control" id="editor" placeholder="Enter the Description" name="description"></textarea>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="title" class="form-label">PDF Url</label>
                                            <input type="text" class="form-control" id="pdf_file" name="pdf_file" value="{{old('pdf_file')}}">
                                        </div>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="img_group">
                                            <img class="img-thumbnail uploaded_img" src="{{asset('images/default-img.png')}}">
                                            <br>

                                            <div class="form-group text-center">
                                                <label><b>Featured Image</b></label>
                                                <div class="custom-file text-left">
                                                    <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                                    <input type="file" id="imageInput" class="custom-file-input image_upload form-control" name="image" accept="image/*">
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label><b>breadcrumb Background *</b></label>
                                            <div class="row">

                                                <div class="col-md-6 row">
                                                    <div class="col-auto" style="margin: 0 auto;margin-top:5%;">
                                                        <input checked type="radio" value="1" class="custom-control-input bread-background" id="color" name="is_color">
                                                        <label class="custom-control-label" for="customRadio1">Color</label>
                                                    </div>
                                                    <div class="col-auto" style="margin: 0 auto;margin-top:5%;">
                                                        <input  type="radio" class="custom-control-input bread-background" value="2" id="image" name="is_color">
                                                        <label class="custom-control-label" for="customRadio1">Image</label>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group is_bread_display image" style="width:100px;position:relative;display:none">
                                                        <input type="file" id="bread_file" name="breadcrumb_background" style="opacity: 0;position:absolute;top:0;left:0;height:100%;width:100%;" />
                                                    <img style="width:100%;" id="bread_img_preview" src="https://st.depositphotos.com/2934765/53192/v/1600/depositphotos_531920820-stock-illustration-photo-available-vector-icon-default.jpg"/>
                                                    </div>
                                                    <div class="form-group is_bread_display color" >

                                                        <input type="color" name="breadcrumb_background" class="form-control form-control-color w-100 colorpicker" value="#088f7d"  required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="breadcrumb_title" class="form-label">breadcrumb Title</label>
                                            <input type="text" class="form-control" id="breadcrumb_title" name="breadcrumb_title" value="{{old('breadcrumb_title')}}">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Page Template</b></label>

                                            <select name="template" class="form-select">
                                                <option value="">Select Template</option>
                                                @foreach (Info::pageTemplates() as $template)
                                                    <option value="{{$template['blade']}}">{{$template['name']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
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
                                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Create</button>
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
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
        // CKEditor
        $(function () {
            CKEDITOR.replace('editor', {
                height: 200,
                filebrowserUploadUrl: "{{route('imageUpload')}}?",
                disableNativeSpellChecker : false,
            });
        });
        /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#bread_img_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#bread_file').on('change', function () {
        readURL(this);
    });
});

$('.bread-background').click(function(){
    $('.is_bread_display').css('display','none');
    $('.'+this.id).css('display','block');
});

    </script>
@endsection
