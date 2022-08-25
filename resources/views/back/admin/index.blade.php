@extends('back.layouts.master')
@section('title', 'Admins')

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
                    <h4 class="mb-sm-0">Admins</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admins</li>
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
                        <h4 class="card-title mb-0 flex-grow-1">Admin List</h4>
                        @if(auth()->user()->permission('admins','add'))
                        <a href="{{route('back.admins.create')}}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> Create New</a>
                        @endif
                    </div><!-- end card header -->

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead>
                              <tr>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Mobile Number</th>
                                    <th scope="col" class="text-right">Action</th>
                                  </tr>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td></td>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$user->full_name}}</td>
                                        <td>{{$user->role->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->mobile_number}}</td>
                                        <td class="text-right">
                                            <div class="d-inline-block" style="width: 80px">
                                                @if(auth()->user()->permission('admins','edit'))
                                                <a href="{{route('back.admins.edit', $user->id)}}" class="btn btn-success btn-sm"><i class="ri-edit-2-line"></i></a>
                                                @endif
                                                @if(auth()->user()->permission('admins','delete'))
                                                <form class="d-inline-block" action="{{route('back.admins.destroy', $user->id)}}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure to remove?')"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                                @endif
                                            </div>
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
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#dataTable').DataTable({
            order: [[0, "asc"]],
        });
    });
</script>-->

@endsection
