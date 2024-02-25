<template>
    <Head>
        <title>All Users</title>
        <meta
            name="description"
            content="Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua."
        />
    </Head>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Users</h1>
                <p class="text-slate-600 text-sm mt-2">
                    A list of all the users in your account including their
                    name, title, email and role.
                </p>
            </div>
            <div>
                <Button class="min-w-max"
                    ><Link href="/admin/user/create">Add User</Link></Button
                >
            </div>
        </div>
        <div
            class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden"
        >
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">Name</th>
                    <th class="font-medium text-left py-4 px-6">Username</th>
                    <th class="font-medium text-left py-4 px-6">Role</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr
                        :class="{
                            'border-b': key != props.users?.data?.length,
                        }"
                        v-for="(user, key) in props.users?.data"
                    >
                        <td class="py-4 px-6">{{ user?.name }}</td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ user?.username }}
                        </td>
                        <td class="text-gray-600 py-4 px-6">
                            {{ user?.role }}
                        </td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <Link
                                :href="`/admin/user/${user?.id}/edit`"
                                class="text-indigo-600 px-2"
                                >Edit</Link
                            >
                            <button
                                @click="removeUser(user?.id)"
                                v-if="user?.role != 'admin'"
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
            v-if="props.users?.last_page > 1"
            :from="props.users?.from"
            :to="props.users?.to"
            :total="props.users?.total"
            :current="props.users?.current_page"
            :links="props.users?.links"
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
    users: Object,
});

const popup = usePopupStore();

function removeUser(userId) {
    popup.setTitle("Are you sure?");
    popup.setMessage("Data cannot be restore after deleted");
    popup.setType("danger");
    popup.setCancelButtonText("Cancel");
    popup.setConfirmButtonText("Delete!");
    popup.show();

    popup.change((data) => {
        if (data.isConfirm) {
            useForm({}).delete(`/admin/user/${userId}`, {
                onSuccess: () => router.reload({ only: ["users"] }),
            });
        }
    });
}
</script>
