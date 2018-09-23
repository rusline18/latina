import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
import Auth from './state';

const Http = axios.create({
    baseURL: `${window.location.origin}/api/`
});

Vue.use(Vuex);

export default {
    registration: function(data){
        console.log(data);
        Http.post('/register', data)
            .then(function (response){
                Auth.login();
                console.log(Auth.loggedIn);
                console.log(response);
            })
            .catch(function (error) {
                console.error(error.response.data);
            });
    },
    login: function (data) {
        Http.post('/login', data)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.error(error);
            })
    },
    forgout: function (data) {
        Http.post('/forgout-password', data)
            .then(function (response) {
                console.log(response)
            })
            .catch(function (error) {
                console.error(error)
            });
    },
    logout: function () {
        return Auth.logout();
    }
};