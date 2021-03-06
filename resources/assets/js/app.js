import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';
import VueAxios from 'vue-axios';

Vue.use(VueRouter)
Vue.use(VueAxios, axios);

import App from './App.vue'
import Content from './components/Content.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
import PostList from './components/posts/List.vue'
import PostView from './components/posts/View.vue'
import PostUpdate from './components/posts/Update.vue'
import PostCreate from './components/posts/Create.vue'  

axios.defaults.baseURL = 'http://localhost:8000/api'

export const eventBus = new Vue()

const router = new VueRouter({
    // mode: 'history',
    routes: [{
        path: '/',
        name: 'content',
        component: Content
    },{
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },{
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },{
        path: '/posts',
        name: 'PostList',
        component: PostList,
        meta: {
            auth: true
        }
    },{
        path: '/posts/create',
        name: 'PostCreate',
        component: PostCreate,
        meta: {
            auth: true
        }
    },{
        path: '/posts/view/:id',
        name: 'PostView',
        component: PostView,
        meta: {
            auth: true
        }
    },{
        path: '/posts/update/:id',
        name: 'PostUpdate',
        component: PostUpdate,
        meta: {
            auth: true
        }
    }

    ]
});



Vue.router = router
Vue.use(require('@websanova/vue-auth'), {
   auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
   http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
   router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});
App.router = Vue.router

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});