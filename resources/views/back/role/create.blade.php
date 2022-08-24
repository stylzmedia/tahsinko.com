@extends('back.layouts.master')
@section('title', 'Create Role')
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
                    <h4 class="mb-sm-0">Create Role</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Role</li>
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
                    <div class="col-md-6 offset-md-3">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Role Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <form action="{{ route('back.role.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Role Name" name="name">
                              </div>
                              <button type="submit" class="btn btn-info">Submit</button>
                          </form>
                        </div>
                    </div>
                <!-- Create form end -->

            </div>
        </div>

    </div>
</div>
@endsection
