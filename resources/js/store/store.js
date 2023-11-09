import axios from 'axios';
import {
    createStore
} from 'vuex';
import router from '../router/router';
import * as types from './mutation_types';

const store = createStore({
    state: {
        user: {
            info: null,
            subjects: null
        },
    },
    mutations: {
        [types.SET_USER](state, user) {
            state.user.info = user;
        },
        [types.SET_USER_SUBJECTS](state, subjects) {
            state.user.subjects = subjects;
        },
    },
    actions: {
        async fetchUserSubjects({
            commit
        }) {
            try {
                const response = await axios.get('/api/user/subjects');
                commit('SET_USER_SUBJECTS', response.data);
            } catch (error) {
                console.error('Failed to fetch user subjects', error);
            }
        },
        logout({
            commit,
            dispatch
        }) {

            // Remove the access_token from local storage
            localStorage.removeItem('access_token');

            dispatch('redirect', {
                path: '/login'
            });
        },
        redirect(_, {
            path
        }) {
            // Redirect to the specified path using Vue Router
            router.push(path);
        },
    },

    getters: {
        isAuthenticated: (state) => {
            return state.user !== null;
        },
        userSubjects: (state) => {
            return state.user ? state.user.subjects : [];
        },
    },
});

export default store;
