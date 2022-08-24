@extends('back.layouts.master')
@section('title', 'Create Admin')
@section('head')
    <style>
        input.form-control {
            margin-bottom: 15px;
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
                    <h4 class="mb-sm-0">Create Admin</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Admin</li>
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
                    <div class="">
                        <div class="card-body">
                            <form action="{{route('back.admins.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row live-preview">
                                    <div class="col-lg-8">
                                        <div class="card border-light mt-3 shadow">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0 flex-grow-1">Create Admin</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label><b>First Name*</b></label>
                                                            <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label><b>Last Name*</b></label>
                                                            <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Email*</b></label>
                                                            <input type="email" class="form-control" name="email" value="{{old('email')}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Mobile Number*</b></label>
                                                            <input type="number" class="form-control" name="mobile_number" value="{{old('mobile_number')}}" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label><b>Role*</b></label>
                                                        <select class="form-select" name="role">
                                                            <option>Select Role</option>
                                                            @foreach ($roles as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for=""><b>Address</b></label>
                                                            <textarea class="form-control" name="address" id="" rows="5">{{old('address')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="card border-light mt-3 shadow">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0 flex-grow-1">Image & Password</h4>
                                            </div>

                                            <div class="card-body">
                                                <div class="img_group">
                                                    <img class="img-thumbnail uploaded_img" src="{{asset('img/default-img.png')}}">
                                                    <br>

                                                    <div class="form-group text-center">
                                                        <label><b>Featured Image</b></label>
                                                        <div class="custom-file text-left">
                                                            <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                                            <input type="file" id="imageInput" class="custom-file-input image_upload form-control" name="profile" accept="image/*">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Password*</b></label>
                                                            <input type="password" class="form-control" name="password" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><b>Confirm Password*</b></label>
                                                            <input type="password" class="form-control" name="password_confirmation" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>


                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Create</button>
                                                    <small><b>NB: <span style="color: red;">*</span></b> marked are required field.</small>
                                                </div>
                                            </div>
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
