import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent'
import InformationComponent from './components/InformationComponent'
import SingleCountryComponent from './components/SingleCountryComponent'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: HomeComponent },
        { path: '/information', component: InformationComponent },
        { path: '/countries/:country', name:'countries', component: SingleCountryComponent },
        // { path: "*", component: PageNotFound }
    ],
    mode: 'history'
});