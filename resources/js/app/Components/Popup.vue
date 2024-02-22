<template>
    <TransitionRoot as="template" :show="popup.isShow">
        <Dialog as="div" class="relative z-50" @close="popup.close">
            <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"
                />
            </TransitionChild>

            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div
                    class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0"
                >
                    <TransitionChild
                        as="template"
                        enter="ease-out duration-300"
                        enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        enter-to="opacity-100 translate-y-0 sm:scale-100"
                        leave="ease-in duration-200"
                        leave-from="opacity-100 translate-y-0 sm:scale-100"
                        leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <DialogPanel
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg p-4"
                        >
                            <div class="bg-white px-4 pb-4 pt-5">
                                <div class="flex flex-col">
                                    <div
                                        v-if="popup.type == 'danger'"
                                        class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 mb-3"
                                    >
                                        <ExclamationTriangleIcon
                                            class="h-6 w-6 text-red-600"
                                            aria-hidden="true"
                                        />
                                    </div>
                                    <div class="text-center">
                                        <DialogTitle
                                            as="h3"
                                            v-if="popup.title"
                                            class="text-lg font-semibold leading-6 text-gray-900 mb-6"
                                        >
                                            {{ popup.title }}
                                        </DialogTitle>
                                        <div v-if="popup.message">
                                            <p class="text-sm text-gray-500">
                                                {{ popup.message }}
                                            </p>
                                        </div>
                                        <div v-if="popup.type == 'form'">
                                            <template
                                                v-for="(
                                                    form, key
                                                ) in popup.forms"
                                            >
                                                <FormInput
                                                    v-model="
                                                        popup.formSubmitted[key]
                                                    "
                                                    :id="key"
                                                    :name="key"
                                                    :placeholder="
                                                        form.placeholder
                                                    "
                                                />
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="p-4 grid grid-cols-2 gap-4"
                                v-if="
                                    popup.cancelButtonText &&
                                    popup.confirmButtonText
                                "
                            >
                                <button
                                    type="button"
                                    v-if="popup.cancelButtonText"
                                    :class="[cancelButtonClass]"
                                    class="w-full block justify-center rounded-md px-3 py-2 text-sm font-semibold shadow-sm"
                                    @click="popup.close"
                                >
                                    {{ popup.cancelButtonText }}
                                </button>
                                <button
                                    type="button"
                                    v-if="popup.confirmButtonText"
                                    :class="[confirmButtonClass]"
                                    class="w-full justify-center rounded-md px-3 py-2 text-sm font-semibold shadow-sm ring-1 ring-inset ring-gray-300"
                                    @click="popup.confirm"
                                    ref="cancelButtonRef"
                                >
                                    {{ popup.confirmButtonText }}
                                </button>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { computed } from "vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    TransitionChild,
    TransitionRoot,
} from "@headlessui/vue";
import { ExclamationTriangleIcon } from "@heroicons/vue/24/outline";
import { usePopupStore } from "../../stores/popup";
import FormInput from "./Form/FormInput.vue";

const cancelButtonClass = computed(() => {
    return {
        "hover:bg-slate-100 bg-transparent border border-slate-200 text-slate-600":
            popup.cancelButtonType == "secondary",
    };
});

const confirmButtonClass = computed(() => {
    return {
        "hover:bg-indigo-500 bg-indigo-600 text-white":
            popup.confirmButtonType == "primary",
    };
});

const popup = usePopupStore();
</script>
