<template>
    <v-form v-model="valid">
        <v-text-field
                v-model="login"
                prepend-icon="person"
                :rules="loginRules"
                label="Логин"
                required
                clearable
        >
        </v-text-field>
        <v-text-field
                v-model="password"
                prepend-icon="lock"
                :rules="passwordRules"
                :type="'password'"
                label="Пароль"
                required
                clearable
        >
        </v-text-field>
        <v-checkbox
                v-model="checkbox"
                label="Запомнить меня"
        ></v-checkbox>
        <v-btn color="success">Войти</v-btn>
    </v-form>
</template>

<script>
    export default {
        name: "TheLoginComponent",
        data () {
            return {
                valid: true,
                login: '',
                loginRules: [
                    function (v) {
                        return !!v || 'Логин обязательное поле'
                    }
                ],
                password: '',
                passwordRules: [
                    function (v) {
                        return !!v || 'Пароль обязательное поле'
                    }
                ],
                checkbox: false

            }
        },
        methods: {
            submit () {
                alert(this.$refs.form.validate());
            }
        }
    }
</script>

<style scoped>

</style>