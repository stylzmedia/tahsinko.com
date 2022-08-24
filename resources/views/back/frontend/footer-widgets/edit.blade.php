@extends('back.layouts.master')
@section('title', 'Edit Widget')

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
                    <h4 class="mb-sm-0">Widget</h4>

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
            <div class="col-md-8">
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="d-inline-block">Widget List</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-sm" id="dataTable">
                            <thead>
                            <tr>
                                <th scope="col">Position</th>
                                <th scope="col">Title</th>
                                <th scope="col">Widget Type</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($widgets as $key => $item)
                                    <tr>
                                        <th scope="row">{{$item->position}}</th>
                                        <td>
                                            {{$item->title}}
                                        </td>
                                        <td>
                                            {{$item->type}}
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{route('back.footer-widgets.edit', $item->id)}}"><i class="ri-edit-2-line"></i></a>
                                            <form class="d-inline-block" action="{{route('back.footer-widgets.destroy', $item->id)}}" method="POST">
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
                        <h5>Edit Widget</h5>
                    </div>

                    <form action="{{route('back.footer-widgets.update', $widget->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Widget Title<b
                                            style="color: red;">*</b></b></label>
                                        <input type="text" class="form-control" name="title" value="{{old('title') ?? $widget->title}}" required>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label><b>Widget Type<b
                                                    style="color: red;">*</b></b></label>

                                                <select name="type" class="form-select type_input" required>
                                                    <option value="Text" {{$widget->type == 'Text' ? 'selected' : ''}}>Text</option>
                                                    <option value="Menu" {{$widget->type == 'Menu' ? 'selected' : ''}}>Menu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label><b>Position<b
                                                    style="color: red;">*</b></b></label>

                                                <input type="number" class="form-control" name="position" value="{{old('position') ?? $widget->position}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group menu_input" style="{{$widget->type != 'Menu' ? 'display: none' : ''}}">
                                        <label><b>Select Menu<b
                                            style="color: red;">*</b></b></label>

                                        <select name="menu" class="form-select" {{$widget->type == 'Menu' ? 'required' : ''}}>
                                            <option value="">Select Menu</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{$menu->id}}" {{$widget->menu_id == $menu->id ? 'selected' : ''}}>{{$menu->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group text_input" style="{{$widget->type != 'Text' ? 'display: none' : ''}}">
                                        <label for="editor" class="form-label">Text <b
                                            style="color: red;">*</b></label>
                                        <textarea class="form-control" id="editor" placeholder="Enter the Description"
                                            name="text" {{$widget->type == 'Text' ? 'required' : ''}}>{{old('text') ?? $widget->text}}</textarea>
                                    </div>
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

    $(document).on('change', '.type_input', function(){
        let type = $(this).val();
        if(type == "Text"){
            $('.menu_input').hide();
            $('.menu_input').find('select').removeAttr('required', 'required');

            $('.text_input').show();
            $('.text_input').find('textarea').attr('required', 'required');
        }else{
            $('.menu_input').show();
            $('.menu_input').find('select').attr('required', 'required');

            $('.text_input').hide();
            $('.text_input').find('textarea').removeAttr('required', 'required');
        }
    });

</script>

@endsection
