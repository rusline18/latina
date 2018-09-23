<template>
    <div>
        <router-link to="/">Авторизация</router-link>
        <router-link to="/registration">Регистрация</router-link>
        <form @submit.prevent="onSubmit">
            <div>
                <label for="username">Логин</label>
                <input type="text" id="username" name="username" class="form-control" v-model.trim="username">
            </div>
            <div>
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" class="form-control" v-model.trim="password">
            </div>
            <button class="btn btn-primary" type="submit" v-show="showButton">Войти</button>
        </form>
        <router-link to="/forgout-password">Забыли пароль</router-link>

    </div>
    <!--<v-app>-->
        <!--<v-content>-->
            <!--<div>-->
                <!--<div class="authorization">-->
                    <!--<div>-->
                        <!--<v-tabs-->
                                <!--color="teal"-->
                                <!--centered-->
                                <!--dark-->
                                <!--icons-and-text-->
                        <!--&gt;-->
                            <!--<v-tabs-slider color="yellow"></v-tabs-slider>-->

                            <!--<v-tab href="#login">-->
                                <!--Авторизация-->
                                <!--<v-icon>lock_open</v-icon>-->
                            <!--</v-tab>-->

                            <!--<v-tab href="#registration">-->
                                <!--Регистрация-->
                                <!--<v-icon>how_to_reg</v-icon>-->
                            <!--</v-tab>-->

                            <!--<v-tab-item id="login">-->
                                <!--<v-card flat>-->
                                    <!--<v-card-text><Login/></v-card-text>-->
                                <!--</v-card>-->
                            <!--</v-tab-item>-->

                            <!--<v-tab-item id="registration">-->
                                <!--<v-card flat>-->
                                    <!--<v-card-text><Registration/></v-card-text>-->
                                <!--</v-card>-->
                            <!--</v-tab-item>-->
                        <!--</v-tabs>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</v-content>-->
    <!--</v-app>-->
</template>

<script>
    // import Login from './TheLoginComponent';
    // import Registration from './TheRegistrationComponent';
    export default {
        name: "AppComponent",
        data () {
            return {
                username: '',
                password: '',
                error: {
                    username: false,
                    password: false
                }
            }
        },
        computed: {
            showButton: function () {
                return this.username !== '' && this.password !== '';
            }
        },
        methods: {
            onSubmit: function () {
                if(!this.error.username && !this.error.password) {

                }
            }
        }
        // components: {
        //     Login,
        //     Registration
        // }
    }
</script>

<style scoped>

</style>