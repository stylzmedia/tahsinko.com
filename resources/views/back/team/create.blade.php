@extends('back.layouts.master')
@section('title', 'Create Value')
@section('head')
    <style>
        label.image-button {
            padding: 10px 20px 20px;
            border: 1px solid #ddd;
            cursor: pointer;
        }

        label.image-button i {
            font-size: 25px;
            margin-right: 15px;
            position: relative;
            top: 9px;
        }
        .image_upload{
            display: none;
        }
    </style>
@endsection
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Teams</h4>

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
                    <form action="{{ route('back.team.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0 flex-grow-1">Create Team</h4>
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
                                                    <label for="designation" class="form-label">Designation <b
                                                            style="color: red;">*</b></label>
                                                    <input type="text" class="form-control" id="designation" name="designation"
                                                        value="{{ old('designation') }}" required>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4">
                                                        <label for="facebook" class="form-label">Facebook</label>
                                                    <input type="text" class="form-control" id="facebook" name="facebook"
                                                        value="{{ old('facebook') }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="linkedin" class="form-label">Linkedin</label>
                                                    <input type="text" class="form-control" id="linkedin" name="linkedin"
                                                        value="{{ old('linkedin') }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="tweeter" class="form-label">Tweeter</label>
                                                    <input type="text" class="form-control" id="tweeter" name="tweeter"
                                                        value="{{ old('tweeter') }}">
                                                    </div>
                                                </div>

                                                <br>
                                                <div class="form-group">
                                                    <label for="editor" class="form-label">Description </label>
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
                                        <h4 class="card-title mb-0 flex-grow-1">Photo</h4>
                                    </div>

                                    <div class="card-body">
                                        <div class="img_group">
                                            <img class="img-thumbnail uploaded_img"
                                                src="{{ asset('images/default-img.png') }}">
                                            <br>
                                            <div class="form-group text-center">
                                                <div class="custom-file text-left ft_image">
                                                    <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image Icon</label>
                                                    <input type="file"
                                                        class="custom-file-input image_upload form-control" id="imageInput" name="image"
                                                        accept="image/*">

                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <label for="position" class="form-label">Position</label>
                                            <input type="number" class="form-control" id="position" name="position"
                                                value="{{ old('position') }}" required>
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

    <script>
        // summernote editor
        $(function() {
            CKEDITOR.replace('editor', {
                height: 400
            });
        });

    </script>
@endsection

