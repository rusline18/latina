import App from './components/AppComponent';
import Registration from './components/RegistrationComponent';
import ForgoutPassword from './components/ForgoutPasswordComponent';
import Home from './components/ExampleComponent';

export default [
    {
        path: '/',
        component: App
    },
    {
        path: '/registration',
        component: Registration
    },
    {
        path: '/forgout-password',
        component: ForgoutPassword
    },
    {
        path: '/home',
        component: Home,
        // meta: {
        //     requiresAuth: true
        // }
    }
];