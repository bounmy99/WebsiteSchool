<template>
    <div class="container d-flex justify-content-center">
    <div class="authentication-wrapper authentication-basic container-p-y col-md-4 col-sm-12 col-lg-4">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="alert alert-danger text-center" role="alert" v-if="show_error">{{ text_error }}</div>
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                  <h3 class="app-brand-text demo text-body fw-bolder">ລົງທະບຽນ</h3>
              </div>
              <!-- /Logo -->
             
              <form @submit.prevent="register" class="mb-3">
                <div class="mb-3">
                  <label for="name" class="form-label">ຊື່ຜູ້ໃຊ້</label>
                  <input type="name" class="form-control" v-model="name"  placeholder="ກະລຸນາປ້ອນຊື່ຜູ້ໃຊ້" autofocus="">
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">ອີເມວ</label>
                  <input type="email" class="form-control" v-model="email"  placeholder="ກະລຸນາປ້ອນອີເມວ" autofocus="">
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">ລະຫັດຜ່ານ</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password"  class="form-control" v-model="password"  placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ">
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">ຢືນຢັນລະຫັດຜ່ານ</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password"  class="form-control" v-model="cpassword"  placeholder="ກະລຸນາປ້ອນລະຫັດຜ່ານ">
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">ສະໝັກ</button>
                </div>
              </form>

              <p class="text-center">
                <span>ມີບັນຊີແລ້ວກົດ</span>
                <router-link to="/login">
                  <span>ບ່ອນນີ້</span>
                </router-link>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
    </div>
    </div>
</template>

<script>
export default {
    name: 'WorkspaceJsonLogin',

    data() {
        return {
            name : '',
            email : '',
            password : '',
            cpassword : '',
            show_error : false,
            text_error : ''
        };
    },

    mounted() {
        
    },

    methods: {
        register(){
            if(this.name == '' || this.email == '' || this.password==''){
                this.show_error = true;
                this.text_error = "ກະລຸນາປ້ອນຂໍ້ມູນໃຫ້ຄົບຖ້ວນ"
            }else{
                if(this.cpassword != this.password){
                    this.show_error = true;
                    this.text_error = "ລະຫັດບໍ່ກົງກັນ"
                }else{
                    this.show_error = false;
                    this.text_error = ""

                    this.$axios.post('api/register',{
                        name : this.name,
                        email : this.email,
                        password : this.password
                    }).then((response)=>{
                        if(response.success = true){
                            this.$router.push('/login')
                        }
                    }).catch((error)=>{
                        console.log(error);
                    })
                }
            }
        }
    },
};
</script>

<style lang="scss" scoped>

</style>