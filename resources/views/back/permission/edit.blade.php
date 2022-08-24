@extends('back.layouts.master')
@section('title', 'Edit Permission')
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
                    <h4 class="mb-sm-0">Edit Permission</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Permission</li>
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
                    <div class="col-md-10 offset-md-1">
                      <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Edit Permission</h3>
                        </div>
                        <form action="{{ route('back.permission.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="from-group">
                                <select name="role_id" id="" class="form-select">
                                    <option value="">Select user</option>
                                    @foreach (\App\Models\Role::get() as $role)
                                        <option value="{{ $role->id }}" @if ($role->id==$permission->role_id)
                                            selected
                                        @endif>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                            </div>
                          <table class="table table-bordered">
                            <tr>
                              <th>Permissions</th>
                              <th>Add</th>
                              <th>Edit</th>
                              <th>view</th>
                              <th>Delete</th>
                              <th>List</th>
                            </tr>

                            <tr>
                                <td>News</td>
                                <td>
                                    <input type="checkbox" name="permission[news][add]" value="1" @isset($permission['permission']['news']['add'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[news][edit]" value="1" @isset($permission['permission']['news']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[news][view]" value="1" @isset($permission['permission']['news']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[news][delete]" value="1" @isset($permission['permission']['news']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[news][list]" value="1" @isset($permission['permission']['news']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Products</td>
                                <td>
                                    <input type="checkbox" name="permission[product][add]" value="1" @isset($permission['permission']['product']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[product][edit]" value="1" @isset($permission['permission']['product']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[product][view]" value="1" @isset($permission['permission']['product']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[product][delete]" value="1" @isset($permission['permission']['product']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[product][list]" value="1" @isset($permission['permission']['product']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Valuable Clients</td>
                                <td>
                                    <input type="checkbox" name="permission[customer][add]" value="1" @isset($permission['permission']['customer']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[customer][edit]" value="1" @isset($permission['permission']['customer']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[customer][view]" value="1" @isset($permission['permission']['customer']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[customer][delete]" value="1" @isset($permission['permission']['customer']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[customer][list]" value="1" @isset($permission['permission']['customer']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>FAQ</td>
                                <td>
                                    <input type="checkbox" name="permission[faq][add]" value="1" @isset($permission['permission']['faq']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[faq][edit]" value="1" @isset($permission['permission']['faq']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[faq][view]" value="1" @isset($permission['permission']['faq']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[faq][delete]" value="1" @isset($permission['permission']['faq']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[faq][list]" value="1" @isset($permission['permission']['faq']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Testimonial</td>
                                <td>
                                    <input type="checkbox" name="permission[testimonial][add]" value="1" @isset($permission['permission']['testimonial']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[testimonial][edit]" value="1" @isset($permission['permission']['testimonial']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[testimonial][view]" value="1" @isset($permission['permission']['testimonial']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[testimonial][delete]" value="1" @isset($permission['permission']['testimonial']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[testimonial][list]" value="1" @isset($permission['permission']['testimonial']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Services</td>
                                <td>
                                    <input type="checkbox" name="permission[service][add]" value="1" @isset($permission['permission']['service']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[service][edit]" value="1" @isset($permission['permission']['service']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[service][view]" value="1" @isset($permission['permission']['service']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[service][delete]" value="1" @isset($permission['permission']['service']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[service][list]" value="1" @isset($permission['permission']['service']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Values</td>
                                <td>
                                    <input type="checkbox" name="permission[value][add]" value="1" @isset($permission['permission']['value']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[value][edit]" value="1" @isset($permission['permission']['value']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[value][view]" value="1" @isset($permission['permission']['value']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[value][delete]" value="1" @isset($permission['permission']['value']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[value][list]" value="1" @isset($permission['permission']['value']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Galleries</td>
                                <td>
                                    <input type="checkbox" name="permission[galleries][add]" value="1" @isset($permission['permission']['galleries']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[galleries][edit]" value="1" @isset($permission['permission']['galleries']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[galleries][view]" value="1" @isset($permission['permission']['galleries']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[galleries][delete]" value="1" @isset($permission['permission']['galleries']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[galleries][list]" value="1" @isset($permission['permission']['galleries']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Pages</td>
                                <td>
                                    <input type="checkbox" name="permission[pages][add]" value="1" @isset($permission['permission']['pages']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[pages][edit]" value="1" @isset($permission['permission']['pages']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[pages][view]" value="1" @isset($permission['permission']['pages']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[pages][delete]" value="1" @isset($permission['permission']['pages']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[pages][list]" value="1" @isset($permission['permission']['pages']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Menus</td>
                                <td>
                                    <input type="checkbox" name="permission[menus][add]" value="1" @isset($permission['permission']['menus']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[menus][edit]" value="1" @isset($permission['permission']['menus']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[menus][view]" value="1" @isset($permission['permission']['menus']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[menus][delete]" value="1" @isset($permission['permission']['menus']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[menus][list]" value="1" value="1" @isset($permission['permission']['menus']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Settings</td>
                                <td>
                                    <input type="checkbox" name="permission[settings][add]" value="1" @isset($permission['permission']['settings']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[settings][edit]" value="1" @isset($permission['permission']['settings']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[settings][view]" value="1" @isset($permission['permission']['settings']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[settings][delete]" value="1" @isset($permission['permission']['settings']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[settings][list]" value="1" @isset($permission['permission']['settings']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>
                            <tr>
                                <td>Contact From Request</td>
                                <td>
                                    <input type="checkbox" name="permission[request-contact][add]" value="1" @isset($permission['permission']['request-contact']['add'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[request-contact][edit]" value="1" @isset($permission['permission']['request-contact']['edit'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[request-contact][view]" value="1" @isset($permission['permission']['request-contact']['view'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[request-contact][delete]" value="1" @isset($permission['permission']['request-contact']['delete'])
                                    checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[request-contact][list]" value="1" @isset($permission['permission']['request-contact']['list'])
                                    checked
                                    @endisset>
                                </td>
                            </tr>

                              <tr>
                                <td>Role</td>
                                <td>
                                    <input type="checkbox" name="permission[role][add]" value="1" @isset($permission['permission']['role']['add'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[role][edit]" value="1" @isset($permission['permission']['role']['edit'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[role][view]" value="1" @isset($permission['permission']['role']['view'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[role][delete]" value="1" @isset($permission['permission']['role']['delete'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[role][list]" value="1" @isset($permission['permission']['role']['list'])
                                        checked
                                    @endisset>
                                </td>
                              </tr>

                              <tr>
                                <td>Permissions</td>
                                <td>
                                    <input type="checkbox" name="permission[permissions][add]" value="1" @isset($permission['permission']['permissions']['add'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[permissions][edit]" value="1" @isset($permission['permission']['permissions']['edit'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[permissions][view]" value="1" @isset($permission['permission']['permissions']['view'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[permissions][delete]" value="1" @isset($permission['permission']['permissions']['delete'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[permissions][list]" value="1" @isset($permission['permission']['permissions']['list'])
                                        checked
                                    @endisset>
                                </td>
                              </tr>

                              <tr>
                                <td>Admin</td>
                                <td>
                                    <input type="checkbox" name="permission[admins][add]" value="1" @isset($permission['permission']['admins']['add'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[admins][edit]" value="1" @isset($permission['permission']['admins']['edit'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[admins][view]" value="1" @isset($permission['permission']['admins']['view'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[admins][delete]" value="1" @isset($permission['permission']['admins']['delete'])
                                        checked
                                    @endisset>
                                </td>
                                <td>
                                    <input type="checkbox" name="permission[admins][list]" value="1" @isset($permission['permission']['admins']['list'])
                                        checked
                                    @endisset>
                                </td>
                              </tr>

                          </table>
                          <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                        </div>

                        </form>
                    </div>
                </div>
                <!-- Create form end -->

            </div>
        </div>

    </div>
</div>
@endsection
