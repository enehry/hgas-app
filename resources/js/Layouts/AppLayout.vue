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
    <div class="bg-gray-100">
        <Head :title="title" />

        <JetBanner />

        <!-- component -->
        <div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
            <div
                @click="showNav()"
                class="sticky top-0 bg-[#181E36] flex flex-col w-full md:w-64 text-white dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0"
            >
                <div
                    class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between"
                >
                    <div class="pt-4 pb-2 px-6">
                        <a :href="route('profile.show')">
                            <div class="flex items-center flex-row md:flex-col">
                                <div class="shrink-0">
                                    <img
                                        src="https://scontent.fmnl25-1.fna.fbcdn.net/v/t1.6435-9/79515135_10111007623880301_5111576226921709568_n.jpg?_nc_cat=1&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGmIvzg9GscszQOyO0JRkYwQyaNjMnA6N9DJo2MycDo39imCPIDo9jsjdLWWwWMl694hQdXb6cs7vvuim0vftFn&_nc_ohc=JyItJj0hgIEAX8Af_XN&_nc_oc=AQn_NwoHlbfh7Wf_eXFZfqlaPRTqVnudB5sXvVDZCdPhrn5qSh0-UO94VcBLQu_s8wk&_nc_ht=scontent.fmnl25-1.fna&oh=00_AT-bWN_1SHF7jowktSTbkInweD1Bw-gW4EQUVdBGBk5sXw&oe=631687D6"
                                        class="rounded-full w-16 md:w-32 mx-auto"
                                        alt="Avatar"
                                    />
                                </div>
                                <br />
                                <div class="grow ml-5 md:mx-auto">
                                    <p
                                        class="text-base font-semibold text-white"
                                    >
                                        Mark Zuckerberg
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <br />
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
                        class="flex flex-row px-4 py-2 mt-2 text-base font-semibold text-white rounded-lg dark-mode:bg-gray-700 dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('dashboard')"
                        :class="{
                            'bg-white text-[#181E36] hover:bg-white rounded-lg':
                                route().current('dashboard'),
                        }"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-3"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                            />
                        </svg>
                        Home
                    </Link>
                    <Link
                        class="flex flex-row px-4 py-2 mt-2 text-base font-semibold text-white rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('profile.show')"
                        :class="{
                            'bg-white text-[#181E36] hover:bg-white rounded-lg':
                                route().current('profile.*'),
                        }"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-3"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />
                        </svg>
                        My Profile</Link
                    >
                    <Link
                        class="flex flex-row px-4 py-2 mt-2 text-base font-semibold text-white rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('manage-melcs.index')"
                        :class="{
                            'bg-white text-[#181E36] hover:bg-white rounded-lg':
                                route().current('manage-melcs.*'),
                        }"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-3"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
                            />
                        </svg>
                        Manage MELCs</Link
                    >
                    <Link
                        class="flex flex-row px-4 py-2 mt-2 mb-12 text-base font-semibold text-white rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                        :href="route('users.index')"
                        :class="{
                            'bg-white text-[#181E36] hover:bg-white rounded-lg':
                                route().current('users.*'),
                        }"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-3"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                            />
                        </svg>

                        Manage Users
                    </Link>
                    <br />
                    <form @submit.prevent="logout" class="flex justify-center">
                        <button
                            type="submit"
                            class="flex flex-row mt-4 mb-6 px-4 py-2 text-base align-center bg-white border border-transparent rounded-md font-semibold text-[#181E36] tracking-widest hover:bg-[#E5E7EB] active:bg-[#101424] focus:outline-none focus:border-[#181E36] focus:ring focus:ring-[#9BA0A8] disabled:opacity-25 transition bottom-0 absolute"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                />
                            </svg>
                            Log Out
                        </button>
                    </form>
                </nav>
            </div>
            <div class="flex max-w-7xl mx-auto min-h-screen ">
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
