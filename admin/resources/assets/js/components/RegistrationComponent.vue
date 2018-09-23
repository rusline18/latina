<template>
    <div>
        <router-link to="/">Авторизация</router-link>
        <router-link to="/registration">Регистраация</router-link>
        <input type="hidden" name="_token" :value="csrf">
        <div>
            <label for="username">Логин</label>
            <input type="text" id="username" name="username" class="form-control" v-model.trim="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" class="form-control" v-model.trim="email">
            <p class="text-danger" v-if="error.email">Некорректный email</p>
        </div>
        <div>
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="email" class="form-control" v-model.trim="phone">
        </div>
        <div>
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" class="form-control" v-model.trim="password">
            <p class="text-danger" v-if="error.password">Пароль должен быть больше 6 символов</p>
        </div>
        <div>
            <label for="confirm">Подтверждение пароль</label>
            <input type="password" id="confirm" name="password-confirm" class="form-control" v-model.trim="confirm">
            <p class="text-danger" v-if="error.confirm">Подтверждение пароля не соответствует</p>
        </div>
        <button class="btn btn-primary" v-show="showButton" @click="onSubmit">Войти</button>
    </div>
</template>

<script>
    import request from '../storage'
    export default {
        name: "RegistrationComponent",
        data () {
            return {
                username: '',
                password: '',
                phone: '',
                confirm: '',
                email: '',
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                error: {
                    username: false,
                    phone: false,
                    email: false,
                    password: false,
                    confirm: false
                }
            }
        },
        computed: {
            showButton: function () {
                return this.username !== '' && this.email !== '' && this.password !== '' && this.phone !== '';
            }
        },
        methods: {
            onSubmit: function () {
                let error = this.error;
                let RegExp = this.email.search(/[a-zA-Z0-9]@[a-zA-Z0-9]/i);
                error.password = this.password.length < 6;
                error.email = RegExp < 0;
                error.confirm = this.password !== this.confirm;
                if(!error.email && !error.password && !error.confirm) {
                    let data = {
                        name: this.username,
                        phone: this.phone,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.confirm,
                        _token: this.csrf
                    };
                    request.registration(data);
                }
            }
        }
    }
</script>

<style scoped>

</style>