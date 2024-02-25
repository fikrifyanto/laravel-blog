<template>
    <HomeLayout :menus="menus">
        <div class="bg-white py-24 min-h-screen">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2
                        class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                    >
                        All Posts
                    </h2>
                    <p class="mt-2 text-lg leading-8 text-gray-600">
                        Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Fugiat, placeat.
                    </p>
                </div>
                <div
                    class="sticky z-40 mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                >
                    <Card
                        v-for="(post, key) in props.posts?.data"
                        :key="post?.id"
                        :post="post"
                        class="flex max-w-xl flex-col items-start justify-between"
                    />
                </div>
                <Pagination
                    v-if="props.posts?.last_page > 1"
                    :from="props.posts?.from"
                    :to="props.posts?.to"
                    :total="props.posts?.total"
                    :current="props.posts?.current_page"
                    :links="props.posts?.links"
                    class="mt-6 sticky z-40 !bg-transparent"
                />
            </div>
        </div>
    </HomeLayout>
</template>

<script setup>
import HomeLayout from "../../Layout/Home.vue";
import Pagination from "../../Components/Pagination.vue";
import Card from "../../Components/Card/Card.vue";

const props = defineProps({
    posts: Object,
    topCategories: Array,
});

const menus = props.topCategories.map((category) => {
    return category.name;
});
</script>
