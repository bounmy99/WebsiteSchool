<template>
    <div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-body" v-if="isLoggin">
                    <h3>ລາຍການຮູບທີ່ເລືອກທັງໝົດ {{ images.length }} ຮູບ</h3>
                    <form @submit.prevent="uploadImages" v-if="!FormType">
                        <div class="alert alert-danger alert-dismissible" role="alert" v-if="show_error">
                            {{ text_error }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fs-4">ເນື້ອຫາ</label>
                            <div class="row">
                                <div class="col-md-10">
                                    <ckeditor :editor="editor" id="editor"   v-model="content"  :config="editorConfig"></ckeditor>
                                </div>
                                <div class="col-md-2 text-end">
                                    <button class="btn btn-outline-primary mt-2"
                                        @click="ContetnUpdate(this.content_id)"><i class='bx bx-sync'></i>ອັບເດດ</button>
                                </div>
                            </div>
                        </div>
                        <input type="file" ref="images" multiple @change="previewImages" class="form-control">
                        <div class="row g-2 my-3">
                            <div class="col-md-6 col-lg-3 col-sm-3 mb-12 mb-3" v-for="(image, index) in images"
                                :src="image.preview" :key="index">
                                <div class="card h-100">
                                    <i class='bx bxs-message-square-x i' @click="del(image.id)"></i>
                                    <img class="card-img-top" :src="image.preview" alt="Image Preview" v-if="image.preview">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5 me-1" :disabled="disable"><i class='bx bx-cloud-upload me-1'></i>ອັບໂຫຼດຮູບພາບ</button>
                        <button type="button" class="btn btn-danger mt-5" v-if="this.images.length > 1"
                            @click="Clear()"><i class='bx bx-revision me-1'></i>Clear</button>
                    </form>
                    <form v-if="FormType">
                        <div class="row g-2 my-3">
                            <div class="col-md-6 col-lg-3 col-sm-3 mb-12 mb-3" v-for="(image, index) in images"
                                :src="image.preview" :key="index">
                                <div class="card h-100">
                                    <i class='bx bxs-message-square-x i' @click="del(image.id)"></i>
                                    <button type="button" class="btn" @click="editImages(image.id)" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        <img class="card-img-top" :src="('assets/img/images/' + image.images)"
                                            alt="Image Previe data" v-if="('assets/img/images/' + image.images)">
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger mt-5" v-if="this.images.length > 1"
                            @click="Clear()"><i class='bx bx-revision me-1'></i>Clear</button>
                    </form>
                    <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        @click="Clear()"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12 d-flex justify-content-center">
                                            <button type="button" class="btn" @click="Upload()">
                                                <img :src="image_preview" alt="" style="width:100%;" />
                                            </button>
                                            <div class="">
                                                <input type="file" class="form-control" style="display:none" ref="file"
                                                    @change="onSelected">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="button" class="btn btn-primary"
                                        @click="update(this.Id_img)"><i class='bx bx-sync'></i>ອັບເດດ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row g-2 mb-5">
                        <div class="row" v-if="isLoggin">
                            <div class="col-md-4">
                                <h4>ຈຳນວນຮູບທີ່ເລືອກ {{ selectedItems.length }} ຮູບ</h4>
                            </div>
                            <div class="col-md-8 d-flex justify-content-end">
                                <button @click="EditSelectedItems" class="btn btn-success me-2"
                                    :disabled="disableBtn_del"><i class='bx bx-edit me-1'></i>ແກ້ໄຂ</button>
                                <button @click="deleteSelectedItems" class="btn btn-danger"
                                    :disabled="disableBtn_del"><i class='bx bx-trash-alt me-1'></i>ລົບຮູບ</button>
                            </div>
                        </div>
                        <div class="form-check my-3 ms-2" v-if="this.imglength >= 2 && this.isLoggin">
                            <input class="form-check-input" type="checkbox" v-model="selectAll" @change="selectAllItems">
                            <label class="form-check-label" for="defaultCheck3">
                                ເລືອກທັງໝົດ
                            </label>
                        </div>
                        <div v-if="!isLoggin">
                            <ckeditor :editor="editor" id="editor"   v-model="content"></ckeditor>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-3 mb-12 mb-3" v-for="itemImg in GetImage.data"
                            :key="itemImg.id">
                            <div class="card h-100">
                                <input class="form-check-input my-2 mx-2" type="checkbox" v-model="selectedItems"
                                    :value="itemImg.id" v-if="isLoggin">
                                <a :href="('assets/img/images/' + itemImg.images)">
                                <img class="card-img-top" :src="('assets/img/images/' + itemImg.images)"
                                    alt="Card image cap">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div v-if="this.imglength == 0">
                            <div class="d-flex align-items-centet justify-content-center">
                                <div class="spinner-border spinner-border-md text-primary me-2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>ກຳລັງໂຫຼດຂໍ້ມູນ........
                            </div>
                        </div>
                        <pagination v-if="GetImage.last_page > 1" :pagination="GetImage" :offset="4"
                            @paginate="GetData($event)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import pagination from '../../components/Paginate.vue';
export default {
    name: 'WorkspaceJsonStudy',

    data() {
        return {
            editor : ClassicEditor,
            show_error: false,
            text_error: '',
            content: '',
            content_id: '',
            img: [],
            images: [],
            GetImage: [],
            selectedItems: [],
            imglength: '',
            FormType: false,
            Id_img: '',
            image_preview: window.location.origin + '/assets/img/logo/preview.JPG',
            img_product: ''
        };
    },
    components: {
        pagination
    },

    methods: {
        onSelected(event) {
            // console.log(event.target.files[0]);
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
        previewImages() {
            let files = this.$refs.images.files;
            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                this.images.push({
                    id: i,
                    file: file,
                    preview: URL.createObjectURL(file)
                });
            }
        },
        ContetnUpdate(id) {
            if (this.content == '') {
                this.text_error = "ກະລຸນາປ້ອນເນື້ອຫາ",
                    this.show_error = true
            } else {
                this.show_error = false
                this.$axios.post(`api/study/update/content/${id}`, { content: this.content }).then((response) => {
                    this.GetData()
                }).catch((error) => {
                    console.log(error);
                })
            }
        },
        uploadImages() {
            if (this.content == '') {
                this.text_error = "ກະລຸນາປ້ອນເນື້ອຫາ",
                    this.show_error = true
            } else {
                this.show_error = false
                let formData = new FormData();
                formData.append('contents', this.content)
                for (let i = 0; i < this.images.length; i++) {
                    formData.append('images[]', this.images[i].file);
                }
                this.$axios.post('api/study/add', formData, { headers: { "Content-Type": "multipart/form-data" } }).then(response => {
                    if (response.data.success) {
                        this.$swal({
                            position: 'center',
                            icon: 'success',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        this.images = []
                        this.$refs.images.value = null
                        this.GetData();
                    } else {
                        this.$swal({
                            position: 'center',
                            icon: 'error',
                            title: response.data.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                }).catch(error => {
                    console.log(error)
                });

                this.images = []
                this.content = ""
            }

        },
        del(id) {
            this.images.splice(this.images.map((i) => i.id).indexOf(id), 1);
            this.selectedImages.length = ""
        },
        Clear() {
            this.FormType = false
            this.img_product = ''
            this.images = []
            this.$refs.images.value = null
            this.selectedItems = []
        },
        GetData(page) {
            this.$axios.get(`api/study/getAll?page=${page}`).then((response) => {
                this.GetImage = response.data
                this.imglength = this.GetImage.data.length
                this.content = response.data.data[0].Contents
                this.content_id = response.data.data[0].id
            }).catch((error) => {
                console.log(error)
            })
        },
        selectAllItems() {
            if (this.selectAll) {
                this.selectedItems = [...this.GetImage.data.map(item => item.id)]
            } else {
                this.selectedItems = []
            }
        },
        deleteSelectedItems() {
            this.$swal({
                title: 'ທ່ານຕ້ອງການອອກລົບແທ້ບໍ່?',
                //   text: "ທ່ານຈະບໍ່ສາມາດກູ້ຄືນຂໍ້ມູນອັນນີ້ໄດ້ເມື່ອລົບໄປແລ້ວ!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ຕົກລົງ',
                cancelButtonText: 'ປະຕິເສດ'
            }).then((result) => {
                if (result.isConfirmed) {
                    if (this.selectedItems.length > 0) {
                        this.$axios.post('api/study/deleteSelectedItems', { ids: this.selectedItems })
                            .then((response) => {

                                if (response.success = true) {
                                    this.$swal({
                                        position: 'top-center',
                                        icon: 'success',
                                        title: "ລົບຂໍ້ມູນສຳເລັດ",
                                        showConfirmButton: false,
                                        timer: 3000
                                    })
                                }
                                this.items = this.items.data.filter(item => !this.selectedItems.includes(item.id))
                                this.selectedItems = []

                            }).catch((error) => {
                                console.log(error);
                            })
                        this.GetData()
                        this.selectedItems = []
                    }
                } else {
                    this.selectedItems = []
                }
            });


        },
        editImages(id) {
            this.Id_img = id
            $("#modalCenter").modal("show");
            console.log("This is Update Images" + id);
            this.$axios.get('api/study/edit/' + id).then((response) => {
                if (response.data.images) {
                    this.image_preview = window.location.origin + '/assets/img/images/' + response.data.images
                } else {
                    this.image_preview
                }
            }).catch((error) => {
                console.log(error);
            })
        },
        update(id) {
            $("#modalCenter").modal("hide");
            this.images = []
            this.FormType = false

            let Data = new FormData()
            Data.append("file", this.img_product);
            Data.append("content", this.content);

            this.$axios.post(`api/study/update/${id}`, Data, { headers: { "content-Type": "multipart\form-data" } }).then((response) => {
                if (response.data) {
                    this.$swal({
                        position: 'center',
                        icon: 'success',
                        title: response.data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    this.GetData()
                }
            }).catch((error) => {
                console.log(error);
            })

        },
        EditSelectedItems() {
            this.FormType = true
            this.$axios.post('api/study/EditSelectedItems', { ids: this.selectedItems })
                .then((response) => {
                    this.images = response.data
                }).catch((error) => {
                    console.log(error);
                })
            this.selectedItems = []
        }
    },
    created() {
        this.GetData()
        if (window.Laravel.isLoggin) {
            this.isLoggin = true;
        } else {
            this.isLoggin = false;
            $(document).ready(function(){
                    let ckeditor = document.getElementsByClassName("ck ck-sticky-panel__content")[0]
                        ckeditor.style.display = 'none'
            })
        }
    },
    computed: {
        selectAll: {
            get() {
                return this.selectedItems.length === this.imglength
            },
            set(value) {
                this.selectedItems = value ? this.GetImage.data.map(item => item.id) : []
            }
        },
        disable() {
            if (this.images == 0) {
                return true;
            } else {
                return false;
            }
        },
        disableBtn_del() {
            if (this.selectedItems == 0) {
                return true;
            } else {
                return false;
            }
        }
    }
};
</script>

<style lang="scss" scoped></style>