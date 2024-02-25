<template>
    <Head>
        <title>All Medias</title>
        <meta
            name="description"
            content="Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua."
        />
    </Head>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Comment</h1>
                <p class="text-slate-600 text-sm mt-2">
                    A list of all the comments in your blog including their
                    email, content, and reply.
                </p>
            </div>
        </div>
        <div
            class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden"
        >
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">Email</th>
                    <th class="font-medium text-left py-4 px-6">Content</th>
                    <th class="font-medium text-left py-4 px-6">Post</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        :class="{
                            'border-b': key != props.comments?.data?.length,
                        }"
                        v-for="(comment, key) in props.comments?.data"
                    >
                        <td class="py-4 px-6">{{ comment?.email }}</td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ comment?.content }}
                        </td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ comment?.post?.title }}
                        </td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <button
                                @click="removeUser(comment?.id)"
                                v-if="comment?.role != 'admin'"
                                class="text-red-600 px-2"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination
            v-if="props.comments?.last_page > 1"
            :from="props.comments?.from"
            :to="props.comments?.to"
            :total="props.comments?.total"
            :current="props.comments?.current_page"
            :links="props.comments?.links"
            class="mt-6"
        />
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../../Layout/Admin.vue";
import Pagination from "../../../Components/Pagination.vue";
import Button from "../../../Components/Button.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import { usePopupStore } from "../../../../stores/popup";
import { Head } from "@inertiajs/vue3";

const props = defineProps({
    comments: Object,
});

const popup = usePopupStore();

function removeUser(commentId) {
    popup.setTitle("Are you sure?");
    popup.setMessage("Data cannot be restore after deleted");
    popup.setType("danger");
    popup.setCancelButtonText("Cancel");
    popup.setConfirmButtonText("Delete!");
    popup.show();

    popup.change((data) => {
        if (data.isConfirm) {
            useForm({}).delete(`/admin/comment/${commentId}`, {
                onSuccess: () => router.reload({ only: ["comments"] }),
            });
        }
    });
}
</script>
