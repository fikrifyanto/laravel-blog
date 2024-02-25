<template>
    <template v-if="props.editor">
        <froala
            tag="textarea"
            :config="props.editorConfig"
            :id="props.id"
            :name="props.name"
            :type="props.type"
            :autocomplete="props.autocomplete"
            :required="props.required"
            v-model:value="editorContent"
            class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600"
        >
        </froala>
    </template>
    <template v-else>
        <textarea
            :id="props.id"
            :name="props.name"
            :type="props.type"
            :autocomplete="props.autocomplete"
            :required="props.required"
            :value="props.modelValue"
            @input="emit('update:modelValue', $event.target.value)"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
        >
        </textarea>
    </template>
</template>

<script setup>
import { ref, watch } from "vue";

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
    editor: {
        type: Boolean,
        default: false,
    },
    editorConfig: {
        type: Object,
        default: {},
    },
});

const editorContent = ref(props.modelValue);

watch(editorContent, () => {
    emit("update:modelValue", editorContent.value);
});
</script>
