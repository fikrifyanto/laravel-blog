<template>
    <aside
        :class="{ '-translate-x-full': !sidebar.isShow }"
        class="fixed lg:static w-screen lg:w-auto z-50 col-span-5 lg:col-span-1 bg-slate-900/80 transition-transform"
    >
        <div class="grid grid-cols-5 w-full">
            <div
                class="col-span-4 lg:col-span-5 bg-indigo-600 h-screen px-4 py-5"
            >
                <div class="flex items-center">
                    <img
                        class="h-8 w-auto ml-2"
                        src="https://tailwindui.com/img/logos/mark.svg?color=white"
                        alt="Tailwind Blog"
                    />
                    <span class="font-medium text-white text-xl pl-2">
                        Blog
                    </span>
                </div>
                <nav class="mt-10 font-medium">
                    <ul role="list">
                        <li>
                            <ul role="list" class="flex flex-col gap-2">
                                <li
                                    class="rounded-md p-2 flex items-center gap-3 text-sm font-sans hover:bg-indigo-700 bg-indigo-700 text-white"
                                >
                                    <HomeIcon class="h-6 w-6" />
                                    Dashboard
                                </li>
                                <li
                                    class="rounded-md p-2 flex items-center gap-3 text-sm font-sans hover:bg-indigo-700 text-slate-300"
                                >
                                    <UsersIcon class="h-6 w-6" />
                                    Users
                                </li>
                                <li
                                    class="rounded-md p-2 flex items-center gap-3 text-sm font-sans hover:bg-indigo-700 text-slate-300"
                                >
                                    <DocumentDuplicateIcon class="h-6 w-6" />
                                    Posts
                                </li>
                                <li
                                    class="rounded-md p-2 flex items-center gap-3 text-sm font-sans hover:bg-indigo-700 text-slate-300"
                                >
                                    <ChatBubbleLeftRightIcon class="h-6 w-6" />
                                    Comments
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="lg:hidden">
                <button
                    @click="sidebar.hide"
                    class="bg-slate-900/50 rounded-full mx-auto h-8 w-8 mt-5 flex items-center justify-center"
                >
                    <XMarkIcon class="h-6 w-6 text-white" />
                </button>
            </div>
        </div>
    </aside>
</template>

<script setup>
import {
    HomeIcon,
    UsersIcon,
    DocumentDuplicateIcon,
    ChatBubbleLeftRightIcon,
    XMarkIcon,
} from "@heroicons/vue/24/outline";
import { useSidebarStore } from "@/stores/sidebar";

const sidebar = useSidebarStore();
</script>
