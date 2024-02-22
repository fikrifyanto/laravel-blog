<template>
    <div>
        <label
            :for="props.for"
            class="block text-sm font-medium leading-6 text-gray-900"
        >
            {{ props.label }}
        </label>
        <div class="mt-2">
            <slot />
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    label: String,
    for: String,
});
</script>
