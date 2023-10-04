<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-3" v-if="!isLoggin">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-sm-12">
                  <div class="card h-100">
                    <img class="card-img-top" :src="('assets/img/backgrounds/' + this.bg_img)" alt="Card image cap">
                  </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 col-lg-12 col-sm-12 col-md-12" v-if="isLoggin">
            <div class="d-flex align-items-start align-items-sm-center gap-2 mx-2 my-3">
              <img :src="image_preview"   height="250" width="310" id="uploadedAvatar">
            </div>
            <div class="mx-3">
                <label for="upload" class="btn btn-success me-2 mb-4 mt-4" tabindex="0" @click="savebg(this.id)">
                  <span class="d-none d-sm-block"><i class="bx bx-save me-1"></i>ບັນທຶກ</span>
                  <i class="bx bx-save d-block d-sm-none"></i>
                </label>
                <label for="upload" class="btn btn-primary mb-4 mt-4" tabindex="0" @click="Upload()">
                  <span class="d-none d-sm-block"><i class="bx bx-image-add me-1"></i>ເລືອກຮູບພາບໃໝ່</span>
                  <i class="bx bx-image-add d-block d-sm-none"></i>
                  <input type="file" ref="file" @change="onSelected" class="account-file-input" hidden="" accept="image/png, image/jpeg">
                </label>
            </div>
        </div>
        <div class="card">
            <div class="mb-4">
                <div class="card-body">
                    <form @submit.prevent="save">
                        <div class="row">
                            <div class="card-header d-flex justify-content-center align-items-center">
                                    <h3 class="mb-0 fw-bold">ຂໍ້ມູນຂ່າວສານຂອງໂຮງຮຽນ</h3>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <ckeditor :editor="editor" v-model="editorData.content_1" :config="editorConfig">
                                    </ckeditor>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <ckeditor :editor="editor" v-model="editorData.content_2" :config="editorConfig"></ckeditor>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" v-if="isLoggin"><i class='bx bx-save me-1'></i>ບັນທຶກ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
export default {
    name: 'WorkspaceJsonHome',

    data() {
        return {
            id : '',
            bg_img : '',
            image_preview: window.location.origin + '/assets/img/logo/preview.JPG',
            img_product: '',
            editor: ClassicEditor,
            editorData: {
                content_1: '',
                content_2: ''
            },
            editorConfig: {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'insertTable', '|', 'imageUpload', 'mediaEmbed', '|', 'undo', 'redo' ],
                        table: {
                        toolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
                        },
                        language: 'en',
            },
            FormType: false,
            id: '',
            DataInformation : []
        };
    },
    methods: {
        onSelected(event) {
            this.img_product = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.img_product);
            reader.addEventListener("load", function () {
                this.image_preview = reader.result;
            }.bind(this), false);
        },
        Upload(event) {
            this.$refs.file.click();
        },
        save() {
            if (this.FormType) {
                this.$axios.post(`api/information/add`, {
                    content_1: this.editorData.content_1,
                    content_2: this.editorData.content_2
                }).then((response) => {
                    this.$swal({
                    position: 'center',
                    icon: 'success',
                    title: "ບັນທຶກຂໍ້ມູນສຳເລັດ",
                    showConfirmButton: false,
                    timer: 3000
                })
                }).catch((error) => {
                    console.log(error)
                })
            } else {
                this.$axios.post(`api/information/update/${this.id}`, {
                    content_1: this.editorData.content_1,
                    content_2: this.editorData.content_2,
                }).then((response) => {
                    this.$swal({
                    position: 'center',
                    icon: 'success',
                    title: "ບັນທຶກຂໍ້ມູນສຳເລັດ",
                    showConfirmButton: false,
                    timer: 3000
                })
                }).catch((error) => {
                    console.log(error)
                })
            }
            this.getData()
            this.editorData.content_1 = ''
            this.editorData.content_2 = ''
        },
        savebg(id){
            this.$axios.post('api/contact/update/bg/' + id,{'file': this.img_product},{headers:{"Content-Type":"multipart/form-data"}}).then((response)=>{
                console.log(response);
                if(response.data.success == true){
                    this.$swal({
                        position : "center",
                        icon : 'success',
                        title : response.data.message,
                        showConfirmButton : false,
                        timer : 2000
                    })
                }
            }).catch((error)=>{
                console.log(error);
            })
        },
        getData() {
            this.$axios.get(`api/information/getAll`).then((response) => {
                this.DataInformation = response.data
                this.id = this.DataInformation.data[0].id;
                this.editorData.content_1 = this.DataInformation.data[0].contents_1;
                this.editorData.content_2 = this.DataInformation.data[0].contents_2;
            }).catch((error) => {
                console.log(error)
            })
        }
    },
    created() {

        this.$axios.get('api/contact').then((response) => {
            this.id = response.data[0].id
            this.bg_img = response.data[0].bg
            if(response.data[0].bg){
                this.image_preview = window.location.origin + '/assets/img/backgrounds/' + response.data[0].bg
            }else{
                this.image_preview
            }
        }).catch((error)=>{
            console.log(error);
        })

        this.getData()
            if (window.Laravel.isLoggin) {
            this.isLoggin = true;
            } else {
            this.isLoggin = false;
                $(document).ready(function(){
                    let ckeditor = document.getElementsByClassName("ck ck-sticky-panel__content")[0]
                        ckeditor.style.display = 'none'
                    let ckeditor1 = document.getElementsByClassName("ck ck-sticky-panel__content")[1]
                        ckeditor1.style.display = 'none'
                })
            }
    }
};
</script>

<style lang="scss" scoped></style>