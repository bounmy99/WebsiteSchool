import './bootstrap';
import{createApp} from "vue";
import App from "./App.vue";
import axios from "axios";
import router from "./router";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Vue3Storage from "vue3-storage";
import CKEditor from '@ckeditor/ckeditor5-vue';


const app = createApp(App);
app.use(router);
app.use(CKEditor);
app.config.globalProperties.$axios = axios;
app.use(Vue3Storage, { namespace: "pro_" });
app.use(VueSweetalert2);
app.mount("#app-vue");  
