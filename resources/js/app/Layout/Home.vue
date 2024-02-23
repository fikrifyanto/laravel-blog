<template>
    <Header />
    <slot />
    <Newsletter />
    <Footer />
    <Popup />
</template>

<script setup>
import Header from "../Sections/Home/Header.vue";
import Footer from "../Sections/Home/Footer.vue";
import Newsletter from "../Sections/Home/Newsletter.vue";
import Popup from "../Components/Popup.vue";
</script>
