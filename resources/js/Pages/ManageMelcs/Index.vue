<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import MelcsInfo from "./MelcsInfo.vue";
import CertificateInfo from "./CertificateInfo.vue";

defineProps({
    melcs: {
        type: Array,
        default: () => [],
    },
    certificate: {
        type: Object,
        default: () => {},
    },
});
</script>
<template>
    <AppLayout>
        <Head title="Manage MELCs" />
        <CertificateInfo :certificate="certificate" />
        <MelcsInfo :melcs="melcs" />
    </AppLayout>
</template>

<style></style>
