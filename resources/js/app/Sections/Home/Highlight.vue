<template>
    <div class="bg-white py-24 sm:py-32 -mt-32 min-h-screen">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-between sticky z-40">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2
                        class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        {{ $helpers.capitalizeFirstLetter(props.category?.name) }}
                    </h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum.
                    </p>
                </div>
                <div class="flex lg:flex-1 lg:justify-end mt-3 lg:mt-0">
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
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                    <Card
                        v-for="(post, key) in props.category?.post?.slice(0,3)"
                        :key="post?.id"
                        :post="post"
                        class="flex max-w-xl flex-col items-start justify-between"
                    />
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'
import Card from "../../Components/Card/Card.vue";

const props = defineProps({
    category: Object
})
</script>
