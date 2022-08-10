<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Welcome from "@/Jetstream/Welcome.vue";
import Button from "@/Jetstream/Button.vue";
import { ref } from "vue";
import { useForm, Link } from "@inertiajs/inertia-vue3";
import ValidationErrors from "@/Jetstream/ValidationErrors.vue";

const form = useForm({
    file: "",
});

const onChangeFile = (e) => {
    form.file = e.target.files[0];
};

const isLoading = ref(false);

const generate = () => {
    isLoading.value = true;
    form.post(route("generate"), {
        onFinish: () => {
            removeFile();
            isLoading.value = false;
        },
    });
};

const removeFile = () => {
    document.getElementById("dropzone-file").value = null;
    form.file = null;
};

const props = defineProps({
    melcs: {
        type: Array,
        default: () => [],
    },
    certificate: {
        type: Object,
        default: () => {},
    },
    generatedCert: {
        type: Object,
        default: () => {},
    },
});

const isGenerateEnabled = () =>
    props.melcs.length <= 0 ||
    Object.values(props.certificate).every((x) => x === null || x === "");
</script>

<template>
    <AppLayout title="Dashboard">
        <div
            class="flex flex-col gap-4 min-h-screen items-center justify-center bg-gray-100 font-sans w-full"
        >
            <ValidationErrors />
            <label
                for="dropzone-file"
                class="mx-auto cursor-pointer flex w-full max-w-lg flex-col items-center rounded-xl border-2 border-dashed border-[#181E36] bg-white p-6 text-center"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-10 w-10 text-[#181E36]"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                    />
                </svg>

                <h2
                    class="mt-4 text-xl font-medium text-gray-700 tracking-wide"
                >
                    Excel File Upload
                </h2>

                <p class="mt-2 text-gray-500 tracking-wide">
                    Upload or drag & drop your file xlx, xlsx.
                </p>

                <input
                    id="dropzone-file"
                    type="file"
                    class="hidden"
                    accept=".xlx, .xlsx"
                    @change="onChangeFile"
                    ref="file"
                />
            </label>
            <div v-if="form.file" class="flex items-center gap-4">
                <p class="my-2 text-blue-500">{{ form.file.name }}</p>
                <!-- close icon -->
                <button @click="removeFile">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-red-500"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="text-gray-500" v-if="isGenerateEnabled()">
                MELCS Settings is not configured please configure it
                <Link class="text-blue-500" :href="route('manage-melcs.index')"
                    >here</Link
                >
            </div>
            <div v-if="isLoading" class="flex gap-4 items-center">
                <div
                    style="border-top-color: transparent"
                    class="w-10 h-10 border-4 border-[#181E36] border-solid rounded-full animate-spin"
                ></div>
                <p class="text-gray-500">
                    Please wait this will take a minute or two..
                </p>
            </div>

            <Button
                :disabled="isGenerateEnabled() || isLoading"
                @click="generate"
            >
                Generate</Button
            >
            <a
                class="uppercase font-bold mt-2"
                v-if="props.generatedCert != null"
                :href="props.generatedCert.path"
                download
                >Download</a
            >
        </div>
    </AppLayout>
</template>
