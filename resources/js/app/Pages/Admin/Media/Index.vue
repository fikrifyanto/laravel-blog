<template>
    <Head>
        <title>All Media</title>
        <meta
            name="description"
            content="Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua."
        />
    </Head>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Media</h1>
                <p class="text-slate-600 text-sm mt-2">
                    A list of all the medias in your account including their
                    file and name
                </p>
            </div>
        </div>
        <div
            class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden"
        >
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">File</th>
                    <th class="font-medium text-left py-4 px-6">Name</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        :class="{
                            'border-b': key != props.medias?.data?.length,
                        }"
                        v-for="(media, key) in props.medias?.data"
                    >
                        <td class="py-4 px-6">
                            <img
                                class="max-w-xs max-h-44"
                                :src="`${media?.url}`"
                                :alt="media.name"
                            />
                        </td>
                        <td class="py-4 px-6">{{ media?.name }}</td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <Link
                                :href="`/admin/media/${media?.id}/edit`"
                                class="text-indigo-600 px-2"
                                >Edit</Link
                            >
                            <button
                                @click="removeUser(media?.id)"
                                v-if="media?.role != 'admin'"
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
            v-if="props.medias?.last_page > 1"
            :from="props.medias?.from"
            :to="props.medias?.to"
            :total="props.medias?.total"
            :current="props.medias?.current_page"
            :links="props.medias?.links"
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
    medias: Object,
});

const popup = usePopupStore();

function removeUser(mediaId) {
    popup.setTitle("Are you sure?");
    popup.setMessage("Data cannot be restore after deleted");
    popup.setType("danger");
    popup.setCancelButtonText("Cancel");
    popup.setConfirmButtonText("Delete!");
    popup.show();

    popup.change((data) => {
        if (data.isConfirm) {
            useForm({}).delete(`/admin/media/${mediaId}`, {
                onSuccess: () => router.reload({ only: ["medias"] }),
            });
        }
    });
}
</script>
