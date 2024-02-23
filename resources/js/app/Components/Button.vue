<template>
    <button
        type="submit"
        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
    >
        <template v-if="props.loading">
            <Loading />
        </template>
        <template v-else>
            <slot />
        </template>
    </button>
</template>

<script setup>
import Loading from "../Components/Icons/Loading.vue";

const props = defineProps({
    type: {
        validator(value) {
            return ["submit", "button"].includes(value);
        },
    },
    loading: {
        type: Boolean,
        default: false,
    },
});
</script>
