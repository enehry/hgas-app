<template>
    <AppLayout title="Manage Users">
        <Head title="Users" />
        <div class="flex flex-col p-6 w-[50rem]">
            <div class="overflow-x-auto">
                <div class="flex justify-between py-3 pl-2">
                    <div class="relative max-w-2xl">
                        <label for="search" class="sr-only"> Search </label>
                        <input
                            type="text"
                            name="search"
                            class="block w-full p-3 pl-10 text-sm border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm bg-white"
                            placeholder="Search..."
                            v-model="filter.search"
                        />
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-5 h-5 text-gray-400"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                                />
                            </svg>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <!-- <button
                                class="relative z-0 inline-flex text-sm mr-2 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm bg-white"
                            >
                                <span
                                    class="relative inline-flex items-center px-3 py-3 space-x-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-md sm:py-2"
                                >
                                    <div>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-4 h-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"
                                            />
                                        </svg>
                                    </div>
                                    <div class="hidden sm:block">Filters</div>
                                </span>
                            </button> -->
                        </div>
                    </div>
                </div>

                <div class="p-1.5 w-full inline-block align-middle">
                    <div class="overflow-hidden border rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#181E36] text-white h-16">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-bold text-left uppercase"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-bold text-left uppercase"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-bold text-left uppercase"
                                    >
                                        Role
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-bold text-right uppercase"
                                    >
                                        Edit
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-bold text-right uppercase"
                                    >
                                        Delete
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                <tr v-if="users.length <= 0">
                                    <td
                                        colspan="5"
                                        class="px-6 py-4 text-center whitespace-no-wrap text-sm leading-5 font-medium text-gray-900"
                                    >
                                        User is empty or not found
                                    </td>
                                </tr>
                                <tr v-for="user in users" :key="user.id">
                                    <td
                                        class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap"
                                    >
                                        {{ user.name }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                                    >
                                        {{ user.email }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm text-gray-800 whitespace-nowrap"
                                    >
                                        {{ user.role }}
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
                                    >
                                        <button
                                            class="text-green-500 hover:text-green-700"
                                            v-on:click="toggleModal(user)"
                                        >
                                            Edit
                                        </button>
                                    </td>
                                    <td
                                        class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap"
                                    >
                                        <button
                                            class="text-red-500 hover:text-red-700"
                                            v-on:click="toggleDelete(user)"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div>
            <div
                v-if="showModal"
                class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
            >
                <div class="relative w-auto my-6 mx-auto max-w-6xl">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                    >
                        <!--header-->
                        <div
                            class="text-center justify-between p-5 border-b border-solid border-slate-200 rounded-t bg-[#181E36] text-white uppercase font-semibold"
                        >
                            <p>Edit account</p>
                        </div>
                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <div class="grid w-96">
                                <ValidationErrors />
                                <label
                                    for="name"
                                    class="mb-1 mt-4 block font-medium text-sm text-gray-700"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    id="name"
                                    v-model="form.name"
                                    :class="{
                                        'border-red-500': errors?.name,
                                    }"
                                    class="mb-3 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm"
                                />
                                <InputError
                                    class="mb-2"
                                    :message="errors?.name"
                                />
                                <label
                                    for="email"
                                    class="mb-1 block font-medium text-sm text-gray-700"
                                    >Email</label
                                >
                                <input
                                    type="text"
                                    v-model="form.email"
                                    :class="{
                                        'border-red-500': errors?.email,
                                    }"
                                    id="email"
                                    class="mb-3 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm"
                                />
                                <InputError
                                    class="mb-2"
                                    :message="errors?.email"
                                />
                                <label
                                    for="role"
                                    class="mb-1 block font-medium text-sm text-gray-700"
                                    >Role</label
                                >
                                <select
                                    v-model="form.role"
                                    :class="{
                                        'border-red-500': errors?.role,
                                    }"
                                    class="mb-3 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm"
                                >
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                <InputError
                                    class="mb-2"
                                    :message="errors?.role"
                                />

                                <label
                                    for="password"
                                    class="mb-1 block font-medium text-sm text-gray-700"
                                    >New password</label
                                >
                                <input
                                    type="text"
                                    v-model="form.password"
                                    :class="{
                                        'border-red-500': errors?.password,
                                    }"
                                    id="password"
                                    class="mb-3 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm"
                                />
                                <InputError
                                    class="mb-2"
                                    :message="errors?.password"
                                />

                                <label
                                    for="name"
                                    class="mb-1 block font-medium text-sm text-gray-700"
                                    >Retype password</label
                                >
                                <input
                                    type="text"
                                    v-model="form.password_confirmation"
                                    :class="{
                                        'border-red-500':
                                            errors?.password_confirmation,
                                    }"
                                    id="name"
                                    class="mb-3 border-gray-300 focus:border-[#181E36] focus:ring focus:ring-[#374151] focus:ring-opacity-50 rounded-md shadow-sm"
                                />
                                <InputError
                                    class="mb-2"
                                    :message="errors?.password_confirmation"
                                />
                            </div>
                        </div>
                        <!--footer-->
                        <div
                            class="flex items-center justify-end p-2 pr-6 pb-6 border-slate-200 rounded-b"
                        >
                            <button
                                class="px-4 py-2 text-base mx-1 bg-white border border-transparent rounded-md font-semibold text-[#181E36] tracking-widest hover:text-[#AAAAAA] disabled:opacity-25 transition"
                                type="button"
                                @click="toggleModal(null)"
                            >
                                Cancel
                            </button>
                            <button
                                class="px-4 py-2 text-base bg-[#181E36] border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-[#656979] hover:text-[#C6C6C6] active:bg-[#101424] focus:outline-none focus:border-[#181E36] focus:ring focus:ring-[#9BA0A8] disabled:opacity-25 transition"
                                type="button"
                                @click="updateConfirmed()"
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="showModal"
                class="opacity-25 fixed inset-0 z-40 bg-black"
            ></div>
        </div>

        <!-- Delete Modal -->
        <div>
            <div
                v-if="showDeleteConfirm"
                class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
            >
                <div class="relative w-auto my-6 mx-auto max-w-6xl">
                    <!--content-->
                    <div
                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                    >
                        <!--header-->
                        <div
                            class="text-center justify-between p-5 border-b border-solid border-slate-200 rounded-t bg-[#181E36] text-white uppercase font-semibold"
                        >
                            <p>Delete account</p>
                        </div>

                        <!--body-->
                        <div class="relative p-6 flex-auto">
                            <p
                                class="my-1 text-slate-500 text-lg leading-relaxed"
                            >
                                Do you really want to delete this account?
                            </p>
                        </div>
                        <!--footer-->
                        <div
                            class="flex items-center justify-end p-2 pr-6 pb-6 border-slate-200 rounded-b"
                        >
                            <button
                                class="px-4 py-2 text-base mx-1 bg-white border border-transparent rounded-md font-semibold text-[#181E36] tracking-widest hover:text-[#AAAAAA] disabled:opacity-25 transition"
                                type="button"
                                v-on:click="toggleDelete(null)"
                            >
                                No
                            </button>
                            <button
                                class="px-4 py-2 text-base bg-[#181E36] border border-transparent rounded-md font-semibold text-white tracking-widest hover:bg-[#656979] hover:text-[#C6C6C6] active:bg-[#101424] focus:outline-none focus:border-[#181E36] focus:ring focus:ring-[#9BA0A8] disabled:opacity-25 transition"
                                type="button"
                                @click="deleteConfirmed()"
                            >
                                Yes
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div
                v-if="showDeleteConfirm"
                class="opacity-25 fixed inset-0 z-40 bg-black"
            ></div>
        </div>
    </AppLayout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import ValidationErrors from "@/Jetstream/ValidationErrors.vue";
import InputError from "@/Jetstream/InputError.vue";
import throttle from "lodash/throttle";
import pickBy from "lodash/pickBy";
export default {
    components: {
        AppLayout,
        Head,
        ValidationErrors,
        InputError,
    },
    props: {
        users: {
            type: Array,
            default: () => [],
        },
        errors: {
            type: Object,
            default: () => ({}),
        },
    },

    name: "modal",
    data() {
        return {
            showModal: false,
            showDeleteConfirm: false,
            selectedUser: null,
            form: useForm({
                name: "",
                role: "",
                email: "",
                password: "",
                password_confirmation: "",
            }),
            filter: {
                search: "",
            },
        };
    },
    methods: {
        toggleModal: function (user) {
            this.selectedUser = user;
            if (user != null) {
                this.form.name = user.name;
                this.form.role = user.role;
                this.form.email = user.email;
                this.form.password = "";
                this.form.password_confirmation = "";
                this.$page.props.errors = {};
            }
            this.showModal = !this.showModal;
        },
        toggleDelete: function (user) {
            this.selectedUser = user;
            this.showDeleteConfirm = !this.showDeleteConfirm;
        },
        updateConfirmed: function () {
            this.form.put(
                route("users.update", {
                    user: this.selectedUser.id,
                }),
                {
                    onSuccess: () => {
                        this.toggleModal(null);
                        this.form.reset();
                    },
                    preserveScroll: true,
                    preserveState: true,
                }
            );
        },
        deleteConfirmed: function () {
            if (this.selectedUser != null) {
                Inertia.visit(route("users.destroy", this.selectedUser.id), {
                    method: "delete",
                    preserveScroll: true,
                    preserveState: true,
                    onFinish: () => {
                        this.showDeleteConfirm = false;
                    },
                });
            }
        },
    },
    watch: {
        filter: {
            handler: throttle(function () {
                let filter = pickBy(this.filter);
                Inertia.get(this.route("users.index"), filter, {
                    preserveState: true,
                    preserveScroll: true,
                    replace: true,
                });
            }, 500),
            deep: true,
        },
    },
};
</script>

<style></style>
