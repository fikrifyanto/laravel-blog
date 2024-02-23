<template>
    <Header />
    <slot />
    <Footer />
    <Popup />
</template>

<script setup>
import Header from "../Sections/Home/Header.vue";
import Footer from "../Sections/Home/Footer.vue";
import Popup from "../Components/Popup.vue";
</script>
