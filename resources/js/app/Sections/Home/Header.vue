<template>
    <header class="bg-white">
        <nav
            class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8 sticky z-50"
            aria-label="Global"
        >
            <Link href="/" class="flex lg:flex-1 items-center">
                <img
                    class="h-8 w-auto"
                    src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Tailwind Blog"
                />
                <span class="font-medium text-indigo-600 text-xl pl-2">
                    Tailwind Blog
                </span>
            </Link>
            <div class="flex lg:hidden">
                <button
                    type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700 z-50"
                    :class="{ hidden: mobileMenuOpen }"
                    @click="mobileMenuOpen = true"
                >
                    <span class="sr-only">Open main menu</span>
                    <Bars3Icon class="h-6 w-6" aria-hidden="true" />
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <Link
                    v-for="menu in props.menus"
                    :href="`/category/${menu}`"
                    class="text-sm font-semibold leading-6 text-gray-900"
                >
                    {{ menu }}
                </Link>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <Button class="max-w-max" @click="showSubsribePopup">
                    <EnvelopeIcon class="h-6 w-6 text-white mr-1" />
                    Subscribe
                </Button>
            </div>
        </nav>

        <Dialog
            as="div"
            class="lg:hidden"
            @close="mobileMenuOpen = false"
            :open="mobileMenuOpen"
        >
            <div class="fixed inset-0 z-10" />
            <DialogPanel
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10"
            >
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img
                            class="h-8 w-auto"
                            src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt=""
                        />
                    </a>
                    <button
                        type="button"
                        class="-m-2.5 rounded-md p-2.5 text-gray-700 z-50"
                        @click="mobileMenuOpen = false"
                    >
                        <span class="sr-only">Close menu</span>
                        <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <Disclosure
                                as="div"
                                class="-mx-3"
                                v-slot="{ open }"
                            >
                                <DisclosureButton
                                    class="flex w-full items-center justify-between rounded-lg py-2 pl-3 pr-3.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >
                                    Product
                                    <ChevronDownIcon
                                        :class="[
                                            open ? 'rotate-180' : '',
                                            'h-5 w-5 flex-none',
                                        ]"
                                        aria-hidden="true"
                                    />
                                </DisclosureButton>
                                <DisclosurePanel class="mt-2 space-y-2">
                                    <DisclosureButton
                                        v-for="item in [
                                            ...products,
                                            ...callsToAction,
                                        ]"
                                        :key="item.name"
                                        as="a"
                                        :href="item.href"
                                        class="block rounded-lg py-2 pl-6 pr-3 text-sm font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                        >{{ item.name }}</DisclosureButton
                                    >
                                </DisclosurePanel>
                            </Disclosure>
                            <a
                                href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >Features</a
                            >
                            <a
                                href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >Marketplace</a
                            >
                            <a
                                href="#"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                                >Company</a
                            >
                        </div>
                        <div class="py-6">
                            <a
                                href="#"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50"
                            >
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            </DialogPanel>
        </Dialog>
    </header>
</template>

<script setup>
import { ref } from "vue";
import Button from "../../Components/Button.vue";
import { Link } from "@inertiajs/vue3";
import {
    Dialog,
    DialogPanel,
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
} from "@headlessui/vue";

import { Bars3Icon, XMarkIcon, EnvelopeIcon } from "@heroicons/vue/24/outline";

import { ChevronDownIcon } from "@heroicons/vue/20/solid";

import { usePopupStore } from "@/stores/popup";

const props = defineProps({
    menus: Array
})

const mobileMenuOpen = ref(false);

const popup = usePopupStore();

function showSubsribePopup() {
    popup.setTitle("Subscribe Newsletter");
    popup.setType("form");
    popup.setForms({
        email: {
            type: "text",
            placeholder: "Type your email",
        },
    });
    popup.setCancelButtonText("Cancel");
    popup.setConfirmButtonText("Subscribe");
    popup.show();

    popup.change((data) => {
        if (data.isConfirm) {
            popup.setTitle("Thank You for Subscribe!");
            popup.setCancelButtonText("Close");
            popup.setConfirmButtonText("Okay!");
            popup.show();
        }
    });
}
</script>
