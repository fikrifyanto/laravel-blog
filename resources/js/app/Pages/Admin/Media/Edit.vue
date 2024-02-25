<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Edit Name</h1>
                <p class="text-slate-600 text-sm mt-2">
                    Edit the medias including their name
                </p>
            </div>
        </div>
        <form @submit.prevent="submit" class="flex flex-col gap-4 max-w-xl">
            <img
                class="max-h-96 object-contain"
                :src="`/storage/${media?.path}`"
                :alt="media.name"
            />
            <FormGroup label="Name" for="name">
                <FormInput v-model="form.name" id="name" type="text" />
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
    media: Object,
});

const isLoading = ref(false);

const form = useForm({
    _method: "PUT",
    name: props.media.name,
});

function submit(event) {
    event.preventDefault();

    isLoading.value = true;

    form.post(`/admin/media/${props.media.id}`);
}
</script>
