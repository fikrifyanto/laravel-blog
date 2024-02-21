<template>
    <div class="grid grid-cols-5 min-h-screen">
        <aside class="col-span-1 bg-indigo-600 p-4 h-screen">
            <img
                class="h-8 w-auto ml-2"
                src="https://tailwindui.com/img/logos/mark.svg?color=white"
                alt="Tailwind Blog"
            />
            <nav class="mt-10 font-medium">
                <ul role="list">
                    <li>
                        <ul role="list" class="flex flex-col gap-2">
                            <li
                                v-for="item in 5"
                                :class="{
                                    'bg-indigo-700 text-white': item == 1,
                                    'text-slate-300': item != 1,
                                }"
                                class="rounded-md p-2 flex items-center gap-3 text-sm font-sans hover:bg-indigo-700"
                            >
                                <HomeIcon class="h-6 w-6" />
                                Dashboard
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="text-slate-300 text-xs mt-10 mb-3 px-2">
                            Your Teams
                        </div>
                        <ul role="list">
                            <li
                                class="rounded-md p-2 flex items-center gap-3 text-slate-300 text-sm font-sans hover:bg-indigo-700"
                            >
                                <HomeIcon class="h-6 w-6" />
                                Dashboard
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
        <header
            class="col-span-4 flex justify-end items-center w-full border-b shadow-sm h-16 px-8 divide-x gap-6"
        >
            <BellIcon class="h-6 w-6 text-slate-400" />
            <button class="flex items-center gap-4 pl-6">
                <img
                    class="h-8 w-8 rounded-full"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="Admin Profile"
                />
                <span class="font-medium text-sm">Tim Cook</span>
                <ChevronDownIcon class="h-4 w-4 text-slate-400 stroke-2" />
            </button>
        </header>
    </div>
</template>

<script setup>
import { HomeIcon, BellIcon, ChevronDownIcon } from "@heroicons/vue/24/outline";
</script>
