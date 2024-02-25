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
                    <a
                        href="#"
                        class="text-sm font-semibold leading-6 text-gray-900"
                    >
                        Show More
                        <span aria-hidden="true">&rarr;</span></a
                    >
                </div>
            </div>
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 mt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
            >
                <article
                    v-for="post in props?.category?.post?.slice(0, 3)"
                    :key="post?.id"
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <img
                        class="border border-slate-200 rounded-2xl"
                        :src="post?.media?.url"
                        :alt="post?.title"
                    />
                    <div class="flex items-center gap-x-4 text-xs mt-8">
                        <time :datetime="post?.date" class="text-gray-500">{{
                            post?.date
                        }}</time>
                        <a
                            :href="post?.category?.href"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >{{ post?.category?.title }}</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a :href="post?.href">
                                <span class="absolute inset-0" />
                                {{ post?.title }}
                            </a>
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
                                <a :href="`/author/${post?.user?.username}`">
                                    <span class="absolute inset-0" />
                                    {{ post?.user?.name }}
                                </a>
                            </p>
                            <p class="text-gray-600">
                                {{
                                    $helpers.capitalizeFirstLetter(
                                        post?.user?.role
                                    )
                                }}
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    category: Object,
});
</script>
