<template>
    <div class="bg-white py-24 sm:py-32 lg:-mt-32 min-h-screen">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0 text-center">
                <h2
                    class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                >
                    {{ $helpers.capitalizeFirstLetter(props.category?.name) }}
                </h2>
                <p class="mt-2 text-lg leading-8 text-gray-600 font-light">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Porro, exercitationem.
                </p>
                <div class="flex lg:flex-1 justify-center mt-3">
                    <Link
                        :href="`/category/${props.category?.slug}`"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        Show More
                        <span aria-hidden="true">&rarr;</span></Link
                    >
                </div>
            </div>
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 mt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <CardImage
                    v-for="(post, key) in props.category?.post?.slice(0, 3)"
                    :key="post?.id"
                    :post="post"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import CardImage from "../../Components/Card/CardImage.vue";

const props = defineProps({
    category: Object,
});
</script>
