<template>
    <div>
        <div class="row" v-for="(item,key) in items" :key="key">
            <div class="col-sm-12 additional-attribute" v-for="(itm,key2) in item.items" :key="key2">
                <div class="row" >
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="icon-img" v-if="preview">
                                            <img :src="preview" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-group image-group">
                                            <label><b>Image Icon</b></label>
                                            <input class="form-control" type="file" :name="'image_icon['+key+']['+key2+']'" accept="image/*" @change="previewImage" id="my-file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                 <div class="form-group">
                                    <label><b>Description</b></label>
                                    <textarea :name="'attribute_description['+key+']['+key2+']'" class="form-control" placeholder="Decsription write here" id="" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="form-group">
                            <label><b>Title</b></label>
                            <input :name="'attribute_title['+key+']['+key2+']'" class="form-control" placeholder="Title write here" type="text" required>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label><b>URL</b></label>
                                    <input type="url" class="form-control" :name="'attribute_url['+key+']['+key2+']'" id="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label><b>Position</b></label>
                                    <input type="text" class="form-control" :name="'attribute_position['+key+']['+key2+']'" id="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="row">
                            <!-- Remove Button -->
                            <div class="col-sm-6 delete-btn" v-if="item.items.length>1">
                                <div class="form-group" >
                                    <i class="ri-delete-bin-5-line mt-5" @click="removeItemInput(key,key2)" aria-hidden="true" style="color: red; cursor: pointer"></i>
                                </div>
                            </div>

                            <div class="col-sm-6 add-btn" v-if="item.items.length ===(key2+1)">
                                <div class="form-group" >
                                    <i class="ri-add-circle-line mt-1" @click="repeateAgainInput(key)" aria-hidden="true" style="color: green; cursor: pointer"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { BFormGroup, BFormRadioGroup, BFormRadio } from 'bootstrap-vue'
export default {
    name:'JoinType',
    components:{
        BFormRadioGroup, BFormGroup,BFormRadio
    },
    data(){
        return{
            preview: null,
            image: null,
            items: [
                {
                    id: 1,
                    items:[{
                        id:1,
                        image_icon:'',
                        attribute_description:'',
                        attribute_title:'',
                        attribute_url:'',
                        attribute_position:''
                    }],
                    prevHeight: 0,
                }
            ]

        }
    },
    methods:{
        repeateAgain() {
            this.items.push({
                id: 1,
                items:[{
                        id:1,
                        image_icon:'',
                        attribute_description:'',
                        attribute_title:'',
                        attribute_url:'',
                        attribute_position:''
                }],
                prevHeight: 0,
            })
        },
        repeateAgainInput(index){
            this.items[index].items.push({
                id:1,
                image_icon:'',
                attribute_description:'',
                attribute_title:'',
                attribute_url:'',
                attribute_position:''
            });
        },
        // repeateAgainOption(index,index2){
        //     this.items[index].items[index2].options.push({
        //         id:1,
        //         name:'',
        //     });
        // },
        // removeItemOption(index,index2,index3) {
        //     this.items[index].items[index2].options.splice(index3, 1)
        // },
        removeItemInput(index,index2) {
            this.items[index].items.splice(index2, 1)
        },
        removeItem(index) {
            this.items.splice(index, 1)
        },
        previewImage: function(event) {
            var input = event.target;
            if (input.files) {
                var reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                }
                this.image=input.files[0];
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
}
</script>
