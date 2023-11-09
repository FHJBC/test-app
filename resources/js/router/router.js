import {
    createRouter,
    createWebHashHistory
} from 'vue-router';
import Dashboard from '../components/Dashboard.vue';
import Login from '../components/Login.vue';

const routes = [{
        path: '/',
        name: 'home',
        component: Login,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            requiresAuth: true
        },
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
})


function checkAuthenticationStatus() {
    // Retrieve the access token from local storage
    const token = localStorage.getItem('access_token');

    return token ? true : false;
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        // Check if the user is authenticated here (e.g., by checking for a valid token)
        const isAuthenticated = checkAuthenticationStatus(); // Implement this function

        if (isAuthenticated) {
            next();
        } else {
            next('/login');
        }
    } else {
        next();
    }
});

export default router;
