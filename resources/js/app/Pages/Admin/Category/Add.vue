<template>
    <Head>
        <title>Add Category</title>
        <meta
            name="description"
            content="Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua."
        />
    </Head>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Add Category</h1>
                <p class="text-slate-600 text-sm mt-2">
                    Add the categories including their name
                </p>
            </div>
        </div>
        <form @submit.prevent="submit" class="flex flex-col gap-4 max-w-xl">
            <FormGroup label="Name" for="name">
                <FormInput v-model="form.name" id="name" type="text" />
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
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";
import { Head } from "@inertiajs/vue3";

const isLoading = ref(false);

const form = useForm({
    name: null,
    username: null,
    password: null,
});

function submit(event) {
    event.preventDefault();

    isLoading.value = true;

    form.post("/admin/category");
}
</script>
