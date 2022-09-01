<template>
    <div class="col-md-8">
<!--        route('back.sliders.store'-->
        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="productForm" ref="slider_form" @submit="submitForm()">
            <div class="card border-light mt-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Text 1</b></label>
                                <input type="text" class="form-control" name="text_1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Text 2</b></label>
                                <input type="text" class="form-control" name="text_2" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Text 3</b></label>
                                <input type="text" class="form-control" name="text_3" >
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 1 text</b></label>
                                <input type="text" class="form-control" name="button_1_text" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 1 URL</b></label>
                                <input type="text" class="form-control" name="button_1_url" >
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 2 text</b></label>
                                <input type="text" class="form-control" name="button_2_text" >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Button 2 URL</b></label>
                                <input type="text" class="form-control" name="button_2_url" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Description</b></label>

                                <textarea id="editor" class="form-control" name="description" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Slider Type *</b></label>
                                <div class="form-check form-check-inline">
                                    <input v-model.number="slider_type"
                                        class="form-check-input"
                                        type="radio"
                                        name="slider_type"
                                        id="inlineRadio1"
                                        value="1"
                                    />
                                    <label class="form-check-label" for="inlineRadio1">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model.number="slider_type"
                                        class="form-check-input"
                                        type="radio"
                                        name="slider_type"
                                        id="inlineRadio2"
                                        value="2"
                                    />
                                    <label class="form-check-label" for="inlineRadio2">Video Upload</label>
                                </div>
                               <div class="form-check form-check-inline">
                                    <input v-model.number="slider_type"
                                        class="form-check-input"
                                        type="radio"
                                        name="slider_type"
                                        id="inlineRadio3"
                                        value="3"
                                    />
                                    <label class="form-check-label" for="inlineRadio3">Script</label>
                                </div>

                            </div>
                            <div class="text-center" v-if="slider_type===1">
                            <img class="img-thumbnail uploaded_img" style="width: 70%" :src="'/img/default-img.png'" alt="">

                            <div class="form-group">
                                <label><b>Slider Image*</b></label>
                                <div class="custom-file text-left">
                                    <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                    <input id="imageInput" type="file" class="custom-file-input image_upload form-control" name="image" accept="image/*" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" v-if="slider_type===2">
                            <div class="form-group">
                                <label><b>Input Slider Video Link*</b></label>
                                <div class="form-group">
                                   <input type="file" name="video" accept="video/mp4" class="video_input form-control mt-2" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-center" v-if="slider_type===3">
                            <div class="form-group">
                                <label><b>Slider Script *</b></label>
                                <textarea class="form-control" name="slider_script" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bg_opacity" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Background Opacity</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <b-button type="submit" v-if="is_loading" variant="success" disabled>
                        <b-spinner small></b-spinner>
                        creating ...
                    </b-button>
                    <b-button type="submit" v-if="!is_loading" variant="success">
                        create
                    </b-button>
                    <br>
                    <small><b>NB: *</b> marked are required field.</small>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
import { BButton,BSpinner  } from 'bootstrap-vue'
import Vue from "vue";
Vue.use(Toaster, {timeout: 5000})
import axios from "axios";
export default {
    name:'SliderCreate',
    props:{
        app_url:{
            required:true,
        }
    },
    components:{
        BButton,BSpinner
    },
    data(){
        return{
            slider_type:1,
            is_loading:false,
        }
    },
    methods:{
        submitForm(){
            this.is_loading=true;
            let data =new FormData(this.$refs.slider_form);
            axios.post(`${this.app_url}/adminx/sliders/store`,data).then((response)=>{
                this.is_loading=false;
                this.$refs.slider_form.reset();
                if (response.data.status ==='success') {
                    this.$toaster.success(response.data.message);
                    window.location.reload();
                }
                else this.$toaster.error(response.data.message);
            }).catch((error)=>{
                this.is_loading=false;
                if (error.response.status === 422) {
                    Object.keys(error.response.data.errors).map((field) => {
                        this.$toaster.error(error.response.data.errors[field][0]);
                    });
                } else this.$toaster.error(error.response.data.message);
            })
        }
    }
}
</script>
