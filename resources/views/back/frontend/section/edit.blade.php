@extends('back.layouts.master')
@section('title', 'Section Update')

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <style>
        .moveContent {
        }
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
        .editImageBox .delete:hover, .editImageBox .edit:hover {
            cursor: pointer;
            color: #161711;
        }
    </style>
@endsection
@php
    $optional_designs=[2,3,6];
@endphp
@section('master')
<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Edit Section</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit Section</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-sm-9">
                    <div class="card-header">
                        {{-- <a href="{{route('back.frontend.section')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i> Back</a> --}}
                        <a href="{{route('back.frontend.section')}}" class="btn btn-success btn-sm"><i class="fas fa-angle-double-left"></i> Create New</a>

                    </div>
                    <div class="card border-light mt-3 shadow">
                        <div class="card-body">
                            <section-update-main-component :home_section="{{ $homeSection }}" image_path="{{ $homeSection->img_paths['original'] }}" app_url="{{env('APP_URL')}}"></section-update-main-component>
                        </div>
                    </div>
                </div>
            <div class="col-sm-3">
                <form action="javascript:void(0)" method="post">
                    @csrf
                    <div class="card border-light mt-3 shadow">
                        <div class="card-body">
                            <ul class="moveContent npnls">
                                @foreach($sliders as $slider)
                                    <li class="{{$slider->id}}">
                                        <span style=" display:flex; justify-content: space-between;">
                                            <i class="ri-drag-move-fill"></i>

                                            {{-- @if($slider->image)
                                                <img src="{{ $slider->img_paths['original'] }}" alt="">
                                            @endif --}}
                                            <input type="hidden" name="position[]" value="{{$slider->id}}">

                                            <div class="float-right">
                                                <a class="btn btn-success" href="{{route('back.frontend.section.edit', $slider->id)}}" style="color:#fff"><i class="ri-edit-2-line"></i></a>
                                                <a href="{{route('back.frontend.section.remove', $slider->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to remove?')"><i class="ri-delete-bin-5-line"></i></a>
                                            </div>
                                        </span>

                                        <p class="ml-5" style="font-weight: bold; text-align: center;">{{ $slider->section_name }}</p>

                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="card-footer">
                            <button type="button" class="btn btn-success" onclick="positionUpdate()">Update position</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    <script type="text/javascript" src="{{asset('back/js/app.js')}}"></script>

    <!-- include summernote css/js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script src="{{asset('back/js/jquery-sortable.js')}}"></script>
    <script>
        $(function () {
            $(".moveContent").sortable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
            });
        });
        function positionUpdate(){
            var ids = $("input[name='position[]']")
                .map(function(){return $(this).val();}).get();
            $.ajax({
                url: '{{route("back.frontend.section.position.update")}}',
                method: 'POST',
                data: {ids, _token: '{{csrf_token()}}'},
                success: function(result){
                    if(result.status ==='success') cAlert('success', result.message);
                    else {
                        cAlert('error', 'Invalid request try again');
                        window.location.reload();
                    }
                },
                error: function(){
                    cAlert('error', 'Invalid request try again');
                    window.location.reload();
                }
            });
        }
         /*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#bread_img_preview')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#bread_file').on('change', function () {
        readURL(this);
    });
});

$('.bread-background').on('click',function(){
    $('.is_bread_display').css('display','none');
    $('.'+this.id).css('display','block');
});
    </script>
@endsection
