<template>
    <aside class="col-span-1 bg-indigo-600 p-4 h-screen">
        <div class="flex items-center">
            <img
                class="h-8 w-auto ml-2"
                src="https://tailwindui.com/img/logos/mark.svg?color=white"
                alt="Tailwind Blog"
            />
            <span class="font-medium text-white text-xl pl-2">Blog</span>
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
    </aside>
</template>

<script setup>
import {
    HomeIcon,
    UsersIcon,
    DocumentDuplicateIcon,
    ChatBubbleLeftRightIcon,
} from "@heroicons/vue/24/outline";
</script>
