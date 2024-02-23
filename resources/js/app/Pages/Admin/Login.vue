<template>
    <div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img
                class="mx-auto h-10 w-auto"
                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Tailwind Blog"
            />
            <h2
                class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900"
            >
                Log in to your account
            </h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form @submit="submit" class="space-y-6">
                <FormGroup label="Username" for="username">
                    <FormInput
                        v-model="form.username"
                        id="username"
                        name="username"
                        type="text"
                        autocomplete="username"
                        required
                    />
                </FormGroup>
                <FormGroup label="Password" for="password">
                    <FormInput
                        v-model="form.password"
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                    />
                </FormGroup>

                <Button type="button"> Log in </Button>
            </form>
        </div>
    </div>
</template>

<script setup>
import FormGroup from "../../Components/Form/FormGroup.vue";
import FormInput from "../../Components/Form/FormInput.vue";
import Button from "../../Components/Button.vue";

import { useForm } from "@inertiajs/vue3";

const form = useForm({
    username: null,
    password: null,
});

function submit(event) {
    event.preventDefault();

    form.post("/authenticate");
}
</script>
