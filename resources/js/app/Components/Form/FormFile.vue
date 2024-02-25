<template>
    <div
        class="mt-2 flex justify-center rounded-lg border border-gray-300 px-6 py-10"
    >
        <div class="relative" v-if="fileUrl">
            <img class="max-h-52 border rounded-md" :src="fileUrl" />
            <button
                @click="removeFile"
                class="bg-slate-900/40 rounded-full mx-auto h-8 w-8 flex items-center justify-center absolute -top-2 -right-2"
            >
                <XMarkIcon class="h-6 w-6 text-white" />
            </button>
        </div>
        <div v-else class="text-center">
            <PhotoIcon
                class="mx-auto h-12 w-12 text-gray-300"
                aria-hidden="true"
            />
            <div
                class="mt-4 flex justify-center text-sm leading-6 text-gray-600"
            >
                <label
                    :for="props.id"
                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"
                >
                    <span>Select a file</span>
                    <input
                        @change="onSelectedFile"
                        :id="props.id"
                        :name="props.name"
                        :accept="props.accept"
                        type="file"
                        class="sr-only"
                    />
                </label>
            </div>
            <p class="text-xs leading-5 text-gray-600">
                PNG, JPG, GIF up to 10MB
            </p>
        </div>
    </div>
</template>

<script setup>
import { PhotoIcon, XMarkIcon } from "@heroicons/vue/20/solid";
import { ref } from "vue";

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({
    id: String,
    name: String,
    fileUrl: String,
    fileName: String,
    accept: String,
});

const file = ref(null);
const fileUrl = ref(props.fileUrl);

function onSelectedFile(event) {
    file.value = event.target.files[0];
    fileUrl.value = URL.createObjectURL(file.value);

    emit("update:modelValue", file.value);
}

function removeFile() {
    file.value = null;
    fileUrl.value = null;

    emit("update:modelValue", null);
}
</script>
