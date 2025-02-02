@extends('back.layouts.master')
@section('title', 'Testimonial')

@section('head')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css"/>
@endsection

@section('master')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Testimonial</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="blog-table-header card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Testimonial List</h4>
                        <a href="{{route('back.testimonial.create')}}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> Create New</a>
                    </div><!-- end card header -->

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-right">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $key => $blog)
                                    <tr>
                                        <th scope="row">{{$key + 1}}</th>
                                        <td>{!! $blog->name !!}</td>
                                        <td>{!! $blog->email !!}</td>
                                        <td>{!! $blog->message !!}</td>
                                        <td>
                                            @include('switcher::switch', [
                                                'table' => 'testimonials',
                                                'data' => $blog
                                            ])
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-sm btn-success" href="{{route('back.testimonial.edit', $blog->id)}}"><i class="ri-edit-2-line"></i></a>
                                            <form class="d-inline-block" action="{{route('back.testimonial.destroy', $blog->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure to remove?')">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@endsection

@section('footer')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            order: [[0, "asc"]],
        });
    });
</script>
@endsection
