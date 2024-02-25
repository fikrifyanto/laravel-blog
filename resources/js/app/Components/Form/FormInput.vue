<template>
    <input
        :id="props.id"
        :name="props.name"
        :type="props.type"
        :autocomplete="props.autocomplete"
        :required="props.required"
        :value="props.modelValue"
        @input="emit('update:modelValue', $event.target.value)"
        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
    />
</template>

<script setup>
const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
    id: String,
    name: String,
    type: {
        validator(value) {
            return ["text", "password", "email", "date"].includes(value);
        },
    },
    autocomplete: String,
    required: Boolean,
    modelValue: String,
});
</script>
