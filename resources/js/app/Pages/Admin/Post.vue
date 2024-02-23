<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Users</h1>
                <p class="text-slate-600 text-sm mt-2">A list of all the users in your account including their name, title, email and role.</p>
            </div>
            <div>
                <Button class="min-w-max">Add User</Button>
            </div>
        </div>
        <div class="border shadow-sm rounded-md overflow-x-scroll overflow-y-hidden">
            <table class="table-auto w-full text-sm">
                <thead class="border-b border-slate-300 bg-slate-50">
                    <th class="font-medium text-left py-4 px-6">Title</th>
                    <th class="font-medium text-left py-4 px-6">Author</th>
                    <th class="font-medium text-left py-4 px-6">Category</th>
                    <th class="font-medium text-left py-4 px-6">Date</th>
                    <th></th>
                </thead>
                <tbody>
                    <tr :class="{'border-b': row != 9}" v-for="row in 9">
                        <td class="py-4 px-6">Lorem ipsum dolor sit amet.</td>
                        <td class="text-gray-600 py-4 px-6">Fikri</td>
                        <td class="text-gray-600 py-4 px-6">Business</td>
                        <td class="text-gray-600 py-4 px-6">24th January 2024</td>
                        <td class="text-gray-600 py-4 px-6 text-right">
                            <Link href="" class="text-indigo-600 px-2">Edit</Link>
                            <Link href="" class="text-red-600 px-2">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <Pagination class="mt-6"/>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../Layout/Admin.vue";
import Pagination from "../../Components/Pagination.vue";
import Button from "../../Components/Button.vue"
import {Link} from "@inertiajs/vue3"
</script>
