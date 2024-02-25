<template>
    <article class="flex max-w-xl flex-col items-start justify-between">
        <img
            class="border border-slate-200 rounded-2xl"
            :src="post?.media?.url"
            :alt="post?.title"
        />
        <div class="flex items-center gap-x-4 text-xs mt-8">
            <time :datetime="post?.date" class="text-gray-500">{{
                moment(props.post?.date).format("MMMM Do YYYY")
            }}</time>
            <Link
                :href="`/${props.post?.category?.slug}`"
                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                >{{
                    $helpers.capitalizeFirstLetter(props.post?.category?.name)
                }}</Link
            >
        </div>
        <div class="group relative">
            <h3
                class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
            >
                <Link :href="`/${props.post?.slug}`">
                    {{ props.post?.title }}
                </Link>
            </h3>
            <p
                class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600 font-light"
            >
                {{ post?.content }}
            </p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
            <img
                :src="post?.user?.image_url"
                alt=""
                class="h-10 w-10 rounded-full bg-gray-50"
            />
            <div class="text-sm leading-6">
                <p class="font-semibold text-gray-900">
                    {{ post?.user?.name }}
                </p>
                <p class="text-gray-600">
                    {{ $helpers.capitalizeFirstLetter(post?.user?.role) }}
                </p>
            </div>
        </div>
    </article>
</template>

<script setup>
import moment from "moment";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    post: {
        type: Object,
        required: true,
    },
});
</script>
