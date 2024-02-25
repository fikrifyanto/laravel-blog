<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Category</h1>
                <p class="text-slate-600 text-sm mt-2">
                    A list of all the categories in your account including their
                    name, title, email and role.
                </p>
            </div>
            <div>
                <Button class="min-w-max"
                    ><Link href="/admin/category/create"
                        >Add Category</Link
                    ></Button
                >
            </div>
        </div>
        <div
            class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden"
        >
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">Name</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        :class="{
                            'border-b': key != props.categories?.data?.length,
                        }"
                        v-for="(category, key) in props.categories?.data"
                    >
                        <td class="py-4 px-6">{{ category?.name }}</td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <Link
                                :href="`/admin/category/${category?.id}/edit`"
                                class="text-indigo-600 px-2"
                                >Edit</Link
                            >
                            <button
                                @click="removeUser(category?.id)"
                                v-if="category?.role != 'admin'"
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
            v-if="props.categories?.last_page > 1"
            :from="props.categories?.from"
            :to="props.categories?.to"
            :total="props.categories?.total"
            :current="props.categories?.current_page"
            :links="props.categories?.links"
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

const props = defineProps({
    categories: Object,
});

const popup = usePopupStore();

function removeUser(categoryId) {
    popup.setTitle("Are you sure?");
    popup.setMessage("Data cannot be restore after deleted");
    popup.setType("danger");
    popup.setCancelButtonText("Cancel");
    popup.setConfirmButtonText("Delete!");
    popup.show();

    popup.change((data) => {
        if (data.isConfirm) {
            useForm({}).delete(`/admin/category/${categoryId}`, {
                onSuccess: () => router.reload({ only: ["categories"] }),
            });
        }
    });
}
</script>
