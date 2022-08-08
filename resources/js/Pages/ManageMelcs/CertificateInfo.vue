<script setup>
import JetFormSection from "@/Jetstream/FormSection.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetSecondaryButton from "@/Jetstream/SecondaryButton.vue";
import { ref } from "vue";

const form = useForm({
    school_year: props.certificate.school_year,
    adviser: props.certificate.adviser,
    title: props.certificate.title,
    signature: null,
    grade_section: props.certificate.grade_section,
});

const signaturePreview = ref(null);
const signatureInput = ref(null);

const props = defineProps({
    certificate: {
        type: Object,
        default: () => {},
    },
});

const handleSubmit = () => {
    if (signatureInput.value) {
        form.signature = signatureInput.value.files[0];
    }
    form.post(route("manage-melcs.cert-info"));
};

const handleUpdateSignature = () => {};

const selectNewSignature = () => {
    signatureInput.value.click();
};

const updateSignaturePreview = () => {
    const signature = signatureInput.value.files[0];

    if (!signature) return;

    const reader = new FileReader();

    reader.onload = (e) => {
        signaturePreview.value = e.target.result;
    };

    reader.readAsDataURL(signature);
};
</script>

<template>
    <div class="p-10">
        <JetFormSection @submitted="handleSubmit">
            <template #title> Certificate Information </template>

            <template #description>
                Edit the certificate SY, Adviser, and Title
            </template>
            <template #form>
                <div class="w-full col-span-3">
                    <JetLabel for="school-year" value="School Year" />
                    <JetInput
                        id="school-year"
                        v-model="form.school_year"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="school-year"
                        placeholder="ex. 2022 - 2023"
                    />
                    <JetInputError
                        :message="form.errors.school_year"
                        class="mt-2"
                    />
                </div>
                <div class="w-full col-span-3">
                    <JetLabel for="title" value="Certificate Title" />
                    <JetInput
                        id="title"
                        v-model="form.title"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="ex. FINAL TERM HOMEROOM GUIDANCE"
                        autocomplete="title"
                    />
                    <JetInputError :message="form.errors.title" class="mt-2" />
                </div>
                <div class="w-full col-span-3">
                    <JetLabel for="adviser" value="Adviser" />
                    <JetInput
                        id="adviser"
                        v-model="form.adviser"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="adviser"
                        placeholder="ex. Mrs. Jane Doe"
                    />
                    <JetInputError
                        :message="form.errors.adviser"
                        class="mt-2"
                    />
                </div>
                <div class="w-full col-span-3">
                    <JetLabel for="grade-section" value="Grade and Section" />
                    <JetInput
                        id="grade-section"
                        v-model="form.grade_section"
                        type="text"
                        class="mt-1 block w-full"
                        autocomplete="grade-section"
                        placeholder="ex. G11 ST. JEROME"
                    />
                    <JetInputError
                        :message="form.errors.grade_section"
                        class="mt-2"
                    />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <!-- Signature Input -->
                    <input
                        ref="signatureInput"
                        type="file"
                        class="hidden"
                        @change="updateSignaturePreview"
                    />

                    <JetLabel for="photo" value="Photo" />

                    <!-- Current Signature -->
                    <div v-show="!signaturePreview" class="mt-2">
                        <img
                            :src="
                                props.certificate.signature
                                    ? props.certificate.signature
                                    : 'https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg'
                            "
                            alt="signature"
                            class="h-20 w-40 object-cover"
                        />
                    </div>

                    <!-- New Profile Photo Preview -->
                    <div v-show="signaturePreview" class="mt-2">
                        <span
                            class="block w-40 h-20 bg-cover bg-no-repeat bg-center"
                            :style="
                                'background-image: url(\'' +
                                signaturePreview +
                                '\');'
                            "
                        />
                    </div>

                    <JetSecondaryButton
                        class="mt-2 mr-2"
                        type="button"
                        @click.prevent="selectNewSignature"
                    >
                        Select A New Photo
                    </JetSecondaryButton>

                    <JetSecondaryButton
                        v-if="props.certificate.signature"
                        type="button"
                        class="mt-2"
                    >
                        Remove Photo
                    </JetSecondaryButton>

                    <JetInputError :message="form.errors.photo" class="mt-2" />
                </div>
            </template>
            <template #actions> <JetButton>Save</JetButton></template>
        </JetFormSection>
    </div>
</template>

<style></style>
