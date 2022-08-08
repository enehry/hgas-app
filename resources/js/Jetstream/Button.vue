<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <!-- <button :type="type" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
        <slot />
    </button> -->

    <button :type="type" class="px-4 py-2 text-base bg-[#181E36] border border-transparent rounded-md font-semibold  text-white tracking-widest hover:bg-[#656979] active:bg-[#101424] focus:outline-none focus:border-[#181E36] focus:ring focus:ring-[#9BA0A8] disabled:opacity-25 transition">
        <slot />
    </button>
</template>
