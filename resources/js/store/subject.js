import axios from 'axios';
import {
    ref
} from 'vue';

const userSubjects = ref([]);

const fetchUserSubjects = async () => {
    try {
        const response = await axios.get('/api/user/subjects');
        userSubjects.value = response.data;
    } catch (error) {
        console.error('Failed to fetch user subjects', error);
    }
};

export {
    fetchUserSubjects,
    userSubjects
};
