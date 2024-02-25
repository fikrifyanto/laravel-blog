<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Edit Post</h1>
                <p class="text-slate-600 text-sm mt-2">
                    Edit the posts including their name, title, email and role.
                </p>
            </div>
        </div>
        <form @submit.prevent="submit" class="flex flex-col gap-4 max-w-xl">
            <FormGroup label="Name" for="name">
                <FormInput v-model="form.name" id="name" type="text" />
            </FormGroup>
            <FormGroup label="Username" for="username">
                <FormInput v-model="form.username" id="username" type="text" />
            </FormGroup>
            <FormGroup label="Password" for="password">
                <FormInput
                    v-model="form.password"
                    id="password"
                    type="password"
                />
            </FormGroup>
            <Button :loading="isLoading" type="submit" class="mt-2"
                >Edit</Button
            >
        </form>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../../Layout/Admin.vue";
import FormGroup from "../../../Components/Form/FormGroup.vue";
import FormInput from "../../../Components/Form/FormInput.vue";
import Button from "../../../Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    user: Object,
});

const isLoading = ref(false);

const form = useForm({
    name: props.user.name,
    username: props.user.username,
    password: null,
});

function submit(event) {
    event.preventDefault();

    isLoading.value = true;

    form.post(`/admin/user/${props.user.id}`);
}
</script>
