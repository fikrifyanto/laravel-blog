<template>
    <div
        :class="{ 'lg:-ml-[25%]': !sidebar.isShow }"
        class="col-span-5 lg:col-span-4 transition-all"
    >
        <header
            class="flex justify-between items-center w-full border-b shadow-sm h-16 px-4 lg:px-10 divide-x gap-6"
        >
            <button @click="sidebar.bind">
                <Bars2Icon class="h-6 w-6 text-black" />
            </button>
            <div class="flex justify-end items-center">
                <div></div>
                <Popover class="relative">
                    <PopoverButton
                        class="flex items-center gap-4 pl-6 outline-none"
                    >
                        <img
                            class="h-8 w-8 rounded-full"
                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="Admin Profile"
                        />
                        <span class="font-medium text-sm">Tim Cook</span>
                        <ChevronDownIcon
                            class="h-4 w-4 text-slate-400 stroke-2"
                        />
                    </PopoverButton>

                    <transition
                        enter-active-class="transition ease-out duration-200"
                        enter-from-class="opacity-0 translate-y-1"
                        enter-to-class="opacity-100 translate-y-0"
                        leave-active-class="transition ease-in duration-150"
                        leave-from-class="opacity-100 translate-y-0"
                        leave-to-class="opacity-0 translate-y-1"
                    >
                        <PopoverPanel
                            class="absolute z-10 mt-2 flex max-w-max right-0"
                        >
                            <div
                                class="max-w-max flex-auto overflow-hidden rounded-lg bg-white text-sm leading-6 shadow-lg ring-1 ring-gray-900/5"
                            >
                                <ul class="py-4">
                                    <li
                                        class="hover:bg-slate-50 px-4 py-1.5 text-sm text-slate-600"
                                    >
                                        Your Profile
                                    </li>
                                    <li
                                        class="hover:bg-slate-50 px-4 py-1.5 text-sm text-slate-600"
                                    >
                                        Sign Out
                                    </li>
                                </ul>
                            </div>
                        </PopoverPanel>
                    </transition>
                </Popover>
            </div>
        </header>
        <div class="min-h-full p-8">
            <slot />
        </div>
    </div>
</template>

<script setup>
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import { ChevronDownIcon } from "@heroicons/vue/20/solid";
import { Bars2Icon } from "@heroicons/vue/24/outline";
import { useSidebarStore } from "../stores/sidebar";

const sidebar = useSidebarStore();
</script>
