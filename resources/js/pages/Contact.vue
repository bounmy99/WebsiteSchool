<template>
    <div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card-body">
                <div class="mb-2 d-flex justify-content-between" v-if="isLoggin">
                    <button class="btn btn-warning" v-if="data_lenngth < 1" @click="show_form()">
                        <i class="bx bx-plus-circle me-1"></i>
                        ເພີ່ມຂໍ້ມູນ
                    </button>
                    <button class="btn btn-info ms-2" @click="edit_form(this.c_id)">
                        <i class="bx bxs-edit me-1"></i>
                        ແກ້ໄຂ
                    </button>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-primary text-white mb-3">
                            <div class="card-header">
                                <i class="bx bx-map fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">ທີ່ຢູ່</h5>
                                <p class="card-text">
                                    {{ this.address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-secondary text-white mb-3">
                            <div class="card-header">
                                <i class="bx bx-phone fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">ເບີໂທຕິດຕໍ່</h5>
                                <p class="card-text">
                                    {{ this.phone_number }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-4">
                        <div class="card bg-info text-white mb-3">
                            <div class="card-header">
                                <i class="bx bx-envelope fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">ອີເມວ</h5>
                                <p class="card-text">
                                    {{ this.email }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card bg-warning text-white mb-3">
                            <div class="card-header">
                                <i class="bx bxl-facebook-circle fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Facebook</h5>
                                <a href="https://www.facebook.com/people/Haakkeo-Eshlj-Thongkang/100008421045224/">
                                    <p class="text-white">
                                        {{ this.facebook }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card bg-success text-white mb-3">
                            <div class="card-header">
                                <i class="bx bxl-whatsapp fs-1"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-white">Whatsaap</h5>
                                <a href="http://wa.me/5589 5588" target="_blank">
                                    <p class="text-white">
                                        {{ this.whatsapp }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-12 co-ms-12">
                        <div class="card shadow-none bg-transparent border border-primary mb-3">
                            <div class="card-body">
                                <iframe class="mb-4 mb-lg-0"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3795.959666010427!2d102.62373071488406!3d17.934035087753177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd25bd5d231f7a827!2zMTfCsDU2JzAyLjUiTiAxMDLCsDM3JzMzLjMiRQ!5e0!3m2!1sen!2sla!4v1661758542079!5m2!1sen!2sla"
                                    frameborder="0" style="border: 0; width: 100%; height: 384px"
                                    allowfullscreen=""></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" style="display: none" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="d-flex justify-content-center">
                            <h3 v-if="!FormType">ແບບຟອມບັນທຶກຂໍ້ມູນ</h3>
                            <h3 v-if="FormType">ແບບຟອມແກ້ໄຂຂໍ້ມູນ</h3>
                        </div>
                        <div class="row">
                            <div class="alert alert-danger text-center" role="alert" v-if="show_error">
                                {{ text_error }}
                            </div>
                            <form class="mb-3">
                                <h5 class="card-header fw-bold mb-3">ໂລໂກ້ຂອງໂຮງຮຽນ</h5>
                                <div class="row">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img :src="preview_logo" height="100" width="100" id="uploadedAvatar" />
                                        <div class="button-wrapper mt-2">
                                            <label for="upload" class="btn btn-success me-2 mb-4" tabindex="0"
                                                @click="UploadLogo()">
                                                <span class="d-none d-sm-block">ເລືອກຮູບພາບໃໝ່</span>
                                                <i class="bx bx-image-add d-block d-sm-none"></i>
                                                <input type="file" ref="files" @change="onSelectedLogo"
                                                    class="account-file-input" hidden="" accept="image/png, image/jpeg" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label for="NameSchool" class="form-label fw-bold">ຊື່ຂອງໂຮງຮຽນ</label>
                                        <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ໂຮງຮຽນ"
                                            v-model="NameSchool" />
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label for="address" class="form-label fw-bold">ທີ່ຢູ່</label>
                                        <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນທີ່ຢູ່"
                                            v-model="address" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label for="email" class="form-label fw-bold">ອີເມວ</label>
                                        <input type="email" class="form-control" v-model="email"
                                            placeholder="ກະລຸນາປ້ອນອີເມວ" />
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label for="tel" class="form-label fw-bold">ເບີໂທ</label>
                                        <input type="tel" class="form-control" v-model="phone_number"
                                            placeholder="ກະລຸນາປ້ອນເບີໂທ" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label class="facebook fw-bold" for="password">ຊື່ເຟສບຸກ</label>
                                        <input type="text" class="form-control" v-model="facebook"
                                            placeholder="ກະລຸນາປ້ອນຊື່ເຟສບຸກ" />
                                    </div>
                                    <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                                        <label class="facebook fw-bold" for="password">ເບີວອດແອັບ</label>
                                        <input type="text" class="form-control" v-model="whatsapp"
                                            placeholder="ກະລຸນາປ້ອນເບີວອດແອັບ" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" @click="save()">
                            <i class="bx bx-upload me-1"></i>ອັບເດດ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "WorkspaceJsonContact",

    data() {
        return {
            c_id: "",
            data_lenngth: "",
            FormType: false,
            show_error: false,
            text_error: "",
            address: "",
            email: "",
            phone_number: "",
            facebook: "",
            whatsapp: "",
            preview_logo: window.location.origin + "/assets/img/logo/preview.JPG",
            NameSchool: "",
            imagesLogo: "",
        };
    },

    mounted() { },

    methods: {
        onSelectedLogo(event) {
            // console.log(event.target.files[0]);
            this.imagesLogo = event.target.files[0];
            let reader = new FileReader();
            reader.readAsDataURL(this.imagesLogo);
            reader.addEventListener(
                "load",
                function () {
                    this.preview_logo = reader.result;
                }.bind(this),
                false
            );
        },
        UploadLogo() {
            this.$refs.files.click();
        },
        show_form() {
            this.FormType = false;
            (this.NameSchool = ""),
                (this.imagesLogo = ""),
                (this.address = ""),
                (this.email = ""),
                (this.phone_number = ""),
                (this.facebook = ""),
                (this.whatsapp = ""),
                (this.text_error = ""),
                (this.show_error = false),
                $("#modal").modal("show");
        },
        edit_form(id) {
            (this.NameSchool = ""),
                (this.imagesLogo = ""),
                (this.address = ""),
                (this.email = ""),
                (this.phone_number = ""),
                (this.facebook = ""),
                (this.whatsapp = ""),
                (this.text_error = ""),
                (this.show_error = false),
                (this.FormType = true);
            $("#modal").modal("show");
            this.$axios
                .get(`api/contact/edit/${id}`)
                .then((response) => {
                    this.email = response.data.email;
                    this.phone_number = response.data.phone_number;
                    this.facebook = response.data.facebook;
                    this.whatsapp = response.data.whatsapp;
                    this.address = response.data.address;
                    this.NameSchool = response.data.name_school;
                    if (response.data.logo) {
                        this.preview_logo =
                            window.location.origin + "/assets/img/logo/" + response.data.logo;
                    } else {
                        this.preview_logo =
                            window.location.origin + "/assets/img/logo/preview.JPG";
                    }
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        save() {
            if (
                this.address == "" ||
                this.phone_number == "" ||
                this.email_address == "" ||
                this.facebook == "" ||
                this.whatsapp == "" ||
                this.NameSchool == ""
            ) {
                (this.show_error = true),
                    (this.text_error = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ");
            } else {
                $("#modal").modal("hide");
                (this.show_error = false), (this.text_error = "");

                if (this.FormType) {
                    let Data = new FormData();
                    Data.append("NameSchool", this.NameSchool);
                    Data.append("file", this.imagesLogo);
                    Data.append("address", this.address);
                    Data.append("phone_number", this.phone_number);
                    Data.append("email", this.email);
                    Data.append("facebook", this.facebook);
                    Data.append("whatsapp", this.whatsapp);

                    this.$axios
                        .post(`api/contact/update/${this.c_id}`, Data, {
                            headers: { "Content-Type": "multipart/form-data" },
                        })
                        .then((response) => {
                            if (response.data.success == true) {
                                this.$swal({
                                    title: response.data.message,
                                    position: "center",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                } else {
                    let Data = new FormData();
                    Data.append("NameSchool", this.NameSchool);
                    Data.append("file", this.imagesLogo);
                    Data.append("address", this.address);
                    Data.append("phone_number", this.phone_number);
                    Data.append("email", this.email);
                    Data.append("facebook", this.facebook);
                    Data.append("whatsapp", this.whatsapp);
                    this.$axios
                        .post("api/contact/add", Data)
                        .then((response) => {
                            this.$swal({
                                title: response.data.message,
                                position: "center",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                }
            }
        },
    },

    created() {
        this.$axios
            .get("api/contact")
            .then((response) => {
                this.c_id = response.data[0].id;
                this.email = response.data[0].email;
                this.phone_number = response.data[0].phone_number;
                this.facebook = response.data[0].facebook;
                this.whatsapp = response.data[0].whatsapp;
                this.address = response.data[0].address;
                this.NameSchool = response.data[0].name_school;
                this.imagesLogo = response.data[0].logo;
                this.data_lenngth = response.data.length;
            })
            .catch((error) => {
                console.log(error);
            });

        if (window.Laravel.isLoggin) {
            this.isLoggin = true;
        } else {
            this.isLoggin = false;
        }
    },
};
</script>

<style lang="scss" scoped></style>
