@extends('back.layouts.master')
@section('title', 'Valuable Customer')

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endsection

@section('master')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Valuable Customer</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Customer</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-8">
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="d-inline-block">Customer List</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client/Company Name</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $item)
                                    <tr>
                                        <th scope="row">{{$item->position}}</th>
                                        <td>
                                            {{ $item->title }}
                                        </td>
                                        <td>
                                            <img src="{{$item->img_paths['small']}}" alt="{{ $item->title }}" style="height: 50px; weidth: 50px;">
                                        </td>
                                        <td>
                                            @include('switcher::switch', [
                                                'table' => 'customers',
                                                'data' => $item
                                            ])
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('back.customer.edit', $item->id)}}"><i class="ri-edit-2-line"></i></a>
                                            <form class="d-inline-block" action="{{route('back.customer.destroy', $item->id)}}" method="POST">
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
                        <a href="{{route('back.customer.index')}}"><button class="btn btn-primary btn-lg btn-block" style="width: 100%;">Create New</button></a>
                    </div>
                    <div class="card-header">
                        <h5>Update Valuable Customer</h5>
                    </div>

                    <form action="{{route('back.customer.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="img_group">
                                        <img class="img-thumbnail uploaded_img" src="{{$customer->img_paths['small']}}">
                                        <br>
                                        <div class="form-group text-center">
                                            <div class="custom-file text-left ft_image">
                                                <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose image</label>
                                                <input type="file"
                                                    class="custom-file-input image_upload form-control" id="imageInput" value="Choose Image" name="image"
                                                    accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Client/Company Name<b
                                            style="color: red;">*</b></b></label>
                                        <input type="text" class="form-control" name="title" value="{{old('title') ?? $customer->title}}" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Position</b></label>
                                        <input type="text" class="form-control" name="position" value="{{old('position') ?? $customer->position}}" required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="editor" class="form-label">Description </label>
                                        <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                            name="description">{{ old('description') ?? $customer->description }}</textarea>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Update</button>
                            <br>
                            <small><b>NB: *</b> marked are required field.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            order: [[0, "desc"]],
        });
    });

    $(function() {
        CKEDITOR.replace('editor', {
            height: 200
        });
    });

</script>
@endsection

