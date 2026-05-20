<script setup>

import { ref } from 'vue'

const mobileMenu = ref(false)

const props = defineProps({

    user: Object,
    isAdmin: Boolean

})
const csrf = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute('content')


</script>

<template>

        <nav
            class="
                bg-white/90
                backdrop-blur-xl
                shadow-md
                border-b
                border-white/40

                sticky
                top-0
                z-50
            "
        >

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex justify-between h-16 items-center">

                <!-- LEFT -->

                <div class="flex items-center gap-10">

                    <a
                        href="/"
                        class="
                            text-3xl
                            font-extrabold
                            text-orange-500
                            tracking-tight
                        "
                    >
                        BLOG.
                    </a>

                    <!-- DESKTOP MENU -->

                    <div
                        class="
                            hidden
                            md:flex
                            items-center
                            gap-6
                        "
                    >

                        <a
                            href="/dashboard"
                            class="
                                text-gray-700
                                hover:text-orange-500
                                font-medium
                                transition
                            "
                        >
                            Dashboard
                        </a>

                        <a
                            :href="`/profile/${user.id}`"
                            class="
                                text-gray-700
                                hover:text-orange-500
                                font-medium
                                transition
                            "
                        >
                            Profile
                        </a>

                        <a
                            v-if="isAdmin"
                            href="/admin"
                            class="
                                text-gray-700
                                hover:text-orange-500
                                font-medium
                                transition
                            "
                        >
                            Admin
                        </a>

                    </div>

                </div>

                <!-- RIGHT -->

                <div
                    class="
                        hidden
                        md:flex
                        items-center
                        gap-5
                    "
                >

                    <div class="text-right">
                        <p
                            class="
                                font-semibold
                                text-gray-800
                                leading-tight
                            "
                        >
                            {{ user.name }}
                        </p>

                        <p class="text-sm text-gray-400">

                            {{ user.email }}

                        </p>

                    </div>

                    <form
                        method="POST"
                        action="/logout"
                    >

                        <input
                            type="hidden"
                            name="_token"
                            :value="csrf"
                        >

                        <button
                            type="submit"
                            class="
                                bg-red-500
                                hover:bg-red-600
                                text-white
                                px-6
                                py-3
                                rounded-2xl
                                font-semibold
                                shadow
                                transition
                            "
                        >
                            Logout
                        </button>

                    </form>

                </div>

                <!-- MOBILE BUTTON -->

                <div class="md:hidden">

                    <button
                        @click="mobileMenu = !mobileMenu"
                        class="
                            text-gray-700
                            focus:outline-none
                            text-3xl
                        "
                    >
                        ☰
                    </button>

                </div>

            </div>

        </div>



        <!-- MOBILE MENU -->

                        <div
                v-if="mobileMenu"
                class="
                    absolute
                    top-16
                    left-0
                    w-full

                    md:hidden

                    border-t
                    border-gray-100

                    bg-white

                    px-4
                    py-5

                    space-y-4

                    shadow-xl
                    z-50
                "
            >

            <div>

                <p class="font-semibold text-gray-800">

                    {{ user.name }}

                </p>

                <p class="text-sm text-gray-400">

                    {{ user.email }}

                </p>

            </div>

            <a
                href="/dashboard"
                class="
                    block
                    text-gray-700
                    hover:text-orange-500
                    font-medium
                "
            >
                Dashboard
            </a>

            <a
                :href="`/profile/${user.id}`"
                class="
                    block
                    text-gray-700
                    hover:text-orange-500
                    font-medium
                "
            >
                Profile
            </a>

            <a
                v-if="isAdmin"
                href="/admin"
                class="
                    block
                    text-gray-700
                    hover:text-orange-500
                    font-medium
                "
            >
                Admin
            </a>

        </div>

    </nav>

</template>
