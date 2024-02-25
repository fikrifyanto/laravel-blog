<template>
    <HomeLayout :menus="menus">
        <Hero />
        <template v-for="(category, key) in props.topCategories">
            <Highlight :category="category" v-if="key == 0" />
            <HighlightImage :category="category" v-else />
        </template>
    </HomeLayout>
</template>

<script setup>
import HomeLayout from "../../Layout/Home.vue";
import Hero from "../../Sections/Home/Hero.vue";
import Highlight from "../../Sections/Home/Highlight.vue";
import HighlightImage from "../../Sections/Home/HighlightImage.vue";

const props = defineProps({
    topCategories: Array
})

const menus = props.topCategories.map((category) => {
    return category.name
})
</script>
