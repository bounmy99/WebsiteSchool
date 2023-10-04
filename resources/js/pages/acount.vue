<template>
  <div class="container-xxl flex-grow-1 container-p-y" v-if="isLoggin">
    <div class="card mb-4">
      <h5 class="card-header fw-bold">ຂໍ້ມູນບັນຊີ</h5>
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <img :src="image_preview" height="100" width="100" id="uploadedAvatar" />
          <div class="button-wrapper">
            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0" @click="Upload()">
              <span class="d-none d-sm-block"><i class="bx bx-image-add me-1"></i>ເລືອກຮູບພາບໃໝ່</span>
              <i class="bx bx-image-add d-block d-sm-none"></i>
              <input type="file" ref="file" @change="onSelected" class="account-file-input" hidden=""
                accept="image/png, image/jpeg" />
            </label>
          </div>
        </div>
      </div>
      <hr class="my-0" />
      <div class="card-body">
        <form @submit.prevent="update_data(this.User_id)">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">ຊື່ເຂົ້າໃຊ້</label>
              <input class="form-control" type="text" v-model="name" />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">ອີເມວ</label>
              <input class="form-control" type="email" v-model="email" />
            </div>
            <div class="mb-3 col-md-6">
              <small class="text-light fw-semibold d-block">ສະຖານະ</small>
              <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" v-model="status" value="1" />
                <label class="form-check-label" for="inlineRadio1">Supper Admin</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" v-model="status" value="2" />
                <label class="form-check-label" for="inlineRadio2">Admin</label>
              </div>
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-info me-2">
              <i class="bx bx-sync"></i>ອັບເດດ
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="card mb-4">
      <h5 class="card-header fw-bold">ລະຫັດຜ່ານ</h5>
      <hr class="my-0" />
      <div class="card-body">
        <form @submit.prevent="update_pass(this.User_id)">
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="firstName" class="form-label">ລະຫັດຜ່ານເກົ່າ</label>
              <input class="form-control" type="password" v-model="old_password" placeholder="................." />
            </div>
            <div class="mb-3 col-md-6">
              <label for="email" class="form-label">ລະຫັດຜ່ານໃໝ່</label>
              <input class="form-control" type="password" v-model="new_password" placeholder="................." />
            </div>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">
              <i class="bx bxs-key me-1"></i>ອັບເດດລະຫັດຜ່ານ
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="card" v-if="isLoggin && this.UserName.status == 1">
      <div class="d-flex justify-content-between">
        <h5 class="card-header">ຕາຕະລາງຈັດການຂໍ້ມູນ</h5>
        <div>
          <button type="button" class="btn btn-secondary me-3 mt-3" @click="show_form()">
            <i class="bx bx-plus"></i>
          </button>
        </div>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>ລຳດັບ</th>
              <th>ຮູບພາບ</th>
              <th>ຊື່ຜູ້ໃຊ້</th>
              <th>ອີເມວ</th>
              <th>ສະຖານະ</th>
              <th class="d-flex justify-content-center">
                ຈັດການ
              </th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr v-for="list in data_user" :key="list.id">
              <td>{{ list.id }}</td>
              <td>
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li v-if="!list.image" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                    <img :src="image_preview" alt="Avatar" class="rounded-circle" />
                  </li>
                  <li v-if="list.image" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="Lilian Fuller">
                    <img :src="'assets/img/profileimages/' +
                      list.image
                      " alt="Avatar" class="rounded-circle" />
                  </li>
                </ul>
              </td>
              <td>{{ list.name }}</td>
              <td>{{ list.email }}</td>
              <td>
                <span class="badge bg-label-primary me-1">{{
                  list.status
                }}</span>
              </td>
              <td class="d-flex justify-content-center">
                <button class="btn btn-primary me-1" @click="edit_form(list.id)">
                  <i class="bx bx-edit-alt me-1"></i>
                </button>
                <button class="btn btn-danger" @click="delete_user(list.id)">
                  <i class="bx bx-trash me-1"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Model -->
    <div class="modal fade" id="modal" tabindex="-1" style="display: none" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="d-flex justify-content-center">
              <h3 v-if="!this.FormType">ແບບຟອມບັນທຶກຂໍ້ມູນ</h3>
              <h3 v-if="this.FormType">ແບບຟອມແກ້ໄຂຂໍ້ມູນ</h3>
            </div>
            <div class="row">
              <div class="alert alert-danger text-center" role="alert" v-if="show_error">
                {{ text_error }}
              </div>
              <form class="mb-3">
                <h5 class="card-header fw-bold mb-3">ຮູບພາບ</h5>
                <div class="row">
                  <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img :src="preview_user" height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper mt-2">
                      <label for="upload" class="btn btn-success me-2 mb-4" tabindex="0" @click="UploadAdmin()">
                        <span class="d-none d-sm-block">ເລືອກຮູບພາບໃໝ່</span>
                        <i class="bx bx-image-add d-block d-sm-none"></i>
                        <input type="file" ref="files" @change="onSelectedAdmin" class="account-file-input" hidden=""
                          accept="image/png, image/jpeg,image/jpg" />
                      </label>
                    </div>
                  </div>
                </div>
                <hr class="my-3" />
                <div class="row">
                  <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                    <label for="email" class="form-label fw-bold">ອີເມວ</label>
                    <input type="email" class="form-control" v-model="email" placeholder="ກະລຸນາປ້ອນອີເມວ" />
                  </div>
                  <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                    <small class="text-light fw-semibold d-block">ສະຖານະ</small>
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" v-model="status" value="1" />
                      <label class="form-check-label" for="inlineRadio1">Supper Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" v-model="status" value="2" />
                      <label class="form-check-label" for="inlineRadio2">Admin</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                    <label for="password" class="form-label fw-bold">ລະຫັດຜ່ານ</label>
                    <input type="password" class="form-control" v-model="password" placeholder=".........." />
                  </div>
                  <div class="mb-3 col-lg-6 col-md-6 col-sm-12">
                    <label for="name" class="form-label fw-bold">ຊື່ຜູ້ໃຊ້</label>
                    <input type="text" class="form-control" placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້" v-model="name" />
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button type="button" class="btn btn-primary" @click="save()">
              <i class="bx bx-save me-1" v-if="!this.FormType"> ບັນທຶກ</i>
              <i class="bx bx-upload me-1" v-if="this.FormType"> ອັບເດດ</i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WorkspaceJsonAcount",

  data() {
    return {
      FormType: false,
      show_error: false,
      text_error: "",
      image_preview:
        window.location.origin + "/assets/img/logo/preview.JPG",
      preview_user:
        window.location.origin + "/assets/img/logo/preview.JPG",
      images_user: "",
      images: "",
      name: "",
      email: "",
      password: "",
      status: "",
      old_password: "",
      new_password: "",
      data_user: [],
      User_id: "",
      Id: ""
    };
  },

  methods: {
    onSelectedAdmin(event) {
      this.images_user = event.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(this.images_user);
      reader.addEventListener(
        "load",
        function () {
          this.preview_user = reader.result;
        }.bind(this),
        false
      );
    },
    UploadAdmin() {
      this.$refs.files.click();
    },
    show_form() {
      this.FormType = false,
        (this.email = ""), (this.name = ""), (this.status = ""),
        (this.imagesuser = "");
      $("#modal").modal("show");
    },
    save() {
      if (this.FormType) {
        if (
          this.name == "" ||
          this.email == "" ||
          this.password == "" ||
          this.status == ""
        ) {
          this.show_error = true;
          this.text_error = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ";
        } else {
          this.show_error = false;
          this.text_error = "";
          let user_data = new FormData();
          user_data.append("file", this.images_user);
          user_data.append("name", this.name);
          user_data.append("email", this.email);
          user_data.append("password", this.password);
          user_data.append("status", this.status);
          this.$axios
            .post(`api/user/update/${this.Id}`, user_data, {
              header: { "Content-type": "multipart/form-data" },
            })
            .then((response) => {
              if ((response.success = true)) {
                this.$swal({
                  position: "center",
                  title: response.data.message,
                  icon: "success",
                  showConfirmButton: false,
                  timer: 2000,
                });
              }
              $("#modal").modal("hide");
              this.getData();
            })
            .catch((error) => {
              console.log(error);
            });

        }
      } else {
        if (
          this.name == "" ||
          this.email == "" ||
          this.password == "" ||
          this.status == ""
        ) {
          this.show_error = true;
          this.text_error = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ";
        } else {
          this.show_error = false;
          this.text_error = "";
          let user_data = new FormData();
          user_data.append("file", this.images_user);
          user_data.append("name", this.name);
          user_data.append("email", this.email);
          user_data.append("password", this.password);
          user_data.append("status", this.status);
          this.$axios
            .post("api/register", user_data, {
              header: { "Content-type": "multipart/form-data" },
            })
            .then((response) => {
              if ((response.success = true)) {
                this.$swal({
                  position: "center",
                  title: response.data.message,
                  icon: "success",
                  showConfirmButton: false,
                  timer: 2000,
                });
              }
              this.getData();
              $("#modal").modal("hide");
            })
            .catch((error) => {
              console.log(error);
            });

           
        }
      }
    },
    getData() {
      this.$axios
        .get(`api/user`)
        .then((response) => {
          this.data_user = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    edit_form(id) {
      this.Id = id
      $("#modal").modal("show");
      this.FormType = true
      this.$axios.get(`api/user/edit/${this.Id}`).then((response) => {

        this.email = response.data.email;
        this.status = response.data.status;
        this.password = response.data.password;
        this.name = response.data.name;
        if (response.data.image) {
          this.preview_user = window.location.origin + "/assets/img/profileimages/" + response.data.image;
        } else {
          this.preview_user
        }
      }).catch((error) => {
        console.log(error);
      })
    },
    delete_user(id){

      this.$swal({
        title: "ທ່ານຕ້ອງການລົບແທ້ບໍ່?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ຕົກລົງ",
        cancelButtonText: "ຍົກເລີກ",
      }).then((result) => {
        if (result.isConfirmed) {
            this.$axios
              .post(`api/user/delete_user/${id}`)
              .then((response) => {
                if (response.data.success == true) {
                  this.$swal({
                    text: response.data.message,
                    icon : "success",
                    position : "center",
                    showCancelButton : false,
                    showConfirmButton : false,
                    timer : 2000
                  })
                  this.getData()
                }
              })
              .catch((error) => {
                console.log(error);
              });
        }
      });
    },

    //============================ ພາກສ່ວນຂໍ້ມູນຜູ້ໃຊ້ ===========================
    onSelected(event) {
      // console.log(event.target.files[0]);
      this.images = event.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(this.images);
      reader.addEventListener(
        "load",
        function () {
          this.image_preview = reader.result;
        }.bind(this),
        false
      );
    },
    Upload() {
      this.$refs.file.click();
    },
    Data_account() {
      this.$axios
        .get(`api/user/account`)
        .then((response) => {
          this.User_id = response.data[0].id;
          this.name = response.data[0].name;
          this.email = response.data[0].email;
          this.status = response.data[0].status;
          this.image_preview = response.data[0].image;
          if (response.data[0].image) {
            this.image_preview =
              window.location.origin +
              "/assets/img/profileimages/" +
              response.data[0].image;
          } else {
            this.image_preview =
              "https://i1.wp.com/www.groovejones.com/wp-content/uploads/2016/02/GrooveTech-Icons-Sharing.jpg?resize=200%2C200&ssl=1";
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    update_data(id) {
      let Data = new FormData();
      Data.append("name", this.name);
      Data.append("email", this.email);
      Data.append("status", this.status);
      Data.append("file", this.images);
      this.$axios
        .post(`api/user/account/update/${id}`, Data, {
          header: { "content-Type": "multipart/form-data" },
        })
        .then((response) => {
          if ((response.data.success = true)) {
            this.$swal({
              position: "center",
              title: response.data.message,
              icon: "success",
              showConfirmButton: false,
              timer: 2000,
            });
            this.Data_account();
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    update_pass(id) {
      if (this.old_password == "" || this.new_password == "") {
        this.$swal({
          postion: "top-center",
          icon: "error",
          title: "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ",
          showConfirmButton: false,
          timer: 2000,
        });
      } else {
        let Data = new FormData();
        Data.append("old_password", this.old_password);
        Data.append("new_password", this.new_password);
        this.$axios
          .post(`api/user/account/update/password/${id}`, Data)
          .then((response) => {
            if (response.data.success == true) {
              this.$swal({
                position: "center",
                title: response.data.message,
                icon: "success",
                showConfirmButton: false,
                timer: 2000,
              });
              this.Data_account();
              this.old_password = "";
              this.new_password = "";
            } else {
              this.$swal({
                postion: "top-center",
                icon: "error",
                title: response.data.message,
                showConfirmButton: false,
                timer: 2000,
              });
            }
          })
          .catch((error) => {
            console.log(error);
          });
      }
    },
  },
  created() {
    this.UserName = window.Laravel.user;
    if (window.Laravel.isLoggin) {
      this.isLoggin = true;
      } else {
      this.isLoggin = false;
      }
    this.getData();
    this.Data_account();
  },
};
</script>

<style lang="scss" scoped></style>
