<template>
    <Head>
        <title>Add User</title>
        <meta
            name="description"
            content="Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua."
        />
    </Head>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Add User</h1>
                <p class="text-slate-600 text-sm mt-2">
                    Add the users including their name, title, email and role.
                </p>
            </div>
        </div>
        <form @submit.prevent="submit" class="flex flex-col gap-4 max-w-xl">
            <FormGroup label="Profile" for="featured-image">
                <FormFile
                    v-model="form.profile"
                    id="featured-image"
                    accept="image/*"
                />
            </FormGroup>
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
            <Button :loading="isLoading" type="submit" class="mt-2">Add</Button>
        </form>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "../../../Layout/Admin.vue";
import FormGroup from "../../../Components/Form/FormGroup.vue";
import FormInput from "../../../Components/Form/FormInput.vue";
import Button from "../../../Components/Button.vue";
import FormFile from "../../../Components/Form/FormFile.vue";
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const isLoading = ref(false);

const form = useForm({
    name: null,
    username: null,
    password: null,
    profile: null,
});

function submit(event) {
    event.preventDefault();

    isLoading.value = true;

    form.post("/admin/user");
}
</script>
