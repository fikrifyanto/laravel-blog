<template>
    <Header />
    <slot />
    <Footer />
    <Popup />
</template>

<script setup>
import Header from "../Components/Home/Header.vue";
import Footer from "../Components/Home/Footer.vue";
import Popup from "@/app/Components/Popup.vue";
</script>
