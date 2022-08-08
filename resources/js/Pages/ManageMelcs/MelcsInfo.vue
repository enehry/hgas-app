<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import JetActionSection from "@/Jetstream/ActionSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetFormSection from "@/Jetstream/FormSection.vue";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";

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
    if (isUpdating.value) {
        Inertia.visit(
            route("manage-melcs.update", { melc: selectedID.value }),
            {
                method: "PUT",
                data: {
                    order: form.order,
                    description: form.description,
                },
                preserveScroll: true,
            }
        );
    } else {
        form.post(route("manage-melcs.store"), {
            onFinish: () => {
                form.order = "";
                form.description = "";
                console.log("ok");
            },
            preserveScroll: true,
        });
    }
};

const handleDelete = (id) => {
    // manual visit
    Inertia.visit(route("manage-melcs.delete", { id }), {
        method: "delete",
        preserveState: true,
        preserveScroll: true,
    });
};

const isUpdating = ref(false);
const selectedID = ref(null);

const handleEdit = (id, order, description) => {
    selectedID.value = id;
    form.order = order;
    form.description = description;
    isUpdating.value = true;
};

const onCancel = () => {
    form.order = "";
    form.description = "";
    isUpdating.value = false;
};
</script>

<template>
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
                        <div class="w-20">
                            <JetLabel>Order</JetLabel>
                            <input
                                v-model="form.order"
                                type="number"
                                class="w-full rounded-md"
                                :class="{
                                    'border-red-500': form.errors?.order,
                                }"
                            />
                            <div
                                v-if="form.errors.order"
                                class="text-xs text-red-500"
                            >
                                {{ form.errors.order }}
                            </div>
                        </div>
                        <div class="w-full">
                            <JetLabel>Description</JetLabel>
                            <textarea
                                v-model="form.description"
                                class="w-full rounded-md focus:border-gray-500"
                                rows="3"
                                maxlength="255"
                                placeholder="Enter a description..."
                                :class="{
                                    'border-red-500': form.errors?.description,
                                }"
                            />
                            <div
                                v-if="form.errors.order"
                                class="text-xs text-red-500"
                            >
                                {{ form.errors.description }}
                            </div>
                        </div>
                        <div class="mt-5 flex flex-col gap-2">
                            <JetButton class="py-2" type="submit">{{
                                isUpdating ? "Update" : "Add"
                            }}</JetButton>
                            <JetButton type="button" @click="onCancel">
                                Cancel
                            </JetButton>
                        </div>
                    </form>
                    <h2 class="font-medium uppercase text-xl mb-2">
                        Melcs List
                    </h2>
                    <ul>
                        <li v-for="melc in props.melcs">
                            <div
                                class="flex justify-between gap-4 mb-2 items-center"
                            >
                                <div>
                                    {{ melc.order }}. {{ melc.description }}
                                </div>
                                <div class="flex items-center gap-2">
                                    <button
                                        @click="handleDelete(melc.id)"
                                        class="text-red-500"
                                    >
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
                                    <button
                                        @click="
                                            handleEdit(
                                                melc.id,
                                                melc.order,
                                                melc.description
                                            )
                                        "
                                        class="text-blue-500"
                                    >
                                        <!-- pencil icon -->
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
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"
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
</template>

<style></style>
