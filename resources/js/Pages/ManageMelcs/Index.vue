<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head, useForm } from "@inertiajs/inertia-vue3";
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";

const props = defineProps({
    melcs: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({
    order: "",
    description: "",
});

const handelSubmit = () => {
    form.post(route("manage-melcs.store"), {
        onFinish: () => {},
    });
};
</script>
<template>
    <AppLayout>
        <Head title="Manage MELCs" />
        <div class="p-10">
            <JetActionSection>
                <template #title> MELCs Information </template>

                <template #description>
                    Manage MELCs that will appear on student's certificate.
                </template>
                <template #content>
                    <div>
                        <form
                            @submit.prevent="handelSubmit"
                            class="mb-4 flex gap-4"
                        >
                            <div class="">
                                <JetLabel>Order</JetLabel>
                                <input
                                    v-model="form.order"
                                    type="number"
                                    placeholder="1"
                                    class="w-20 rounded-md"
                                />
                            </div>
                            <div class="w-full">
                                <JetLabel>Description</JetLabel>
                                <textarea
                                    v-model="form.description"
                                    class="w-full rounded-md focus:border-gray-500"
                                    rows="1"
                                    maxlength="255"
                                    placeholder="Enter a description..."
                                />
                            </div>
                            <div class="mt-5">
                                <JetButton class="py-3" type="submit"
                                    >Add</JetButton
                                >
                            </div>
                        </form>
                        <h2 class="font-medium uppercase text-xl mb-2">
                            Melcs List
                        </h2>
                        <ul>
                            <li v-for="melc in props.melcs">
                                <div class="flex justify-between gap-4 mb-2">
                                    <div>
                                        {{ melc.order }}. {{ melc.description }}
                                    </div>
                                    <div>
                                        <button class="text-red-500">
                                            <!--- trash icon -->
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </template>
            </JetActionSection>
        </div>
    </AppLayout>
</template>

<style></style>
