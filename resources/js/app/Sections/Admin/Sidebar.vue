<template>
    <aside
        :class="{ '-translate-x-full': !sidebar.isShow }"
        class="fixed lg:static w-screen lg:w-auto z-50 col-span-5 lg:col-span-1 bg-slate-900/80 transition-transform"
    >
        <div class="grid grid-cols-5 w-full">
            <div
                class="col-span-4 lg:col-span-5 bg-indigo-600 h-screen px-4 py-5"
            >
                <Link href="/" class="flex items-center">
                    <img
                        class="h-8 w-auto"
                        src="https://tailwindui.com/img/logos/mark.svg?color=white"
                        alt="Tailwind Blog"
                    />
                    <span class="font-medium text-white text-xl pl-2">
                        Tailwind Blog
                    </span>
                </Link>
                <nav class="mt-10 font-medium">
                    <ul role="list">
                        <li>
                            <ul role="list" class="flex flex-col gap-2">
                                <li
                                    :class="{
                                        'bg-indigo-700 text-white':
                                            $page.url == '/admin/dashboard',
                                        'bg-transparant text-slate-300':
                                            $page.url != '/admin/dashboard',
                                    }"
                                    class="rounded-md p-2 text-sm font-sans hover:bg-indigo-700"
                                >
                                    <Link
                                        href="/admin/dashboard"
                                        class="flex items-center gap-3"
                                    >
                                        <HomeIcon class="h-6 w-6" />
                                        Dashboard
                                    </Link>
                                </li>
                                <li
                                    :class="{
                                        'bg-indigo-700 text-white':
                                            $page.url == '/admin/user',
                                        'bg-transparant text-slate-300':
                                            $page.url != '/admin/user',
                                    }"
                                    class="rounded-md p-2 text-sm font-sans hover:bg-indigo-700"
                                >
                                    <Link
                                        href="/admin/user"
                                        class="flex items-center gap-3"
                                    >
                                        <UsersIcon class="h-6 w-6" />
                                        User
                                    </Link>
                                </li>
                                <li
                                    :class="{
                                        'bg-indigo-700 text-white':
                                            $page.url == '/admin/post',
                                        'bg-transparant text-slate-300':
                                            $page.url != '/admin/post',
                                    }"
                                    class="rounded-md p-2 text-sm font-sans hover:bg-indigo-700"
                                >
                                    <Link
                                        href="/admin/post"
                                        class="flex items-center gap-3"
                                    >
                                        <DocumentDuplicateIcon
                                            class="h-6 w-6"
                                        />
                                        Post
                                    </Link>
                                </li>
                                <li
                                    :class="{
                                        'bg-indigo-700 text-white':
                                            $page.url == '/admin/media',
                                        'bg-transparant text-slate-300':
                                            $page.url != '/admin/media',
                                    }"
                                    class="rounded-md p-2 text-sm font-sans hover:bg-indigo-700"
                                >
                                    <Link
                                        href="/admin/media"
                                        class="flex items-center gap-3"
                                    >
                                        <PhotoIcon class="h-6 w-6" />
                                        Media
                                    </Link>
                                </li>
                                <li
                                    :class="{
                                        'bg-indigo-700 text-white':
                                            $page.url == '/admin/comment',
                                        'bg-transparant text-slate-300':
                                            $page.url != '/admin/comment',
                                    }"
                                    class="rounded-md p-2 text-sm font-sans hover:bg-indigo-700"
                                >
                                    <Link
                                        href="/admin/comment"
                                        class="flex items-center gap-3"
                                    >
                                        <ChatBubbleLeftRightIcon
                                            class="h-6 w-6"
                                        />
                                        Comment
                                    </Link>
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
import { Link } from "@inertiajs/vue3";
import {
    HomeIcon,
    UsersIcon,
    DocumentDuplicateIcon,
    ChatBubbleLeftRightIcon,
    XMarkIcon,
    PhotoIcon,
} from "@heroicons/vue/24/outline";
import { useSidebarStore } from "@/stores/sidebar";

const sidebar = useSidebarStore();
</script>
