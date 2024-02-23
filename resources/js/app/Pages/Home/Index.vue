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
import HomeLayout from "../../Layout/Home.vue";
import Hero from "../../Sections/Home/Hero.vue";
import Marketing from "../../Sections/Home/Marketing.vue";
import Lifestyle from "../../Sections/Home/Lifestyle.vue";
import Technology from "../../Sections/Home/Technology.vue";
import Newsletter from "../../Sections/Home/Newsletter.vue";
</script>
