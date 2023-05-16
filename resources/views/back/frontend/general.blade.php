@extends('back.layouts.master')
@section('title', 'General settings')

@section('head')
    <style>
        .form-group {
            margin-bottom: 10px;
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
                    <h4 class="mb-sm-0">General Settings</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">General Settings</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0 flex-grow-1">General Settings</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('back.frontend.general')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card border-light mt-3 shadow mb-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">
                                                    <a class="nav-link active show" id="v-pills-WebInfo-tab" data-bs-toggle="pill" href="#v-pills-WebInfo" role="tab" aria-controls="v-pills-WebInfo" aria-selected="true">
                                                        <i class="ri-global-line d-block fs-20 mb-1"></i>
                                                        Web Info
                                                    </a>
                                                    <a class="nav-link" id="v-pills-LogoFavicon-tab" data-bs-toggle="pill" href="#v-pills-LogoFavicon" role="tab" aria-controls="v-pills-LogoFavicon" aria-selected="false">
                                                        <i class="ri-image-line d-block fs-20 mb-1"></i>
                                                        Lofo & Favicons
                                                    </a>
                                                    <a class="nav-link" id="v-pills-SEO-tab" data-bs-toggle="pill" href="#v-pills-SEO" role="tab" aria-controls="v-pills-SEO" aria-selected="false">
                                                        <i class="ri-file-text-line d-block fs-20 mb-1"></i>
                                                        SEO
                                                    </a>
                                                    <a class="nav-link" id="v-pills-SocialLinks-tab" data-bs-toggle="pill" href="#v-pills-SocialLinks" role="tab" aria-controls="v-pills-SocialLinks" aria-selected="false">
                                                        <i class="ri-facebook-box-fill d-block fs-20 mb-1"></i>
                                                        Social Links
                                                    </a>
                                                    <a class="nav-link" id="v-pills-Typography-tab" data-bs-toggle="pill" href="#v-pills-Typography" role="tab" aria-controls="v-pills-Typography" aria-selected="false">
                                                        <i class="ri-archive-line d-block fs-20 mb-1"></i>
                                                        Typography
                                                    </a>
                                                    {{-- <a class="nav-link" id="v-pills-footerdescription-tab" data-bs-toggle="pill" href="#v-pills-footerdescription" role="tab" aria-controls="v-pills-footerdescription" aria-selected="false">
                                                        <i class="ri-file-text-line d-block fs-20 mb-1"></i>
                                                        Footer Description
                                                    </a> --}}
                                                </div>
                                            </div>

                                            <div class="col-md-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-WebInfo" role="tabpanel" aria-labelledby="v-pills-WebInfo-tab">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Website Title*: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control"name="title" value="{{$settings_g['title'] ?? env('APP_NAME')}}" placeholder="Website Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Slogan*: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="slogan" value="{{$settings_g['slogan'] ?? ''}}" placeholder="Website Slogan" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Mobile Number*: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" value="{{$settings_g['mobile_number'] ?? ''}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Telephone: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Tel" name="tel" value="{{$settings_g['tel'] ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Primary Email Address*: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" placeholder="Email Address" name="email" value="{{$settings_g['email'] ?? ''}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Secondary Email Address (optional): </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="email" class="form-control" placeholder="Secondary Email Address" name="email2" value="{{$settings_g['email2'] ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Copyright*: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Copyright" name="copyright" value="{{$settings_g['copyright'] ?? ''}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label><b>City*</b></label>
                                                                        <input type="text" class="form-control" name="city" value="{{$settings_g['city'] ?? ''}}" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label><b>State*</b></label>
                                                                        <input type="text" class="form-control" name="state" value="{{$settings_g['state'] ?? ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label><b>Country*</b></label>
                                                                        <input type="text" class="form-control" name="country" value="{{$settings_g['country'] ?? ''}}" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label><b>Zip*</b></label>
                                                                        <input type="text" class="form-control" name="zip" value="{{$settings_g['zip'] ?? ''}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group">
                                                                        <label><b>Street*</b></label>
                                                                        <input type="text" class="form-control" name="street" value="{{$settings_g['street'] ?? ''}}" required="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <label><b>Google Map Embed Code*</b></label>
                                                            <textarea name="gmap" id="gmap" cols="75" rows="4">{{$settings_g['gmap'] ?? ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="v-pills-LogoFavicon" role="tabpanel" aria-labelledby="v-pills-LogoFavicon-tab">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-3 text-center">
                                                                    <div class="img_group">
                                                                        <img class="img-thumbnail uploaded_img_dark" style="width: 70%; height: auto;" src="{{$settings_g['dark_logo'] ?? asset('images/default-img.png')}}">

                                                                        <div class="form-group">
                                                                            <label><b>Dark Theme Logo </b></label>
                                                                            <div class="custom-file text-left">
                                                                                <label for="imageInputDark" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Logo</label>
                                                                                <input type="file" id="imageInputDark" class="custom-file-input image_upload_dark form-control" name="dark_logo" accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 text-center">
                                                                    <div class="img_group">
                                                                        <img class="img-thumbnail uploaded_img" style="width: 70%; height: auto;" src="{{$settings_g['logo'] ?? asset('images/default-img.png')}}">

                                                                        <div class="form-group">
                                                                            <label><b>Light Theme Logo</b></label>
                                                                            <div class="custom-file text-left">
                                                                                <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Logo</label>
                                                                                <input type="file" id="imageInput" class="custom-file-input image_upload form-control" name="logo" accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 text-center">
                                                                    <div class="img_group">
                                                                        <img class="img-thumbnail uploaded_img_favicon" style="width: 70%;" src="{{$settings_g['favicon'] ?? asset('images/default-img.png')}}">

                                                                        <div class="form-group">
                                                                            <label><b>Favicon</b></label>
                                                                            <div class="custom-file text-left">
                                                                                <label for="imageInputFavicon" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Favicon</label>
                                                                                <input type="file" id="imageInputFavicon" class="custom-file-input image_upload_favicon form-control" accept="image/*" name="favicon">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3 text-center">
                                                                    <div class="img_group">
                                                                        <img class="img-thumbnail uploaded_img_og" style="width: 70%;" src="{{$settings_g['og_image'] ?? asset('images/default-img.png')}}">

                                                                        <div class="form-group">
                                                                            <label><b>OG Image</b></label>
                                                                            <div class="custom-file text-left">
                                                                                <label for="imageInputOG" class="image-button"><i class="ri-gallery-upload-line"></i> Choose OG Image</label>
                                                                                <input type="file" id="imageInputOG" class="custom-file-input image_upload_og form-control" name="og_image">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="v-pills-SEO" role="tabpanel" aria-labelledby="v-pills-SEO-tab">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Meta Description: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Meta Description" name="meta_description" value="{{$settings_g['meta_description'] ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Keywords: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Keywords" name="keywords" value="{{$settings_g['keywords'] ?? ''}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-SocialLinks" role="tabpanel" aria-labelledby="v-pills-SocialLinks-tab">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Facebook: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Facebook" name="facebook" value="{{Info::Settings('social', 'facebook') ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Twitter: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Twitter" name="twitter" value="{{Info::Settings('social', 'twitter') ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Youtube: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Youtube" name="youtube" value="{{Info::Settings('social', 'youtube') ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>Instagram: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="Instagram" name="instagram" value="{{Info::Settings('social', 'instagram') ?? ''}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"><b>LinkedIn: </b></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" placeholder="LinkedIn" name="linkedin" value="{{Info::Settings('social', 'linkedin') ?? ''}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="v-pills-Typography" role="tabpanel" aria-labelledby="v-pills-Typography-tab">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Primary Color</b></label>
                                                                        <input type="color" name="primary_color" value="#088f7d" class="form-control form-control-color w-100 colorpicker">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Secondary Color</b></label>
                                                                        <input type="color" name="secondary_color" value="#088f9d" class="form-control form-control-color w-100 colorpicker">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label><b>Font Familly</b></label>
                                                                        <select class="form-select mb-3">
                                                                            <option selected="">Select Font Familly</option>
                                                                            <option value="roboto">Roboto</option>
                                                                            <option value="open-sans">Open Sans</option>
                                                                            <option value="lato">Lato</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label><b>Font Weight</b></label>
                                                                    <select class="form-select mb-3">
                                                                        <option selected="">Select Font Weight</option>
                                                                        <option value="Thin">Thin</option>
                                                                        <option value="Normal">Normal</option>
                                                                        <option value="semi-bold">Semi Bold</option>
                                                                        <option value="Bold">Bold</option>
                                                                        <option value="extra-bold">Extra Bold</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!div class="tab-pane fade" id="v-pills-footerdescription" role="tabpanel" aria-labelledby="v-pills-footerdescription-tab">
                                                    <div class="form-group row">

                                                        <div class="col-sm-8">

                                                            <label for="editor" class="form-label">Description <b style="color: red;">*</b></label>
                                                            {{-- <div class="snow-editor" style="height: 300px;">
                                                            </div> <!-- end Snow-editor--> --}}
                                                            <textarea class="form-control" id="footer_description" placeholder="Enter the Footer Description" name="footer_description">{{$settings_g['footer_description'] ?? ''}}</textarea>
                                                        </div>
                                                    </div>

                                                </!div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button class="btn btn-primary btn-lg btn-block create_btn">Update</button>
                                        <br>
                                        <small><b>NB: *</b> marked are required field.</small>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Create form end -->

            </div>
        </div>

    </div>
</div>












@endsection

@section('footer')
<script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
        // CKEditor
        $(function () {
            CKEDITOR.replace('footer_description', {
                height: 200,

                disableNativeSpellChecker : false,
            });
        });
    </script>
<script>
    // Uploaded image favicon get url
    function readURLFavicon(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.uploaded_img_favicon').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".image_upload_favicon").change(function(){
        readURLFavicon(this);
    });

    // // Uploaded image Dark get url
    function readURLDark(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.uploaded_img_dark').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".image_upload_dark").change(function(){
        readURLDark(this);
    });

    function readURLogo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.uploaded_img').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".image_upload").change(function(){
        readURLogo(this);
    });

    function readUROG(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.uploaded_img_og').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".image_upload_og").change(function(){
        readUROG(this);
    });
</script>
@endsection
