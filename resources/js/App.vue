<template>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <!-- <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" v-if="isLoggin"> -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <router-link to="/home" class="app-brand-link">
            <span class="app-brand-logo demo">
              <img :src="('assets/img/logo/' + this.logo)" alt="" width="40" height="40">
            </span>
            <span class="app-brand-text fs-4 menu-text fw-bolder ms-2">{{this.name_school}}</span>
          </router-link>
          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx bx-chevron-left bx-sm align-middle" @click="Close_SideBar()"></i>
          </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1" :class="overflow">
          <!-- Dashboards -->
          <li class="menu-item" :class="Main1">
            <router-link to="/home" class="menu-link" @click="Menu1()">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Dashboards">ກອງຂໍ້ມູນແລະຂ່າວສານ</div>
            </router-link>
          </li>

          <li class="menu-item" :class="Main2">
            <router-link to="/Act" class="menu-link" @click="Menu2()">
              <i class='menu-icon tf-icons bx bxs-universal-access'></i>
              <div data-i18n="Layouts">ກິດຈະກຳຕ່າງໆ</div>
            </router-link>
          </li>
          <li class="menu-item" :class="Main5">
            <router-link to="/Teach" class="menu-link" @click="Menu5()">
              <i class='menu-icon tf-icons bx bx-book'></i>
              <div data-i18n="Layouts">ການຮຽນການສອນ</div>
            </router-link>
          </li>

          <li class="menu-item" :class="MainM1">
            <a href="javascript:void(0);" class="menu-link menu-toggle" @click="MainM_1()">
              <i class='menu-icon tf-icons bx bx-shape-circle'></i>
              <div data-i18n="Users">ຊົມລົມຕ່າງໆ</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item" :class="Main1Ms1">
                <router-link to="/music" class="menu-link" @click="fmenu1(1)">
                  <div data-i18n="music">ຊົມລົມດົນຕຣີ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms3">
                <router-link to="/drawing" class="menu-link" @click="fmenu1(3)">
                  <div data-i18n="Edit">ຊົມລົມແຕ້ມຮູບ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms4">
                <router-link to="/dance" class="menu-link" @click="fmenu1(4)">
                  <div data-i18n="Preview">ຊົມລົມເຕັ້ນ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms5">
                <router-link to="/environment" class="menu-link" @click="fmenu1(5)">
                  <div data-i18n="List">ຊົມລົມສິ່ງແວດລ້ອມ</div>
                </router-link>
              </li>

              <li class="menu-item" :class="Main1Ms7">
                <router-link to="/food" class="menu-link" @click="fmenu1(7)">
                  <div data-i18n="Kanban">ຊົມລົມອາຫານ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms8">
                <router-link to="/basketball" class="menu-link" @click="fmenu1(8)">
                  <div data-i18n="Calendar">ຊົມລົມບານບ້ວງ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms9">
                <router-link to="/volleyball" class="menu-link" @click="fmenu1(9)">
                  <div data-i18n="Chat">ຊົມລົມບານສົ່ງ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main1Ms10">
                <router-link to="/football" class="menu-link" @click="fmenu1(10)">
                  <div data-i18n="Chat">ຊົມລົມບານເຕະ</div>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="menu-item" :class="MainM2">
            <a href="javascript:void(0);" class="menu-link menu-toggle" @click="MainM_2()">
              <i class="menu-icon tf-icons bx bx-check-shield"></i>
              <div data-i18n="Roles & Permissions">ສິ່ງທີ່ນ່າສົນໃຈ</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item" :class="Main2Ms1">
                <router-link to="/people" class="menu-link" @click="fmenu2(1)">
                  <div data-i18n="Roles">ຄົນດີຂອງໝູ່</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main2Ms2">
                <router-link to="/study" class="menu-link" @click="fmenu2(2)">
                  <div data-i18n="Permission">ຄົນດີຮຽນເກັ່ງ</div>
                </router-link>
              </li>
              <li class="menu-item" :class="Main2Ms3">
                <router-link to="/visitor" class="menu-link" @click="fmenu2(3)">
                  <div data-i18n="Permission">ແຂກມາຢ້ຽມຢາມ</div>
                </router-link>
              </li>
            </ul>
          </li>
          <li class="menu-item" :class="Main4">
            <router-link to="/haakkeosound" class="menu-link" @click="Menu4()">
              <i class='menu-icon tf-icons bx bxs-speaker'></i>
              <div data-i18n="Layouts">Haakkeo Sound Crew</div>
            </router-link>
          </li>
          <li class="menu-item" :class="Main3">
            <router-link to="/contact" class="menu-link" @click="Menu3()">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">ການຕິດຕໍ່ພົວພັນ</div>
            </router-link>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <!-- <nav  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" v-if="isLoggin"> -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm" @click="Open_SideBar()"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online" v-if="!isLoggin">
                    <img :src="img_url" alt="" class="w-px-40 h-auto rounded-circle" />
                  </div>
                  <div class="avatar avatar-online" v-if="isLoggin">
                    <img :src="img_url" alt="" class="w-px-40 h-auto rounded-circle" v-if="!this.UserName.image" />
                    <img :src="'assets/img/profileimages/' + this.UserName.image" alt=""
                      class="w-px-40 h-auto rounded-circle" v-if="this.UserName.image" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online" v-if="!isLoggin">
                            <!-- <img :src="img_url" alt="" class="w-px-40 h-auto rounded-circle" v-if="!this.UserName.image"> -->
                            <!-- <img :src="('assets/img/profileimages/'+this.UserName.image)" alt="" class="w-px-40 h-auto rounded-circle" v-if="this.UserName.image"> -->
                            <img :src="img_url" alt="" class="w-px-40 h-auto rounded-circle" />
                          </div>
                          <div class="avatar avatar-online" v-if="isLoggin">
                            <img :src="'assets/img/profileimages/' +
                              this.UserName.image
                              " alt="" class="w-px-40 h-auto rounded-circle" v-if="this.UserName.image" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block" v-if="isLoggin">{{
                            this.UserName.name
                          }}</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <router-link class="dropdown-item" to="/acount" v-if="isLoggin">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">ຂໍ້ມູນສ່ວນຕົວ</span>
                    </router-link>
                    <!-- <router-link class="dropdown-item" to="/login" v-if="!isLoggin">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">ເຂົ້າສູ່ລະບົບ</span>
                    </router-link> -->
                    <button class="dropdown-item" @click="login_form()" v-if="!isLoggin">
                      <i class='bx bx-log-in-circle me-2'></i>
                      <span class="align-middle">ເຂົ້າສູ່ລະບົບ</span>
                    </button>
                  </li>
                  <li v-if="isLoggin">
                    <div class="dropdown-divider"></div>
                  </li>
                  <li v-if="isLoggin">
                    <button class="dropdown-item" @click="logout()">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">ອອກຈາກລະບົບ</span>
                    </button>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <router-view></router-view>
          <!-- / Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->

  <div class="modal fade" id="modalCenter" tabindex="-1" style="display: none" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <div class="d-flex justify-content-center">
            <img :src="('assets/img/logo/logo.gif')" alt="" width="100" height="100">
          </div>
          <div class="d-flex justify-content-center">
            <h3>ເຂົ້າສູ່ລະບົບ</h3>
          </div>
          <div class="row">
            <div class="alert alert-danger text-center" role="alert" v-if="show_error">{{ text_error }}</div>

            <form @submit.prevent="login" class="mb-3">
              <div class="mb-3">
                <label for="email" class="form-label">ອີເມວ</label>
                <input type="email" class="form-control" v-model="email" placeholder="ກະລຸນາປ້ອນອີເມວ" autofocus="">
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">ລະຫັດຜ່ານ</label>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" class="form-control" v-model="password" placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ">
                </div>
              </div>
            </form>

          </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
          <button type="button" class="btn btn-primary" @click="login">ເຂົ້າສູ່ລະບົບ</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "WorkspaceJsonApp",

  data() {
    return {
      email: '',
      password: '',
      show_error: false,
      text_error: '',
      logo : '',
      name_school : '',
// Button 
      Main1: "",
      Main2: "",
      MainM1: "",
      Main1Ms1: "",
      Main1Ms2: "",
      Main1Ms3: "",
      Main1Ms4: "",
      Main1Ms5: "",
      Main1Ms6: "",
      Main1Ms7: "",
      Main1Ms8: "",
      Main1Ms9: "",
      Main1Ms10: "",
      MainM2: "",
      Main2Ms1: "",
      Main2Ms2: "",
      Main2Ms3: "",
      Main3: "",
      Main4: "",
      Main5: "",
      UserName: "",
      overflow: "",
      img_url:
        "data:image/jpeg;base64,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",
    };
  },

  mounted() { },

  methods: {
    login_form() {
      $("#modalCenter").modal("show");
    },
    login() {
      if (this.email == '' || this.password == '') {
        this.show_error = true;
        this.text_error = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບ";
      } else {
        this.$axios.post('api/login', {
          email: this.email,
          password: this.password
        }).then((response) => {
          if (response.data.success == true) {
            this.$storage.setStorageSync("isLoggin", true)
            this.$router.go('/home')
          } else {
            this.show_error = true;
            this.text_error = response.data.message;
          }
        }).catch((error) => {
          console.log(error);
        })
      }

    },
    logout() {
      this.$swal({
        title: "ທ່ານຕ້ອງການອອກຈາກລະບົບແທ້ບໍ່?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "ຕົກລົງ",
        cancelButtonText: "ປະຕິເສດ",
      }).then((result) => {
        if (result.isConfirmed) {
            this.$axios
              .post("/api/logout")
              .then((response) => {
                if (response.data.success == true) {
                  this.$swal({
                    position : "center",
                    title : "ອອກລະບົບສຳເລັດ",
                    icon :"success",
                    showCancelButton : false,
                    showConfirmButton : false,
                    timer : 1000
                  })
                  this.$storage.setStorageSync("isLoggin", false)
                  // this.$router.go("/home");
                  window.location.href ="/home";
                }
              })
              .catch((error) => {
                console.log(error);
              });
        }
      });
    },
    Close_SideBar() {
      document.body.classList.remove("layout-menu-expanded");
      this.overflow = "";
    },
    Open_SideBar() {
      if (screen.width < 1400) {
        document.body.classList.add("twocolumn-panel", "layout-menu-expanded");
        this.overflow = "overflow-auto";
      } else {
        document.documentElement.getAttribute("data-sidebar-size");
        document.documentElement.setAttribute("data-sidebar-size", "sm");
        document.documentElement.setAttribute("data-sidebar-size", "md");
        document.documentElement.setAttribute("data-sidebar-size", "lg");
      }
    },
    MainM_1() {
      this.MainM1 ? (this.MainM1 = '') : (this.MainM1 = 'open active'),
        (this.overflow = 'overflow-auto'),
        (this.Main5 = ''),
        (this.Main4 = ''),
        (this.Main3 = ''),
        (this.Main2 = ''),
        (this.Main1 = ''),
        (this.MainM2 = '')
    },
    MainM_2() {
      this.MainM2 ? (this.MainM2 = '') : (this.MainM2 = 'open active'),
        (this.Main5 = ''),
        (this.Main4 = ''),
        (this.Main3 = ''),
        (this.Main2 = ''),
        (this.Main1 = ''),
        (this.MainM1 = '')
    },
    Menu1() {
      this.Main1 ? (this.Main1 = "") : (this.Main1 = "active"),
        (this.Main2 = ""),
        (this.Main3 = ""),
        (this.Main4 = ""),
        (this.Main5 = ""),
        (this.MainM1 = ""),
        (this.MainM2 = "");
        (this.Main1Ms1 = ""),
        (this.Main1Ms2 = ""),
        (this.Main1Ms3 = ""),
        (this.Main1Ms4 = ""),
        (this.Main1Ms5 = ""),
        (this.Main1Ms6 = ""),
        (this.Main1Ms7 = ""),
        (this.Main1Ms8 = ""),
        (this.Main1Ms9 = ""),
        (this.Main1Ms10 = ""),
        (this.Main2Ms1 = ""),
        (this.Main2Ms2 = ""),
        (this.Main2Ms3 = "")
      document.body.classList.remove("layout-menu-expanded");
    },
    Menu2() {
      this.Main2 ? (this.Main2 = "") : (this.Main2 = "active"),
        (this.Main1 = ""),
        (this.Main3 = ""),
        (this.Main4 = ""),
        (this.Main5 = ""),
        (this.MainM1 = ""),
        (this.MainM2 = ""),
        (this.Main1Ms1 = ""),
        (this.Main1Ms2 = ""),
        (this.Main1Ms3 = ""),
        (this.Main1Ms4 = ""),
        (this.Main1Ms5 = ""),
        (this.Main1Ms6 = ""),
        (this.Main1Ms7 = ""),
        (this.Main1Ms8 = ""),
        (this.Main1Ms9 = ""),
        (this.Main1Ms10 = ""),
        (this.Main2Ms1 = ""),
        (this.Main2Ms2 = ""),
        (this.Main2Ms3 = "")
      document.body.classList.remove("layout-menu-expanded");
    },
    Menu3() {
      this.Main3 ? (this.Main3 = "") : (this.Main3 = "active"),
        (this.Main4 = ""),
        (this.Main5 = ""),
        (this.Main2 = ""),
        (this.Main1 = ""),
        (this.MainM1 = ""),
        (this.MainM2 = "");
        (this.Main1Ms1 = ""),
        (this.Main1Ms2 = ""),
        (this.Main1Ms3 = ""),
        (this.Main1Ms4 = ""),
        (this.Main1Ms5 = ""),
        (this.Main1Ms6 = ""),
        (this.Main1Ms7 = ""),
        (this.Main1Ms8 = ""),
        (this.Main1Ms9 = ""),
        (this.Main1Ms10 = ""),
        (this.Main2Ms1 = ""),
        (this.Main2Ms2 = ""),
        (this.Main2Ms3 = "")
      document.body.classList.remove("layout-menu-expanded");
    },
    Menu4() {
      this.Main4 ? (this.Main4 = "") : (this.Main4 = "active"),
        (this.Main3 = ""),
        (this.Main2 = ""),
        (this.Main1 = ""),
        (this.Main5 = ""),
        (this.MainM1 = ""),
        (this.MainM2 = "");
        (this.Main1Ms1 = ""),
        (this.Main1Ms2 = ""),
        (this.Main1Ms3 = ""),
        (this.Main1Ms4 = ""),
        (this.Main1Ms5 = ""),
        (this.Main1Ms6 = ""),
        (this.Main1Ms7 = ""),
        (this.Main1Ms8 = ""),
        (this.Main1Ms9 = ""),
        (this.Main1Ms10 = ""),
        (this.Main2Ms1 = ""),
        (this.Main2Ms2 = ""),
        (this.Main2Ms3 = "")
      document.body.classList.remove("layout-menu-expanded");
    },
    Menu5() {
      this.Main5 ? (this.Main5 = "") : (this.Main5 = "active"),
        (this.Main4 = ""),
        (this.Main3 = ""),
        (this.Main2 = ""),
        (this.Main1 = ""),
        (this.MainM1 = ""),
        (this.MainM2 = "");
        (this.Main1Ms1 = ""),
        (this.Main1Ms2 = ""),
        (this.Main1Ms3 = ""),
        (this.Main1Ms4 = ""),
        (this.Main1Ms5 = ""),
        (this.Main1Ms6 = ""),
        (this.Main1Ms7 = ""),
        (this.Main1Ms8 = ""),
        (this.Main1Ms9 = ""),
        (this.Main1Ms10 = ""),
        (this.Main2Ms1 = ""),
        (this.Main2Ms2 = ""),
        (this.Main2Ms3 = "")
      document.body.classList.remove("layout-menu-expanded");
    },

    fmenu1(id) {
      switch (id) {
        case 1:
          this.Main1Ms1 = "active"
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 2:
          this.Main1Ms1 = ""
          this.Main1Ms2 = "active"
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 3:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = "active"
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 4:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = "active"
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 5:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = "active"
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 6:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = "active"
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 7:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = "active"
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 8:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = "active"
          this.Main1Ms9 = ""
          this.Main1Ms10 = ""
          break;
        case 9:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = "active"
          this.Main1Ms10 = ""
          break;
        case 10:
          this.Main1Ms1 = ""
          this.Main1Ms2 = ""
          this.Main1Ms3 = ""
          this.Main1Ms4 = ""
          this.Main1Ms5 = ""
          this.Main1Ms6 = ""
          this.Main1Ms7 = ""
          this.Main1Ms8 = ""
          this.Main1Ms9 = ""
          this.Main1Ms10 = "active"
          break;

        default:
          break;
      }
      document.body.classList.remove("layout-menu-expanded");
    },
    fmenu2(id) {
      switch (id) {
        case 1:
          this.Main2Ms1 = "active"
          this.Main2Ms2 = ""
          this.Main2Ms3 = ""
          break;
        case 2:
          this.Main2Ms1 = ""
          this.Main2Ms2 = "active"
          this.Main2Ms3 = ""
          break;
        case 3:
          this.Main2Ms1 = ""
          this.Main2Ms2 = ""
          this.Main2Ms3 = "active"
          break;
        default:
          break;
      }
      document.body.classList.remove("layout-menu-expanded");
    }
  },
  created() {

    this.$axios.get('api/contact').then((response)=>{
      this.name_school = response.data[0].name_school;
      this.logo = response.data[0].logo;
    }).catch((error)=>{
      console.log(error);
    })
    // console.log("Status1 :" + window.Laravel.isLoggin);
    // console.log("Status2 :" + this.$storage.getStorageSync("isLoggin"));

    this.UserName = window.Laravel.user;

    if (window.Laravel.isLoggin) {

      this.isLoggin = true;
    } else {
      this.isLoggin = false;
      document.body.classList.remove("layout-menu-expanded");
    }
  }
};

</script>


<style>
    .logo{
        outline: none; 
        border: none; 
        background:none;
    }
    .img{
        width: 40%;
        height: 40%;
    }
    .img:hover{
        opacity: 0.7;
    }
</style>