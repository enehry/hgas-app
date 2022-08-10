<script setup>
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? "on" : "",
    })).post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <JetAuthenticationCard>
        <div class="hidden lg:block lg:w-1/2 bg-cover bg-[#181E36] p-6">
            <img
                src="/storage/hgas-images/louisian-icon.png"
                alt=""
                class="w-80 mx-auto p-6 pt-8"
            />
            <h2 class="text-base text-white text-center pb-3">
                UNIVERSITY OF SAINT LOUIS TUGEGARAO<br />
                SENIOR HIGH SCHOOL DEPARTMENT
            </h2>
            <h2 class="text-2xl font-semibold text-white text-center">
                HOMEROOM GUIDANCE<br />
                AUTOMATION SYSTEM
            </h2>
        </div>
        <div class="w-full p-8 lg:w-1/2">
            <h2
                class="lg:hidden text-base font-semibold text-gray-700 text-center mt-10 pb-10"
            >
                University of Saint Louis Tugegarao Senior High School
                Department <br />
                Homeroom Guidance Automation System
            </h2>

            <h2
                class="lg:show text-base font-semibold text-gray-700 text-center mt-10 pb-10"
            >
                Login to continue
            </h2>

            <form @submit.prevent="submit">
                <div>
                    <JetLabel for="email" value="Email" />
                    <JetInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autofocus
                    />
                </div>

                <div class="mt-4">
                    <JetLabel for="password" value="Password" />
                    <JetInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="current-password"
                    />
                </div>

                <div class="align-center justify-start mt-8">
                    <div class="grid grid-cols-2 gap-2">
                        <Link
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                            :href="route('register')"
                        >
                            <JetButton type="button" class="w-full h-10"
                                >Register</JetButton
                            >
                        </Link>
                        <JetButton
                            class="w-full h-10"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </JetButton>
                    </div>

                    <br />
                    <br />

                    <JetValidationErrors />

                    <div
                        v-if="status"
                        class="mb-4 font-medium text-sm text-green-600"
                    >
                        {{ status }}
                    </div>
                </div>
            </form>
        </div>
    </JetAuthenticationCard>

    <!-- <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>

        <JetValidationErrors class="mb-4" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
            </div>

            <div class="mt-4">
                <JetLabel for="password" value="Password" />
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <JetCheckbox
                        v-model:checked="form.remember"
                        name="remember"
                    />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('register')"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Register
                </Link>

                <JetButton
                    class="ml-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard> -->
</template>
