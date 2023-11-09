<template>
    <div class="login-container">
        <main>
            <h2 class="login-title">Login</h2>
            <form @submit.prevent="login" class="login-form">
                <div class="login-input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" v-model="email" required>
                </div>
                <div class="login-input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" v-model="password" required>
                </div>
                <div class="login-input-group">
                    <button type="submit">Login</button>
                </div>
            </form>
        </main>
    </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';
import { useStore } from 'vuex';

export default {
    name: 'LoginComponent',
    setup() {
        const email = ref('');
        const password = ref('');
        const store = useStore();

        const login = async () => {
            try {
                const response = await axios.post('/api/login', {
                    email: email.value,
                    password: password.value,
                });

                console.log(response.data.user);
                // Assuming the response contains user data, store it in Vuex
                store.commit('SET_USER', response.data.user);

                // Store the access token in local storage
                localStorage.setItem('access_token', response.data.access_token);

                // Redirect to the '/dashboard' route
                store.dispatch('redirect', { path: '/dashboard' });
            } catch (error) {
                console.error('Login failed', error);
            }
        };

        return { email, password, login };
    },
};
</script>

<style scoped>
.login-container {
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

main {
    width: 100%;
}

.login-title {
    margin: 0;
    text-align: center;
    font-size: 25px;
}

.login-form {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 10px;
}

.login-input-group {
    display: flex;
    flex-direction: column;
    gap: 5px;
    width: 60%;
}

.login-input-group label {
    font-size: 18px;
}

.login-input-group input,
button {
    padding: 5px;
}

button {
    border: none;
    cursor: pointer;
}
</style>
