@extends('back.layouts.master')
@section('title', 'Edit Gallery')

@section('master')

<form action="{{route('back.galleries.item', $gallery->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Gallery</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit Gallery</li>
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
                            <a href="{{route('back.galleries.index')}}" class="btn btn-success"><i class="ri-arrow-left-s-line"></i> View All</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Title *</b></label>
                                        <input type="text" class="form-control" name="title" value="{{old('title') ?? $gallery->title}}" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Description *</b></label>
                                        <textarea id="editor" class="form-control" name="description" cols="30" rows="3" required>{{$gallery->description??old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-light mt-3 shadow">
                        <div class="card-body">
                            <div class="text-center">
                                @if ($gallery->image != NULL)
                                    <div class="img_group">
                                        <img class="img-thumbnail uploaded_img" style="height: 200px; width: 200px;" src="{{$gallery->img_paths['small']?$gallery->img_paths['small']:asset('img/default-img.png')}}">

                                        <div class="form-group text-center">
                                            <label><b>Image</b></label>
                                            <div class="custom-file text-left">
                                                <input type="file" class="form-control custom-file-input image_upload" name="file" accept="image/*">
                                            </div>
                                        </div>
                                    </div>
                                @elseif($gallery->video != NULL)
                                    <div class="img_group">
                                        <video class="" style="height: 200px; width: 200px;"  controls="controls" autoplay loop muted>
                                            <source src="{{ asset($gallery->video) }}" type="video/mp4" />
                                        </video>

                                        <div class="form-group">
                                            <label><b>Video</b></label>
                                            <input class="form-control form-control-sm" name="video" accept="video/mp4" type="file" />
                                        </div>
                                    </div>
                                @elseif($gallery->video_embade_code != NULL)
                                    <div class="img_group">
                                        <div class="overflow-hidden">
                                            {!!$gallery->video_embade_code!!}
                                        </div>

                                        <div class="form-group">
                                            <label><b>Embedded Code</b></label>
                                            <p><b>note-</b> video width="364" height="240"</p>
                                            <textarea class="form-control form-control-sm" name="video_embade_code" id="" cols="" rows="5"></textarea>
                                        </div>
                                    </div>
                                @elseif($gallery->pdf_file != NULL)
                                    <div class="img_group">
                                        <div class="overflow-hidden">
                                            <embed class="" style="height: 200px; width: 200px;" src="{{$gallery->pdf_file}}#toolbar=1" type="application/pdf" />
                                        </div>

                                        <div class="form-group">
                                            <label><b>Pdf File</b></label>
                                            <input class="form-control form-control-sm" name="pdf_file" type="file" />
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Update</button>
                            <small><b>NB: *</b> marked are required field.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</form>
@endsection

@section('footer')
    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
        // CKEditor
        $(function () {
            CKEDITOR.replace('editor', {
                height: 400
            });
        });
    </script>
@endsection

