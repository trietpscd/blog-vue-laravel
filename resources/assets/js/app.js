import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import App from './App.vue'
import Content from './components/Content.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'content',
            component: Content
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },

		{
            path: '/register',
            name: 'register',
            component: Register
        },

    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});