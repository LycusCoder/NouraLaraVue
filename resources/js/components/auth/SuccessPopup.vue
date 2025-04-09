<template>
    <div v-if="visible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center relative">
            <div
                class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12 absolute top-0 left-0 right-0 mx-auto mt-4">
            </div>
            <FortAwesomeIcons icon="check-circle" class="text-green-500 text-6xl mb-4 mt-16" />
            <p class="text-green-500 text-lg font-semibold mb-4">Account created successfully!</p>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    visible: {
        type: Boolean,
        required: true,
    },
});
</script>

<style scoped>
.loader {
    border-top-color: #3498db;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
</style>
