<template>
    <v-app>
        <v-content>
            <div>
                <div class="authorization">
                    <div>
                        <v-tabs
                                color="teal"
                                centered
                                dark
                                icons-and-text
                        >
                            <v-tabs-slider color="yellow"></v-tabs-slider>

                            <v-tab href="#login">
                                Авторизация
                                <v-icon>lock_open</v-icon>
                            </v-tab>

                            <v-tab href="#registration">
                                Регистрация
                                <v-icon>how_to_reg</v-icon>
                            </v-tab>

                            <v-tab-item id="login">
                                <v-card flat>
                                    <v-card-text><Login/></v-card-text>
                                </v-card>
                            </v-tab-item>

                            <v-tab-item id="registration">
                                <v-card flat>
                                    <v-card-text><Registration/></v-card-text>
                                </v-card>
                            </v-tab-item>
                        </v-tabs>
                    </div>
                </div>
            </div>
        </v-content>
    </v-app>
</template>

<script>
    import Login from './TheLoginComponent';
    import Registration from './TheRegistrationComponent';
    export default {
        name: "AppComponent",
        components: {
            Login,
            Registration
        }
    }
</script>

<style scoped>

</style>