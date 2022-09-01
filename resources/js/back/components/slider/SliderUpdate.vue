<template>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label><b>Text 1</b></label>
                    <input type="text" class="form-control" name="text_1" v-model="slider.text_1">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b>Text 2</b></label>
                    <input type="text" class="form-control" name="text_2" v-model="slider.text_2">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label><b>Text 3</b></label>
                    <input type="text" class="form-control" name="text_3" v-model="slider.text_3" >
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Button 1 text</b></label>
                    <input type="text" class="form-control" name="button_1_text" v-model="slider.button_1_text" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Button 1 URL</b></label>
                    <input type="text" class="form-control" name="button_1_url" v-model="slider.button_1_url">
                </div>
            </div>


            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Button 2 text</b></label>
                    <input type="text" class="form-control" name="button_2_text" v-model="slider.button_2_text" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label><b>Button 2 URL</b></label>
                    <input type="text" class="form-control" name="button_2_url" v-model="slider.button_2_url" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label><b>Description</b></label>

                    <textarea id="editor" class="form-control" name="description" v-model="slider.description" cols="30" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-12">
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
                        <input v-model.number="slider.slider_type"
                            class="form-check-input"
                            type="radio"
                            name="slider_type"
                            id="inlineRadio3"
                            value="3"
                        />
                        <label class="form-check-label" for="inlineRadio3">Script</label>
                    </div>

                </div>
            </div>
            <div class="col-md-4 text-center" v-if="slider_type===1">
                <img v-if="img_path" class="img-thumbnail uploaded_img" style="width: 70%" :src="img_path" alt="">

                <div class="form-group">
                    <label><b>Slider Image*</b></label>
                    <div class="custom-file text-left">
                        <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                        <input id="imageInput" type="file" class="custom-file-input image_upload form-control" name="image" accept="image/*" >
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center" v-if="slider_type=== 2">
                <div class="form-group">
                    <video v-if="video_path" style="width: 100%;height:auto;" class="mt-2" controls controlsList="nodownload">
                        <source :src="video_path" type="video/mp4">
                    </video>
                    <label><b>Slider Video *</b></label>
                    <div class="form-group">
                        <input type="file" name="video" accept="video/mp4" class="video_input form-control mt-2" >
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center" v-if="slider_type=== 3">
                <div class="form-group">
                    <label><b>Slider Script *</b></label>
                    <textarea class="form-control" name="slider_script" cols="30" rows="3" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="bg_opacity" value="1" :checked="parseInt(slider.bg_opacity)" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">Background Opacity</label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name:'SliderUpdate',
    props:{
        app_url:{
            required:true,
        },
        slider:{
            required:true,
            type:Object,
        },
        img_path:{
            required:false,
        },
        video_path:{
            required:false,
        },
        slider_script:{
            required:false,
        }
    },
    data(){
        return{
            slider_type:1,
            is_loading:false,
        }
    },
    created() {
        this.slider_type=parseInt(this.slider.slider_type);
    },
    watch:{
        slider(){
            this.slider_type=parseInt(this.slider.slider_type);
        }
    }
}
</script>
