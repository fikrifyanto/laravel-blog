<template>
    <div class="mx-auto max-w-7xl px-6 lg:px-8 mt-14">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
            Comments
        </h2>

        <div
            class="flex flex-col divide-y items-start justify-start gap-4 mt-8"
        >
            <div class="pt-4 pb-4" v-for="comment in props.comments">
                <div class="flex flex-col text-gray-600">
                    <div class="text-sm">{{ comment?.name }}</div>
                    <div class="text-sm text-gray-500">
                        {{ comment?.email }}
                    </div>
                </div>
                <div class="italic text-gray-800 mt-4">
                    "{{ comment?.content }}"
                </div>
            </div>
        </div>

        <form
            @submit.prevent="submit"
            class="flex flex-col gap-4 max-w-xl mt-8"
        >
            <FormGroup label="Name" for="name">
                <FormInput
                    v-model="form.name"
                    class="font-semibold !text-xl"
                    id="name"
                    type="text"
                />
            </FormGroup>
            <FormGroup label="Email" for="email">
                <FormInput
                    v-model="form.email"
                    class="font-semibold !text-xl"
                    id="email"
                    type="text"
                />
            </FormGroup>
            <FormGroup label="Comment" for="content">
                <FormTextarea v-model="form.content" id="content" />
            </FormGroup>
            <Button>Comment</Button>
        </form>
    </div>
</template>

<script setup>
import FormGroup from "../../Components/Form/FormGroup.vue";
import FormInput from "../../Components/Form/FormInput.vue";
import FormTextarea from "../../Components/Form/FormTextarea.vue";
import Button from "../../Components/Button.vue";
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    content: null,
});

const props = defineProps({
    comments: Array,
});
</script>
