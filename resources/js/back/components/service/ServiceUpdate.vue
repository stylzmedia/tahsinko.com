<template>
    <div class="col-md-12">
        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="productForm" ref="slider_form" @submit="submitForm()">
            <div class="card border-light mt-3 shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Service Type *</b></label>
                                <select class="form-control form-control-sm" v-model.number="service.service_type_id" name="service_type_id" required>
                                    <option :value="null">Select One</option>
                                    <option v-for="(sv,key2) in service_types" :value="sv.id" :key="key2">{{  sv.name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Title *</b></label>
                                <input type="text" v-model="service.title" class="form-control form-control-sm" name="title" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><b>Sub title</b></label>
                                <input type="text" v-model="service.sub_title" class="form-control form-control-sm" name="sub_title" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Event Date *</b></label>
                                <input type="datetime-local" v-model="service.date" class="form-control form-control-sm" name="date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Amount *</b></label>
                                <input type="number" v-model="service.amount" step="any" class="form-control form-control-sm" name="amount" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Expire Date</b></label>
                                <input type="date" v-model="service.expire_date" class="form-control form-control-sm" name="expire_date" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Type</b></label>
                                <select name="add_type" class="form-control form-control-sm" v-model.number="service.add_type" required>
                                    <option value="1">Add To cart</option>
                                    <option value="2">Book Now</option>
                                    <option value="3">Enrollment</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12"></div>
                        <div class="row col-md-12" v-for="(tag,key) in tags" :key="key">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Tag *</b></label>
                                    <select class="form-control form-control-sm" v-model="tag.name" required>
                                        <option :value="null">Select One</option>
                                        <option v-for="(tg,key2) in taggs" :value="tg.id" :key="key2">{{  tg.name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><b>Value *</b></label>
                                    <input type="text" class="form-control form-control-sm" v-model="tag.value" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label><b>Is show home *</b></label>
                                    <select class="form-control form-control-sm" v-model="tag.is_show_home" name="is_show_home" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Remove Button -->
                            <div class="col-sm-1">
                                <div class="form-group" >
                                    <i class="fa fa-trash mt-4 pt-1" @click="remove(key)" aria-hidden="true" style="color: red; cursor: pointer"></i>
                                </div>
                            </div>

                            <div class="col-sm-1" >
                                <div class="form-group" >
                                    <i class="fa fa-plus-circle mt-4 pt-1" v-show="tags.length === (key+1)" @click="repeateAgain()" aria-hidden="true" style="color: green; cursor: pointer"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Short Description</b></label>
                                <textarea class="form-control" v-model="service.short_description" name="short_description" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Description</b></label>
                                <textarea id="editor" class="form-control" v-model="service.description" name="description" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Upload Type *</b></label>
                                <div class="form-check form-check-inline">
                                    <input v-model.number="slider_type"
                                        class="form-check-input"
                                        type="radio"
                                        name="is_video"
                                        id="inlineRadio1"
                                        value="0"
                                    />
                                    <label class="form-check-label" for="inlineRadio1">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input v-model.number="slider_type"
                                        class="form-check-input"
                                        type="radio"
                                        name="is_video"
                                        id="inlineRadio2"
                                        value="1"
                                    />
                                    <label class="form-check-label" for="inlineRadio2">Video Upload</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 text-center" v-if="slider_type===0">
                            <img class="img-thumbnail uploaded_img" style="width: 70%" :src="service.image?app_url+service.image:'/img/default-img.png'" alt="">

                            <div class="form-group">
                                <label><b>Image*</b></label>
                                <div class="custom-file text-left">
                                    <input type="file" class="custom-file-input image_upload" name="image" accept="image/*" >
                                    <label class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 text-center" v-if="slider_type===1">
                            <div class="form-group">
                                <label><b>Video *</b></label>
                                <div class="form-group">
                                   <input type="file" name="video" accept="video/mp4" class="video_input mt-2">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <b-button type="submit" v-if="is_loading" variant="success" disabled>
                        <b-spinner small></b-spinner>
                        updating ...
                    </b-button>
                    <b-button type="submit" v-if="!is_loading" variant="success">
                        update
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
import moment from "vue-moment"
export default {
    name:'ServiceUpdate',
    props:{
        app_url:{
            required:true,
        },
        service:{
            required:true,
        },
        service_types:{
            required:true,
        },
        taggs:{
            required:true,
        }
    },
    components:{
        BButton,BSpinner
    },
    data(){
        return{
            moment,
            slider_type:0,
            is_loading:false,
            tags:[
                {
                    name:null,
                    value:'',
                    is_show_home:1,
                }
            ],
        }
    },
    created() {
      this.findTags();
    },
    methods:{
        findTags(){
            let tags = [
                    {
                        name:null,
                        value:'',
                        is_show_home:1,
                    }
                ];
            try{
                tags=JSON.parse(this.service.tags);
            }catch (e){
                tags = [
                    {
                        name:null,
                        value:'',
                        is_show_home:1,
                    }
                ];
            }
            this.tags=tags;
        },
        repeateAgain(){
            this.tags.push({
                name:null,
                value:'',
                is_show_home:1,
            });
        },
        remove(index) {
            this.tags.splice(index, 1)
        },
        async submitForm(){
            this.is_loading=true;
            let data =new FormData(this.$refs.slider_form);
            data.append('tags',JSON.stringify(this.tags));
            await axios.post(`${this.app_url}/adminx/service/${this.service.id}update`,data).then((response)=>{
                this.is_loading=false;
                //this.$refs.slider_form.reset();
                if (response.data.status ==='success') {
                    this.$toaster.success(response.data.message);
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
    },
    watch:{
        service(){
            this.findTags();
        }
    }
}
</script>
