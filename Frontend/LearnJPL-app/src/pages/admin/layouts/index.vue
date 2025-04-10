<template>
    <header_L />
    <keep-alive>
    <router-view></router-view>
    </keep-alive>
    <footer_L />
</template>
<script setup>
import footer_L from '../layouts/footer.vue'
import header_L from '../layouts/header.vue'
</script>