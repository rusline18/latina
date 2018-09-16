
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import App from './components/AppComponent';
import Vuetify from 'vuetify'

Vue.use(Vuetify);

// window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('application-component', require('./components/LoginComponent.vue'));

new Vue({
    el: '#app',
    template: '<App/>',
    components: { App }
});