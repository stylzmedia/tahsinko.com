<template>
    <div class="col-sm-3 mb-3 mb-md-0">
        <div class="card mb-4">
            <div v-if="service.image" class="card-header card-img-wrap">
                <img :src="app_url+service.image" width="100%">
            </div>
            <div class="modal-body">
                <div class="text-left">
                    <h5>{{ service.title }}</h5>
                    <i class=" fa-4x mb-3 text-primary"></i>
                    <div v-html="service.short_description"></div>
                    <div class="row">
                        <div class="col-md-6">
                            <span v-for="(tag,key) in jsonDecode(service.tags)" :key="key">{{ tag.value }}</span>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="animated-button6 bt_back nav mt-2">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Add To Cart
                            </a>
                            <a href="#" class="animated-button6 bt_back nav mt-2">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                Buy Now
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name:'ServiceCard',
    components:{

    },
    props:{
        app_url:{
            required:true,
        },
        service:{
            required:true,
        }
    },
    data(){
        return{

        }
    },
    created() {

    },
    methods:{
        jsonDecode(dt){
            try {
                return JSON.parse(dt);
            }catch (e){
                return [];
            }
        }
    },
    watch:{

    }
}
</script>
