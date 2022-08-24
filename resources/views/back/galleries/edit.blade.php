@extends('back.layouts.master')
@section('title', 'Edit Gallery')

@section('head')
    <style>
        .moveContent {}

        .moveContent li {
            border: 1px solid #ddd;
            background: #717384;
            color: #fff;
            padding: 5px 12px;
            margin: 7px 0;
            border-radius: 3px;
            transition: .1s;
        }

        .moveContent li img {
            height: 80px;
            display: inline-block;
            max-width: 115px;
            object-fit: cover;
        }

        .moveContent li:hover {
            cursor: pointer
        }

        .editImageBox {
            position: relative;
        }

        .editImageBox .delete {
            position: absolute;
            top: 5px;
            right: 7px;
            font-size: 27px;
            color: #E02D1B;
            z-index: 99;
        }

        .editImageBox .edit {
            position: absolute;
            top: 50px;
            right: 7px;
            font-size: 27px;
            color: #258391;
            z-index: 99;
        }

        .editImageBox .delete:hover,
        .editImageBox .edit:hover {
            cursor: pointer;
            color: #161711;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('back/css/dropzone-custom.css') }}">
@endsection

@section('master')
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
            <div class="col-md-4">
                <div class="card border-light mt-3 shadow">
                    <form action="{{ route('back.galleries.update', $gallery->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="card-body">
                            <div class="form-group">
                                <label><b>Gallery Name*</b></label>

                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name') ?? $gallery->name }}">
                            </div>

                            <div class="form-group">
                                <label><b>Position*</b></label>

                                <input type="number" class="form-control" name="position"
                                    value="{{ old('position') ?? $gallery->position }}">
                            </div>

                            <div class="form-group">
                                <label><b>Category</b></label>

                                <select name="category" class="form-select">
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $gallery->category_id ? 'selected' : '' }}>
                                            {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{-- <button class="btn btn-success btn-block">Update</button> --}}
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Update</button>
                            <br>
                            <small><b>NB: *</b> marked are required field.</small>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="mb-0">Upload Image</h5>
                    </div>

                    <form action="{{ route('back.galleries.update', $gallery->id) }}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="dropzone">
                                <div class="fallback">
                                    <input name="file" accept="image/*" type="file" multiple />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('back.galleries.edit', $gallery->id) }}"
                                class="btn btn-primary btn-lg btn-block" style="width: 100%;">Upload</a>
                        </div>
                    </form>
                </div>

                <!--   video upload     -->
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="mb-0">Upload Video</h5>
                    </div>

                    <form action="{{ route('back.galleries.uploadVideo', $gallery->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="fallback">
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <label><b>Video</b></label>
                                    <input class="form-control" name="video" accept="video/mp4" type="file" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Upload</button>
                        </div>
                    </form>
                </div>
                {{-- embedded code --}}
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="mb-0">Upload Youtube Embedded Code</h5>
                    </div>

                    <form action="{{ route('back.galleries.uploadEmbedCode', $gallery->id) }}" method="POST">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="fallback">
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <input class="form-control form-control-sm" type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <label><b>Embedded Code</b></label>
                                    <textarea class="form-control" name="video_embade_code" id="" cols="" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Submit</button>
                        </div>
                    </form>
                </div>
                {{-- pdf file --}}
                <!--   video upload     -->
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="mb-0">Upload Pdf File</h5>
                    </div>

                    <form action="{{ route('back.galleries.uploadPdf', $gallery->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="card-body">
                            <div class="fallback">
                                <div class="form-group">
                                    <label><b>Title</b></label>
                                    <input class="form-control" type="text" name="title">
                                </div>
                                <div class="form-group">
                                    <label><b>Pdf File</b></label>
                                    <input class="form-control" name="pdf_file" type="file" />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Upload</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-light mt-3 shadow">
                    <div class="card-header">
                        <h5 class="mb-0">Change Position</h5>
                    </div>

                    <form action="{{ route('back.galleries.changePhotoPosition') }}" method="POST">
                        @csrf

                        <div class="card-body">
                            <ul class="moveContent npnls">
                                @foreach ($gallery->GalleryItems as $item)
                                    <li class="{{ $item->id }}">
                                        <span style=" display:flex; justify-content: space-between;">
                                            <i class="ri-drag-move-fill"></i>
                                            <img src="{{ $item->img_paths['small'] }}">

                                            {{-- <input id="image_title_{{ $item->id }}" type="text" name="title"
                                                placeholder="Enter Image name" value="{{ $item->title }}">

                                            <button type="button" class="title_update btn btn-info"
                                                onclick="dataUpdate({{ $item->id }})" id="update_data_{{ $item->id }}"
                                                value="{{ $item->id }}">update</button> --}}

                                            <input type="hidden" name="position[]" value="{{ $item->id }}">

                                            <div class="float-right">
                                                <a href="{{ route('back.galleries.editImage', $item->id) }}"
                                                    class="btn btn-sm btn-info">
                                                    <i class="ri-edit-2-line"></i>
                                                </a>
                                                <a href="{{ route('back.galleries.deletePhoto', $item->id) }}"
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure to remove?')"><i
                                                        class="ri-delete-bin-5-line"></i></a>
                                            </div>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" style="width: 100%;">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <!-- dropzone -->
    <script src="{{ asset('back/js/dropzone.js') }}"></script>

    <script src="{{ asset('back/js/jquery-sortable.js') }}"></script>

    <script>
        $(function() {
            $(".moveContent").sortable();
        });

        // dropzone
        $(".dropzone").dropzone({
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            // previewTemplate: document.getElementById('preview-template').innerHTML,
            url: "{{ route('back.galleries.uploadPhoto', $gallery->id) }}",
            success: function(file, response) {
                // alert(response);
                // console.log(file.previewElement);
                // file.previewElement.formData.append("name", value);
                $('.dropzone div:last-child').append('<input type="hidden" name="galery_items[]" value="' +
                    response + '">');
                // file.previewElement.id = 'input_id_' + response.success.media_id;
                // file.previewElement.formData('dfgfdg', 'dfgfdfg');
            }
        });

    </script>
@endsection
