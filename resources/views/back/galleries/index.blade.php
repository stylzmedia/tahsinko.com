@extends('back.layouts.master')
@section('title', 'Photo Gallery')

@section('head')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
    <style>
        button.table_btn {
            border: none;
            background: transparent;
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
                    <h4 class="mb-sm-0">Galleries</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Galleries</li>
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
                        <h5 class="d-inline-block">Gallery List</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Position</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <th scope="row">{{$gallery->id}}</th>
                                        <td>{{$gallery->name}}</td>
                                        <td>{{$gallery->position}}</td>
                                        <td>{{$gallery->Category->title ?? 'N/A'}}</td>
                                        <td>
                                            <a href="{{route('back.galleries.edit', $gallery->id)}}"><i class="ri-edit-2-line"></i></a>
                                            ||
                                            <form class="d-inline-block" action="{{route('back.galleries.destroy', $gallery->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="table_btn" type="submit" onclick="return confirm('Are you sure to remove?')"><i class="ri-delete-bin-5-line text-danger"></i></button>
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
                    <form action="{{route('back.galleries.store')}}" method="POST">
                        @csrf

                        <div class="card-body">
                            <div class="form-group">
                                <label><b>Gallery Name*</b></label>

                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>

                            <div class="form-group">
                                <label><b>Position*</b></label>

                                <input type="number" class="form-control" name="position" value="{{old('position')}}">
                            </div>

                            <div class="form-group">
                                <label><b>Category</b></label>

                                <select name="category" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
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
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            order: [[0, "desc"]],
        });
    });
</script>
@endsection
