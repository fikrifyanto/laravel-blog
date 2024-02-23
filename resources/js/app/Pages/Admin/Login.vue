<template>
    <div class="bg-white h-screen overflow-hidden">
        <div class="relative isolate px-6 pt-14 lg:px-8 h-[95vh]">
            <div
                class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
            <div
                class="mx-auto max-w-2xl pb-32 pt-24 sm:pb-48 sm:pt-20 lg:pb-56 lg:pt-28"
            >
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

                        <Button type="button" :loading="isLoading">
                            Log in
                        </Button>
                    </form>
                </div>
            </div>
            <div
                class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true"
            >
                <div
                    class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="
                        clip-path: polygon(
                            74.1% 44.1%,
                            100% 61.6%,
                            97.5% 26.9%,
                            85.5% 0.1%,
                            80.7% 2%,
                            72.5% 32.5%,
                            60.2% 62.4%,
                            52.4% 68.1%,
                            47.5% 58.3%,
                            45.2% 34.5%,
                            27.5% 76.7%,
                            0.1% 64.9%,
                            17.9% 100%,
                            27.6% 76.8%,
                            76.1% 97.7%,
                            74.1% 44.1%
                        );
                    "
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import FormGroup from "../../Components/Form/FormGroup.vue";
import FormInput from "../../Components/Form/FormInput.vue";
import Button from "../../Components/Button.vue";

import { useForm } from "@inertiajs/vue3";

const isLoading = ref(false);

const form = useForm({
    username: null,
    password: null,
});

function submit(event) {
    event.preventDefault();

    isLoading.value = true;

    form.post("/authenticate");
}
</script>
