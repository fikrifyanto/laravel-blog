<template>
    <HomeLayout>
        <Hero />
        <Marketing />
        <Lifestyle />
        <Technology />
        <Newsletter />
    </HomeLayout>
</template>

<script setup>
import HomeLayout from "../Layout/Home.vue";
import Hero from "../Components/Home/Hero.vue";
import Marketing from "../Components/Home/Marketing.vue";
import Lifestyle from "../Components/Home/Lifestyle.vue";
import Technology from "../Components/Home/Technology.vue";
import Newsletter from "../Components/Home/Newsletter.vue";
</script>
