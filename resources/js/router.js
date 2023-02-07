import { createRouter, createWebHistory} from 'vue-router';

const route = new createRouter({
    history: createWebHistory(),

    routes:[
        {
            path: '/fruits',
            component: () => import ('./components/Fruit/Index.vue'),
            name: 'fruit.index'
        },
        {
            path: '/users/login',
            component: () => import ('./components/User/Login.vue'),
            name: 'user.login'
        },
        {
            path: '/users/registration',
            component: () => import ('./components/User/Registration.vue'),
            name: 'user.registration'
        },
    ]
})
export default route
