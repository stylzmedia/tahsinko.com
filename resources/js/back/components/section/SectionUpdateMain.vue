<template>
    <div>
        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" @submit="sectionSubmit()" ref="section_update_form" id="productForm">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><b>Status *</b></label>
                                <select class="form-select" v-model.number="home_section.status" name="status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><b>Section Name*</b></label>
                                    <input type="text" name="section_name" v-model="home_section.section_name" class="form-control" placeholder="write section here" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>Display Section Title *</b></label>
                                        <select class="form-control" v-model="home_section.section_name_is_show" name="section_name_is_show" required>
                                            <option :value="1">Yes</option>
                                            <option :value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <template v-if="parseInt(home_section.section_design_type_id) ===4 || parseInt(home_section.section_design_type_id) ===8 ||parseInt(home_section.section_design_type_id) ===9 || parseInt(home_section.section_design_type_id) ===11 ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Number of Column *</b></label>
                                            <select class="form-select" v-model="home_section.col" name="col" required>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>>
                                            </select>
                                        </div>
                                    </div>
                                </template>


                                <template v-if="parseInt(home_section.section_design_type_id) ===11  || parseInt(home_section.section_design_type_id) ===11">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Number of row *</b></label>
                                            <input type="number" name="row" v-model="home_section.row" class="form-control" placeholder="write number of row here" required>
                                        </div>
                                    </div>
                                </template>

                                <template  v-if="parseInt(home_section.section_design_type_id) ===6 || parseInt(home_section.section_design_type_id) ===10 || parseInt(home_section.section_design_type_id) ===12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><b>Number of Slide Col*</b></label>
                                            <input type="number" name="no_of_slide_col" v-model="home_section.no_of_slide_col" class="form-control" placeholder="write number of card here" required>
                                        </div>
                                    </div>
                                </template>
                            </div>




                            <div class="row">
                                <template v-if="parseInt(home_section.section_design_type_id) ===2 || parseInt(home_section.section_design_type_id) ===3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><b>Description*</b></label>
                                            <vue-editor v-model="home_section.description" name="description" ></vue-editor>
                                        </div>
                                    </div>
                                </template>
                                <template v-if="parseInt(home_section.section_design_type_id) ===3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><b>Vision*</b></label>
                                            <vue-editor v-model="home_section.description2" name="description2" ></vue-editor>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div class="col-md-4" v-if="parseInt(home_section.section_design_type_id) ===1">
                            <div class="col-md-12">
                                <div class="card border-light mt-3 shadow">
                                    <div class="card-body">
                                        <img class="img-thumbnail uploaded_img"  :src="image_path?image_path:'/images/default-img.png'" alt="">
                                    </div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="form-group">
                                        <label><b>Image*</b></label>
                                        <div class="custom-file text-left">
                                            <label for="imageInput" class="image-button"><i class="ri-gallery-upload-line"></i> Choose Image</label>
                                            <input type="file" id="imageInput" class="form-control custom-file-input image_upload" name="image" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12"></div>

                <div class="card-footer">
                    <b-button type="submit" v-if="is_loading" variant="success" disabled>
                        <b-spinner small></b-spinner>
                        updating...
                    </b-button>
                    <b-button type="submit" v-if="!is_loading" variant="success">
                        Update
                    </b-button>
                    <br>
                    <small><b>NB: *</b> marked are required field.</small>
                </div>
            </div>
        </form>
    </div>
</template>

<script type="application/javascript">
import Vue from 'vue'
import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
import { BButton,BSpinner  } from 'bootstrap-vue'
import { VueEditor } from "vue2-editor";
Vue.use(Toaster, {timeout: 5000})
import axios from "axios";
export default {
    props:{
        home_section:{
            type:Object,
            required:true,
        },
        image_path:{
            required: false,
        },
        app_url:{
            required:true,
        }
    },
    components:{
        BButton,BSpinner,VueEditor
    },
    created() {
        //this.section_design_type_id=this.home_section.section_design_type_id;
    },
    data(){
      return{
          section_design_type_id:null,
          is_loading:false,
          optional_designs:[2,3,6,7,8,9,10,11,12],
          short_description:'',
          description:'',
      }
    },
    methods:{
        show_video_pre(){
            const regex = /youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/ig;
            const matches = regex.exec(this.$refs.feature_video.value);
            this.$refs.feature_video_preview.src="https://www.youtube.com/embed/"+matches[matches.length - 1];
        },
        btnLoad(){
            $('.btn').on('click', function() {
                var $this = $(this);
                $this.button('loading');
                setTimeout(function() {
                    $this.button('reset');
                }, 8000);
            });
        },
        async sectionSubmit(){
            this.is_loading=true;
            let data =new FormData(this.$refs.section_update_form);
            data.append('short_description',this.home_section.short_description);
            data.append('description',this.home_section.description);
           await axios.post(`${this.app_url}/adminx/frontend/section/update${this.home_section.id}`,data).then((response)=>{
                this.is_loading=false;
                //this.$refs.section_update_form.reset();
                if (response.data.status === 'success') {
                    //console.log(response);
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
        },
    },
    watch:{

    }
}

</script>


<style>
.custom_image_size{
    width: 45%;
}
.form-group {
    margin: 10px 0;
}
</style>
