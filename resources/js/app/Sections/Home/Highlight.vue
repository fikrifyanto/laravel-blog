<template>
    <div class="bg-white py-24 sm:py-32 -mt-32 min-h-screen">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row justify-between sticky z-40">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2
                        class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        {{ $hlepers.capitalizeFirstLetter(props.category?.name) }}
                    </h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, voluptatum.
                    </p>
                </div>
                <div class="flex lg:flex-1 lg:justify-end mt-3 lg:mt-0">
                    <Link
                        :href="`/category/${props.category?.name}`"
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
                <article
                    v-for="(post, key) in props.category?.post?.slice(0,3)"
                    :key="post?.id"
                    class="flex max-w-xl flex-col items-start justify-between"
                >
                    <div class="flex items-center gap-x-4 text-xs">
                        <time :datetime="post?.datetime" class="text-gray-500">{{
                            post?.date
                        }}</time>
                        <a
                            :href="post?.category?.name"
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100"
                            >{{ post?.category?.name }}</a
                        >
                    </div>
                    <div class="group relative">
                        <h3
                            class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600"
                        >
                            <a :href="post?.slug">
                                <span class="absolute inset-0" />
                                {{ post?.title }}
                            </a>
                        </h3>
                        <p
                            class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600"
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
                                <a :href="post?.user?.href">
                                    <span class="absolute inset-0" />
                                    {{ post?.user?.name }}
                                </a>
                            </p>
                            <p class="text-gray-600">{{ $helpers.capitalizeFirstLetter(post?.user?.role) }}</p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

const props = defineProps({
    category: Object
})
</script>
