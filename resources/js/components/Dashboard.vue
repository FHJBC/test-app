<template>
  <div class="dashboard-container">
    <h2>Dashboard</h2>
    <h1>Welcome {{ user.info.name }}, <a @click="logout" class="custom-link">Logout</a></h1>
    <h2>Below is the list of your Subjects: </h2>
    <ul>
      <li v-for="subject in userSubjects" :key="subject.id">{{ subject.name }}</li>
    </ul>
  </div>
</template>

<script>
import { onMounted, ref } from 'vue';
import { mapGetters, useStore } from 'vuex';

export default {
  setup() {
    const store = useStore();
    const user = ref(store.state.user);

    // Fetch user's subjects on component mount
    onMounted(async () => {
      // Dispatch an action to fetch user's subjects
      await store.dispatch('fetchUserSubjects');
    });

    const logout = () => {
      // Dispatch the logout action
      store.dispatch('logout');
    };

    return { user, logout };
  },

  // Access the userSubjects getter using computed
  computed: {
    ...mapGetters(['userSubjects'])
  }
};
</script>

<style scoped>
.dashboard-container {
  margin: 50px 10px;
}

.custom-link {
  text-decoration: none;
  cursor: pointer;
  color: blue;
  font-size: 30px;
  font-weight: bold;
  margin-left: auto;
}
</style>
