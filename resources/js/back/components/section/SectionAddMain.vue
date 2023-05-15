<template>
    <div>
        <form
            action="javascript:void(0)"
            method="POST"
            enctype="multipart/form-data"
            @submit="sectionSubmit()"
            ref="section_add_form"
            id="productForm">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    <label><b>Design Type*</b></label>
                    <select
                        class="form-select"
                        v-model="design_type"
                        name="section_design_type_id"
                        required
                    >
                        <option value="null">Select One</option>
                        <option
                        v-for="(type,key) in section_design_types"
                        :value="type.id"
                        :key="key"
                        >
                        {{ type.name }}
                        </option>
                    </select>
                    </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Section Name  -->
                            <div class="col-md-12" v-if="design_type === 1 || design_type === 2 || design_type === 3 || design_type === 4 || design_type === 5 || design_type === 6 || design_type === 7 || design_type === 8 || design_type === 9 || design_type === 10 || design_type === 11 || design_type === 12">
                                <div class="form-group">
                                    <label><b>Section Name*</b></label>
                                    <input
                                    type="text"
                                    name="section_name"
                                    class="form-control"
                                    placeholder="write section name here"
                                    required
                                    />
                                </div>
                            </div>
                            <!-- Section Name End  -->
                            <div class="row">
                                <!-- Display Section Title -->
                                <div class="col-md-6" v-if="design_type === 1 || design_type === 2 || design_type === 3 || design_type === 4 || design_type === 5 || design_type === 6 || design_type === 7 || design_type === 8 || design_type === 9 || design_type === 10 || design_type === 11 || design_type === 12">
                                <div class="form-group">
                                    <label><b>Display Section Title*</b></label>
                                    <select
                                    class="form-select"
                                    name="section_name_is_show"
                                    required
                                    >
                                    <option :value="1">Yes</option>
                                    <option :value="0">No</option>
                                    </select>
                                </div>
                                </div>
                                <!-- Display Section Title End  -->


                                <!-- Number of Slide Col -->
                                <div class="col-md-6" v-if="design_type === 12">
                                    <div class="form-group">
                                    <label><b>Number of Slide Col*</b></label>
                                    <input
                                        type="number"
                                        name="no_of_slide_col"
                                        class="form-control"
                                        required
                                    />
                                    </div>
                                </div>
                                <!-- CNumber of Slide Col End -->


                                <!-- Number of Column -->
                                <template v-if="design_type === 4 || design_type === 6 || design_type === 8 || design_type === 9 || design_type === 10 || design_type === 11">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label><b>Number of Column *</b></label>
                                    <select class="form-select" name="col" required>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    </div>
                                </div>
                                </template>
                                <!-- Number of Column End  -->

                                <!-- Number of Row  -->
                                <template v-if="design_type === 9 ">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label><b>Number of Row*</b></label>
                                        <input
                                            type="number"
                                            name="row"
                                            class="form-control"
                                            value="1"
                                            placeholder="write number of row here"
                                            required/>
                                        </div>
                                    </div>
                                </template>
                                <!-- Number of Row End  -->
                            </div>
                            <div class="row">
                                <!-- Description  -->
                                <template v-if="design_type === 2 || design_type === 3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><b>Description*</b></label>
                                            <vue-editor
                                            v-model="description"
                                            name="description"
                                            ></vue-editor>
                                        </div>
                                    </div>
                                </template>
                                <!-- Description End  -->

                                <!-- Description 2 -->
                                <template v-if="design_type === 3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label><b>Vision*</b></label>
                                            <vue-editor
                                            v-model="description2"
                                            name="description2"
                                            ></vue-editor>
                                        </div>
                                    </div>
                                </template>
                                <!-- Description End  -->
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Image Upload  -->
                            <div class="col-md-12" v-if="design_type === 1">
                            <div class="card border-light mt-3 shadow">
                                <div class="card-body">
                                <img
                                    class="img-thumbnail uploaded_img"
                                    :src="'/img/default-img.png'"
                                    alt=""
                                />
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="form-group">
                                <label><b>Image*</b></label>
                                <div class="custom-file text-left">
                                    <label for="imageInput" class="image-button"
                                    ><i class="ri-gallery-upload-line"></i> Upload</label
                                    >
                                    <input
                                    type="file"
                                    id="imageInput"
                                    class="form-control custom-file-input image_upload"
                                    name="image"
                                    accept="image/*"
                                    required
                                    />
                                </div>
                                </div>
                            </div>
                            </div>
                            <!-- Image Upload End  -->
                        </div>
                    </div>
                </div>

                <div class="col-md-12"></div>

                <div class="card-footer">
                    <b-button type="submit" v-if="is_loading" variant="success" disabled>
                    <b-spinner small></b-spinner>
                    publishing...
                    </b-button>
                    <b-button type="submit" v-if="!is_loading" variant="success">
                    publish
                    </b-button>
                    <br />
                    <small><b>NB: *</b> marked are required field.</small>
                </div>
            </div>
        </form>
    </div>
</template>

  <script>
  import Vue from 'vue'
  import Toaster from 'v-toaster'
  import 'v-toaster/dist/v-toaster.css'
  import { BButton,BSpinner  } from 'bootstrap-vue'
  import { VueEditor } from "vue2-editor";
  Vue.use(Toaster, {timeout: 5000})
  import axios from "axios";
  export default {
      props:{
          section_names:{
              type:Array,
              required:true,
          },
          section_design_types:{
              type:Array,
              required:true,
          },
          app_url:{
              required:true,
          }
      },
      components:{
          BButton,BSpinner,VueEditor,
      },
      data(){
        return{
            design_type:null,
            section_name_id:null,
            section_design_id:null,
            is_loading:false,
            optional_designs:[2,3,6,7,8,9,10,11,12],
            description2:'',
            description:'',
            colour: '#000000',
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
              let data =new FormData(this.$refs.section_add_form);
              data.append('description2',this.description2);
              data.append('description',this.description);
              await axios.post(`${this.app_url}/adminx/frontend/section/store`,data).then((response)=>{
                  this.is_loading=false;
                  this.$refs.section_add_form.reset();
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
          },
          /*on section type change */
          changeSection(){
              if (this.section_name_id !== null && this.section_names.length>0){
                  let ind = this.section_names.find(item=>item.id===this.section_name_id);
                  if(ind) this.section_design_id = ind.section_design_type_id;
              }else{
                  this.section_design_id=null;
              }
          }
      },
      watch:{
          section_name_id(){
              this.changeSection();
          },
          section_names(){
              this.changeSection();
          }
      }
  }
  </script>
  <style>
  .custom_image_size {
    width: 45%;
  }
  .form-group {
    margin: 10px 0;
  }
  </style>
