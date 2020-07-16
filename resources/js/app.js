/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('Summary', require('./components/SummaryComponent.vue').default);
Vue.component('Home', require('./components/HomeComponent.vue').default);
Vue.component('Subscribe', require('./components/SubscribeComponent.vue').default);
Vue.component('SingleCountryComponent', require('./components/SingleCountryComponent.vue').default);
Vue.component('Diagnosis', require('./components/DiagnosisComponent.vue').default);
Vue.component('PageNotFound', require('./components/404/PageNotFound.vue').default);

//base layouts
Vue.component('App', require('./components/Layouts/App.vue').default);
Vue.component('Header', require('./components/Layouts/Header.vue').default);
Vue.component('Footer', require('./components/Layouts/Footer.vue').default);


import Vue from 'vue'
import router from './router'

import Summary from './components/SummaryComponent';
import Home from './components/HomeComponent';
import Subscribe from './components/SubscribeComponent';
import SingleCountryComponent from './components/SingleCountryComponent';
import PageNotFound from './components/404/PageNotFound';

//base layouts
import App from './components/Layouts/App';
import Header from './components/Layouts/Header';
import Footer from './components/Layouts/Footer';

//vue library components
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import Chartkick from 'vue-chartkick';
import Chart from 'chart.js';

Vue.component('v-select', vSelect);
Vue.use(Chartkick.use(Chart));

const app = new Vue({
    el: '#main',
    components: {
        Summary,
        Home,
        App,
        Header,
        Footer,
        Subscribe,
        SingleCountryComponent,
        PageNotFound
    },
    router
}).$mount('#main');
