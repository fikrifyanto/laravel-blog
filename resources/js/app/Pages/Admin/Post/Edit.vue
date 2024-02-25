<template>
    <AdminLayout>
        <div class="flex justify-between mb-8 gap-4">
            <div>
                <h1 class="font-medium">Edit Post</h1>
                <p class="text-slate-600 text-sm mt-2">
                    Edit the post including their title, author, category and
                    date.
                </p>
            </div>
        </div>
        <form
            @submit.prevent="submit"
            class="grid grid-cols-1 lg:grid-cols-3 gap-6"
        >
            <div class="col-span-2">
                <div class="flex flex-col gap-4">
                    <FormGroup label="Title" for="title">
                        <FormInput
                            v-model="form.title"
                            class="font-semibold !text-xl"
                            id="title"
                            type="text"
                        />
                    </FormGroup>
                    <FormGroup label="Content" for="content">
                        <FormTextarea
                            v-model="form.content"
                            id="content"
                            :editor="true"
                            :editor-config="contentEditorConfig"
                        />
                    </FormGroup>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <FormGroup label="Featured Image" for="featured-image">
                    <FormFile
                        v-model="form.featured_image"
                        :file-url="`/storage/${props.post.media.path}`"
                        id="featured-image"
                        accept="image/*"
                    />
                </FormGroup>
                <FormGroup label="Date" for="date">
                    <FormInput v-model="form.date" id="date" type="date" />
                </FormGroup>
                <Listbox as="div" v-model="selectedCategory">
                    <ListboxLabel
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >
                        Category
                    </ListboxLabel>
                    <div class="relative mt-2">
                        <ListboxButton
                            class="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 sm:text-sm sm:leading-6"
                        >
                            <span class="flex items-center">
                                <span class="block truncate">{{
                                    selectedCategory?.name
                                }}</span>
                            </span>
                            <span
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2"
                            >
                                <ChevronUpDownIcon
                                    class="h-5 w-5 text-gray-400"
                                    aria-hidden="true"
                                />
                            </span>
                        </ListboxButton>

                        <transition
                            leave-active-class="transition ease-in duration-100"
                            leave-from-class="opacity-100"
                            leave-to-class="opacity-0"
                        >
                            <ListboxOptions
                                class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                            >
                                <ListboxOption
                                    as="template"
                                    v-for="category in props.categories"
                                    :key="category.id"
                                    :value="category"
                                    v-slot="{ active, selectedCategory }"
                                >
                                    <li
                                        :class="[
                                            active
                                                ? 'bg-indigo-600 text-white'
                                                : 'text-gray-900',
                                            'relative cursor-default select-none py-2 pl-3 pr-9',
                                        ]"
                                    >
                                        <div class="flex items-center">
                                            <span
                                                :class="[
                                                    selectedCategory
                                                        ? 'font-semibold'
                                                        : 'font-normal',
                                                    'block truncate',
                                                ]"
                                                >{{ category.name }}</span
                                            >
                                        </div>

                                        <span
                                            v-if="selectedCategory"
                                            :class="[
                                                active
                                                    ? 'text-white'
                                                    : 'text-indigo-600',
                                                'absolute inset-y-0 right-0 flex items-center pr-4',
                                            ]"
                                        >
                                            <CheckIcon
                                                class="h-5 w-5"
                                                aria-hidden="true"
                                            />
                                        </span>
                                    </li>
                                </ListboxOption>
                            </ListboxOptions>
                        </transition>
                    </div>
                </Listbox>
                <Button :loading="isLoading" type="submit" class="mt-2"
                    >Edit</Button
                >
            </div>
        </form>
    </AdminLayout>
</template>

<script setup>
import moment from "moment";
import AdminLayout from "../../../Layout/Admin.vue";
import FormGroup from "../../../Components/Form/FormGroup.vue";
import FormInput from "../../../Components/Form/FormInput.vue";
import FormFile from "../../../Components/Form/FormFile.vue";
import FormTextarea from "../../../Components/Form/FormTextarea.vue";
import Button from "../../../Components/Button.vue";
import { useForm } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import {
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
} from "@headlessui/vue";
import { CheckIcon, ChevronUpDownIcon } from "@heroicons/vue/20/solid";

const props = defineProps({
    categories: Array,
    post: Object,
});

const isLoading = ref(false);

const form = useForm({
    _method: "PUT",
    title: props.post.title,
    featured_image: null,
    content: props.post.content,
    category_id: props.post.category_id,
    date: moment().format("YYYY-MM-DD"),
});

const selectedCategory = ref(
    props.categories?.filter((category) => {
        return category.id == form.category_id;
    })[0]
);

watch(selectedCategory, () => {
    form.category_id = selectedCategory.value.id;
});

const contentEditorConfig = {
    heightMin: 350,
    toolbarButtons: {
        moreText: {
            buttons: [
                "paragraphFormat",
                "italic",
                "underline",
                "bold",
                "strikeThrough",
                "subscript",
                "superscript",
                "fontSize",
                "textColor",
                "backgroundColor",
                "inlineClass",
                "inlineStyle",
                "clearFormatting",
            ],
        },
        moreParagraph: {
            buttons: [
                "alignLeft",
                "alignCenter",
                "alignRight",
                "formatOLSimple",
            ],
        },
        moreRich: {
            buttons: [
                "insertLink",
                "insertImage",
                "insertVideo",
                "insertTable",
                "emoticons",
                "specialCharacters",
                "embedly",
                "insertHR",
            ],
        },
        moreMisc: {
            buttons: [
                "undo",
                "redo",
                "fullscreen",
                "spellChecker",
                "selectAll",
                "html",
                "help",
            ],
            align: "right",
            buttonsVisible: 2,
        },
    },
};

function submit() {
    isLoading.value = true;

    form.post(`/admin/post/${props.post.id}`);
}
</script>
