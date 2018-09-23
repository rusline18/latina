
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import routes from './routes';
import Auth from './state';
// import Vuetify from 'vuetify';
import VueRouter from 'vue-router';


// Vue.use(Vuetify);


Vue.use(VueRouter);

const router = new VueRouter({
    routes
});

router.beforeEach((to, from, next) => {
   if (to.matched.some(record => record.meta.requiresAuth) && !Auth.loggedIn) {
       next({
           path: '/',
       });
   } else {
       next();
   }
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

new Vue({
    router
}).$mount('#app');
