import {createWebHistory,createRouter} from "vue-router";
import { useStorage } from "vue3-storage";
const storage = useStorage();
import Home from '../pages/Home.vue'
import Activity from '../pages/Activity.vue'
import music from '../pages/general/music.vue'
import drawing from '../pages/general/drawing.vue'
import dance from '../pages/general/dance.vue'
import everonment from '../pages/general/everonment.vue'
import food from '../pages/general/food.vue'
import basketball from '../pages/general/basketball.vue'
import volleyball from '../pages/general/volleyball.vue'
import football from '../pages/general/football.vue'
import people from '../pages/interesting/people.vue'
import study from '../pages/interesting/study.vue'
import visitor from '../pages/interesting/visitor.vue'
import contact from '../pages/Contact.vue'
import haakkeosound from '../pages/haakkeosound.vue'
import register from '../pages/register.vue'
import acount from '../pages/acount.vue'
import teach from '../pages/general/teaching.vue'
export const routes = [
    {
        name : "Home Pages",
        path : "/",
        component : Home
    },
    {
        name : "Home Page",
        path : "/home",
        component : Home
    },
    {
        name : "Activity Page",
        path : "/Act",
        component : Activity
    },
    {
        name : "Music Pages",
        path : "/music",
        component : music
    },
    {
        name : "Drawing Pages",
        path : '/drawing',
        component : drawing
    },
    {
        name : "Dance Pages",
        path : '/dance',
        component : dance
    },
    {
        name : "Enveronment Pages",
        path : '/environment',
        component : everonment
    },
    {
        name : "Food Pages",
        path : '/food',
        component : food
    },
    {
        name : "Basketball Pages",
        path : '/basketball',
        component : basketball
    },
    {
        name : "Volleyball Pages",
        path : '/volleyball',
        component : volleyball
    },
    {
        name : "Football Pages",
        path : '/football',
        component : football
    },
    {
        name : "Contact Pages",
        path : '/contact',
        component : contact
    },
    {
        name : "People Pages",
        path : '/people',
        component : people
    },
    {
        name : "Study Pages",
        path : '/study',
        component : study
    },
    {
        name : "Visitor Pages",
        path : '/visitor',
        component : visitor
    },
    {
        name : "Register Pages",
        path : '/register',
        component : register
    },
    {
        name : "Acount Pages",
        path : '/acount',
        component : acount
    },
    {
        name : "Page Haakkeosound",
        path : "/haakkeosound",
        component : haakkeosound
    },
    {
        name : "Page Teach",
        path : "/Teach",
        component : teach
    }
]

const router = createRouter({
    history : createWebHistory(),
    routes : routes,
    scrollBehavior(){
      window.scrollTo(0,0)
  }

});


export default router