<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Posts</h1>
                <p class="text-slate-600 text-sm mt-2">
                    A list of all the posts in your blog including their title,
                    category and date.
                </p>
            </div>
            <div>
                <Button class="min-w-max"
                    ><Link href="/admin/post/create">Add Post</Link></Button
                >
            </div>
        </div>
        <div
            class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden"
        >
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">Title</th>
                    <th class="font-medium text-left py-4 px-6">Author</th>
                    <th class="font-medium text-left py-4 px-6">Category</th>
                    <th class="font-medium text-left py-4 px-6">Date</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        :class="{
                            'border-b': key != props.posts?.data?.length,
                        }"
                        v-for="(post, key) in props.posts?.data"
                    >
                        <td class="text-gray-600 py-4 px-6">
                            {{ post?.title }}
                        </td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ post?.user?.name }}
                        </td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ post?.category?.name }}
                        </td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ post?.date }}
                        </td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <Link
                                :href="`/admin/post/${post?.id}/edit`"
                                class="text-indigo-600 px-2"
                                >Edit</Link
                            >
                            <Link
                                v-if="post?.role != 'admin'"
                                href=""
                                class="text-red-600 px-2"
                                >Delete</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination
            v-if="props.posts?.last_page > 1"
            :from="props.posts?.from"
            :to="props.posts?.to"
            :total="props.posts?.total"
            :current="props.posts?.current_page"
            :links="props.posts?.links"
            class="mt-6"
        />
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../../Layout/Admin.vue";
import Pagination from "../../../Components/Pagination.vue";
import Button from "../../../Components/Button.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    posts: Object,
});
</script>
