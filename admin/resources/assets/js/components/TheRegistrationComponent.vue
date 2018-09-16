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
        <v-text-field
                v-model="email"
                prepend-icon="email"
                :rules="emailRules"
                label="Email"
                clearable
        ></v-text-field>
        <v-text-field
                v-model="phone"
                prepend-icon="phone"
                :rules="phoneRules"
                label="Телефон"
                mask="8(###)###-##-##"
                required
                clearable
        ></v-text-field>
        <v-btn color="success">Зарегестрировать</v-btn>
    </v-form>
</template>

<script>
    export default {
        name: "TheRegistrationComponent",
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
                email: '',
                emailRules: [
                    function (v) {
                        return (/.+@.+./.test(v) || 'Email не валидный')
                    }
                ],
                phone: '',
                phoneRules: [
                    function (v) {
                        return !!v || 'Телефон обязательное поле'
                    },
                    function (v) {
                        return v && v.length === 11 || 'Телефон не корректный'
                    }
                ]
            }
        }
    }
</script>

<style scoped>

</style>