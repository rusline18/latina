<template>
    <div>
        <router-link to="/">Авторизация</router-link>
        <router-link to="/registration">Регистрация</router-link>
        <form @submit.prevent="onsubmit">
            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" v-model.trim="email">
                <p class="text-danger" v-if="error">Некорректный email</p>
            </div>
            <button class="btn btn-primary" v-show="showButton">Отправить</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: "ForgoutPasswordComponent",
        data () {
            return {
                email: '',
                error: false
            }
        },
        computed: {
            showButton: function () {
                return this.email !== '';
            }
        },
        methods: {
            onSubmit: function () {
                let RegExp = this.email.search(/[a-zA-Z0-9]@[a-zA-Z0-9]/i);
                this.error = RegExp < 0;
                if(!this.error) {

                }
            }
        }
    }
</script>

<style scoped>

</style>