import {
    createApp
} from 'vue';
import '../css/app.css';
// import './bootstrap';
import App from './components/App.vue';

import axios from 'axios';
import router from './router/router';
import store from './store/store';


function getTokenFromStorage() {
    // Retrieve the access token from local storage
    const token = localStorage.getItem('access_token');

    return token;
}

// Add the token to the Axios headers for authenticated requests
axios.interceptors.request.use(
    (config) => {
        const token = getTokenFromStorage();
        console.log("token: " + token);
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    (error) => {
        return Promise.reject(error);
    }
);

const app = createApp(App);

app.use(store);
app.use(router);


app.mount('#app');
