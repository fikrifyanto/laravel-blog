<template>
    <HomeLayout>
        <div
            class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 -mt-20 lg:overflow-visible lg:px-0"
        >
            <div class="absolute inset-0 -z-10 overflow-hidden">
                <svg
                    class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                    aria-hidden="true"
                >
                    <defs>
                        <pattern
                            id="e813992c-7d03-4cc4-a2bd-151760b470a0"
                            width="200"
                            height="200"
                            x="50%"
                            y="-1"
                            patternUnits="userSpaceOnUse"
                        >
                            <path d="M100 200V.5M.5 .5H200" fill="none" />
                        </pattern>
                    </defs>
                    <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                        <path
                            d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                            stroke-width="0"
                        />
                    </svg>
                    <rect
                        width="100%"
                        height="100%"
                        stroke-width="0"
                        fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)"
                    />
                </svg>
            </div>
            <div
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-5 lg:items-start lg:gap-y-10"
            >
                <div
                    class="lg:col-span-5 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
                >
                    <div class="lg:pr-4">
                        <div class="lg:max-w-xl">
                            <p
                                class="text-base font-semibold leading-7 text-indigo-600"
                            >
                                Deploy faster
                            </p>
                            <h1
                                class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl"
                            >
                                A better workflow
                            </h1>
                            <p class="mt-6 text-xl leading-8 text-gray-700">
                                Aliquet nec orci mattis amet quisque ullamcorper
                                neque, nibh sem. At arcu, sit dui mi, nibh dui,
                                diam eget aliquam. Quisque id at vitae feugiat
                                egestas.
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="-ml-12 -mt-12 p-12 lg:sticky lg:top-4 lg:col-span-2 lg:col-start-4 lg:row-span-2 lg:row-start-1 lg:overflow-hidden"
                >
                    <img
                        class="w-[48rem] max-w-none rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10"
                        src="https://tailwindui.com/img/component-images/dark-project-app-screenshot.png"
                        alt=""
                    />
                </div>
                <div
                    class="lg:col-span-5 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8"
                >
                    <div class="lg:pr-4">
                        <div
                            class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-xl"
                        >
                            <p>
                                Faucibus commodo massa rhoncus, volutpat.
                                Dignissim sed eget risus enim. Mattis mauris
                                semper sed amet vitae sed turpis id. Id dolor
                                praesent donec est. Odio penatibus risus viverra
                                tellus varius sit neque erat velit. Faucibus
                                commodo massa rhoncus, volutpat. Dignissim sed
                                eget risus enim. Mattis mauris semper sed amet
                                vitae sed turpis id.
                            </p>
                            <ul
                                role="list"
                                class="mt-8 space-y-8 text-gray-600"
                            >
                                <li class="flex gap-x-3">
                                    <CloudArrowUpIcon
                                        class="mt-1 h-5 w-5 flex-none text-indigo-600"
                                        aria-hidden="true"
                                    />
                                    <span
                                        ><strong
                                            class="font-semibold text-gray-900"
                                            >Push to deploy.</strong
                                        >
                                        Lorem ipsum, dolor sit amet consectetur
                                        adipisicing elit. Maiores impedit
                                        perferendis suscipit eaque, iste dolor
                                        cupiditate blanditiis ratione.</span
                                    >
                                </li>
                                <li class="flex gap-x-3">
                                    <LockClosedIcon
                                        class="mt-1 h-5 w-5 flex-none text-indigo-600"
                                        aria-hidden="true"
                                    />
                                    <span
                                        ><strong
                                            class="font-semibold text-gray-900"
                                            >SSL certificates.</strong
                                        >
                                        Anim aute id magna aliqua ad ad non
                                        deserunt sunt. Qui irure qui lorem
                                        cupidatat commodo.</span
                                    >
                                </li>
                                <li class="flex gap-x-3">
                                    <ServerIcon
                                        class="mt-1 h-5 w-5 flex-none text-indigo-600"
                                        aria-hidden="true"
                                    />
                                    <span
                                        ><strong
                                            class="font-semibold text-gray-900"
                                            >Database backups.</strong
                                        >
                                        Ac tincidunt sapien vehicula erat auctor
                                        pellentesque rhoncus. Et magna sit morbi
                                        lobortis.</span
                                    >
                                </li>
                            </ul>
                            <p class="mt-8">
                                Et vitae blandit facilisi magna lacus commodo.
                                Vitae sapien duis odio id et. Id blandit
                                molestie auctor fermentum dignissim. Lacus diam
                                tincidunt ac cursus in vel. Mauris varius
                                vulputate et ultrices hac adipiscing egestas.
                                Iaculis convallis ac tempor et ut. Ac lorem vel
                                integer orci.
                            </p>
                            <h2
                                class="mt-16 text-2xl font-bold tracking-tight text-gray-900"
                            >
                                No server? No problem.
                            </h2>
                            <p class="mt-6">
                                Id orci tellus laoreet id ac. Dolor, aenean leo,
                                ac etiam consequat in. Convallis arcu ipsum urna
                                nibh. Pharetra, euismod vitae interdum mauris
                                enim, consequat vulputate nibh. Maecenas
                                pellentesque id sed tellus mauris, ultrices
                                mauris. Tincidunt enim cursus ridiculus mi.
                                Pellentesque nam sed nullam sed diam turpis
                                ipsum eu a sed convallis diam.
                            </p>
                            <time
                                class="mt-8 block text-start"
                                datetime="post.datetime"
                            >
                                Mar 16, 2020
                            </time>
                            <div
                                class="relative mt-1 flex items-center gap-x-4"
                            >
                                <img
                                    src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                                    alt=""
                                    class="h-10 w-10 rounded-full bg-gray-50"
                                />
                                <div class="text-sm leading-6">
                                    <p class="font-semibold text-gray-900">
                                        <a href="#"
                                            ><span
                                                class="absolute inset-0"
                                            ></span>
                                            Michael Foster</a
                                        >
                                    </p>
                                    <p class="text-gray-600">
                                        Co-Founder / CTO
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <Related />
    </HomeLayout>
</template>

<script setup>
import HomeLayout from "../../Layout/Home.vue";
import Related from "../../Sections/Home/Related.vue";
import {
    CloudArrowUpIcon,
    LockClosedIcon,
    ServerIcon,
} from "@heroicons/vue/20/solid";
</script>
