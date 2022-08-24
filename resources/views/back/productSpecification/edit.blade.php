@extends('back.layouts.master')
@section('title', 'Edit Product Specification')
@section('head')

@endsection
@section('master')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Product Specification</h4>

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
                    {{-- Product Specification start --}}
                    <div class="row">
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

                                <form action="{{route('back.product-specification.update', $productSpecification->id)}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><b>Title*</b></label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name') ?? $productSpecification->name}}" required>
                                                </div>
                                                <br>
                                                <div class="form-group">
                                                    <label><b>Position</b></label>
                                                    <input type="text" class="form-control" name="position" value="{{old('position') ?? $productSpecification->position}}" required>
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
                    </div>
                    {{-- Product Specification End --}}

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
