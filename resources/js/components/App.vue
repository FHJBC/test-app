<template>
    <main>
        <router-view></router-view>
    </main>
</template>

<script>

export default {
    name: 'App',
};

</script>

<style scoped>
.custom-link {
    text-decoration: none;
    cursor: pointer;
    color: blue;
    font-size: 30px;
    font-weight: bold;
    margin-left: auto;
}
</style>
