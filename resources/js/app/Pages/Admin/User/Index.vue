<template>
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
                            <Link
                                v-if="user?.role != 'admin'"
                                href=""
                                class="text-red-600 px-2"
                                >Delete</Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination v-if="props.users?.last_page > 1" class="mt-6" />
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../../Layout/Admin.vue";
import Pagination from "../../../Components/Pagination.vue";
import Button from "../../../Components/Button.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    users: Object,
});
</script>