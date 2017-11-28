
// app.js

import Vue from 'vue';

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios, axios);

import App from './components/App.vue';
import Example from './components/Example.vue';
import CreateFailure from './components/CreateFailure.vue';
import DisplayFailure from './components/DisplayFailure.vue';
import EditFailure from './components/EditFailure.vue';

const routes = [
    {
        name: 'CreateFailure',
        path: '/failures/create',
        component: CreateFailure
    },
    {
        name: 'DisplayFailure',
        path: '/',
        component: DisplayFailure
    },
    {
        name: 'EditFailure',
        path: '/edit/:id',
        component: EditFailure
    }
];

const router = new VueRouter({ mode: 'history', routes: routes });
new Vue(Vue.util.extend({ router }, App)).$mount('#app');