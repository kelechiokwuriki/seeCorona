import Vue from 'vue';
import VueRouter from 'vue-router';

import HomeComponent from './components/HomeComponent'
import InformationComponent from './components/InformationComponent'
import SingleCountryComponent from './components/SingleCountryComponent'
import DiagnosisComponent from './components/DiagnosisComponent'

import PageNotFound from './components/404/PageNotFound'

Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',

    routes: [
        { path: '/', component: HomeComponent },
        { path: '/information', component: InformationComponent },
        { path: '/countries/:country', name:'countries', component: SingleCountryComponent },
        { path: '/diagnosis', name:'diagnosis', component: DiagnosisComponent },
        { path: "*", component: PageNotFound }
    ],
});
