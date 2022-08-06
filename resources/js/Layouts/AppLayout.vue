<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetApplicationMark from "@/Jetstream/ApplicationMark.vue";
import JetBanner from "@/Jetstream/Banner.vue";
import JetDropdown from "@/Jetstream/Dropdown.vue";
import JetDropdownLink from "@/Jetstream/DropdownLink.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";
import JetResponsiveNavLink from "@/Jetstream/ResponsiveNavLink.vue";

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const open = ref(false);

const showNav = () => {
    open.value = !open.value;
    console.log("showNav");
};

const logout = () => {
    Inertia.post(route("logout"));
};
</script>

<template>
    <div>
        <Head :title="title" />

        <JetBanner />

        <!-- component -->
        <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
            <div
                @click="showNav()"
                class="sticky top-0 bg-blue-500 flex flex-col w-full md:w-64 text-gray-700 dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
            >
                <div
                    class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between"
                >
                    <a
                        :href="route('dashboard')"
                        class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"
                        >Flowtrail UI</a
                    >
                    <button
                        class="rounded-lg md:hidden focus:outline-none focus:shadow-outline"
                    >
                        <svg
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            class="w-6 h-6"
                        >
                            <path
                                v-show="!open"
                                fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                clip-rule="evenodd"
                            ></path>
                            <path
                                v-show="open"
                                fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </div>
                <nav
                    :class="{ block: open, hidden: !open }"
                    class="flex-grow md:block px-4 pb-4 md:pb-0 md:overflow-y-auto"
                >
                    <Link
                        class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('dashboard')"
                        :class="{
                            'bg-gray-200 rounded-lg':
                                route().current('dashboard'),
                        }"
                        >Home
                    </Link>
                    <a
                        class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('profile.show')"
                        :class="{
                            'bg-gray-200 rounded-lg':
                                route().current('profile.*'),
                        }"
                        >My Profile</a
                    >
                    <Link
                        class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('manage-melcs.index')"
                        >Manage MELCs</Link
                    >
                    <Link
                        class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('users.index')"
                        :class="{
                            'bg-gray-200 rounded-lg':
                                route().current('users.*'),
                        }"
                        >Manage Users
                    </Link>
                    <form @submit.prevent="logout">
                        <button type="submit">Log Out</button>
                    </form>
                </nav>
            </div>
            <div>
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
