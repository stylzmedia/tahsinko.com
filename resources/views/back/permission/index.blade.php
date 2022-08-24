@extends('back.layouts.master')
@section('title', 'Permissions')

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
                    <h4 class="mb-sm-0">Permissions</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Permissions</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="blog-table-header card-header">
                        <h4 class="card-title mb-0 flex-grow-1">Permissions</h4>
                        @if(auth()->user()->permission('permissions','add'))
                        <a href="{{ route('back.permission.create') }}" class="btn btn-info float-right"><i class="ri-add-circle-line"></i> Add Permission</a>
                        @endif
                    </div><!-- end card header -->

                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th>Role Name</th>
                                <th scope="col" class="text-right">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key=>$permission)
                                  <tr>
                                    <td>{{$permission->id}}</td>
                                    <td>{{$permission->role->name}}</td>
                                    <td class="text-right">
                                        @if(auth()->user()->permission('permissions','edit'))
                                            <a class="btn btn-sm btn-success" href="{{route('back.permission.edit', $permission->id)}}"><i class="ri-edit-2-line"></i></a>
                                        @endif
                                        @if(auth()->user()->permission('permissions','delete'))
                                            <form class="d-inline-block" action="{{ route('back.permission.destroy', $permission->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf

                                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Are you sure to remove?')">
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div>
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
