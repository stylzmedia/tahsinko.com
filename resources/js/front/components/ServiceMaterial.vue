<template>
    <div class="col-md-6 col-lg-9">
        <div class="up_content_wrap">
            <div class="card shadow mb-4">
                <div class="card-header bg_custom2">
                    <h4 class="text-white">Service Materials</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(material,key) in materials" :key="key">
                            <td>{{ key+1 }}</td>
                            <td>{{ material.title }}</td>
                            <td >
                                <button data-toggle="modal" data-target="#exampleModal" @click="current_mt=material"><i class="fa fa-eye"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ current_mt.title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe v-if="current_mt.type==='pdf'" class="pdf-container"
                            width="100%"
                            height="500px"
                            :src="app_url+'/'+current_mt.doc+'#toolbar=0'">
                        </iframe>
                        <video v-else-if="current_mt.type==='video'" class="img-fluid" autoplay loop muted>
                            <source :src="app_url+'/'+current_mt.video" type="video/mp4" />
                        </video>
                        <VueDocPreview v-else-if="current_mt.type==='office'" :url="app_url+'/'+current_mt.doc" type="office" />

<!--
                        <iframe :src="'https://view.officeapps.live.com/op/embed.aspx?src='+app_url+'/'+current_mt.doc" width='1366px' height='623px' frameborder='0'>This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe>
-->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
//import pdf from 'vue-pdf'
import VueDocPreview from 'vue-doc-preview'
export default {
    name:'ServiceCard',
    components:{
        VueDocPreview
    },
    props:{
        app_url:{
            required:true,
        },
        materials:{
            required:true,
        }
    },
    data(){
        return{
            current_mt:{},
        }
    },
    created() {
        this.current_mt=this.materials[3];
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
<style>

@media print {
    .pdf-container {
        display: none;
    }
}
</style>
