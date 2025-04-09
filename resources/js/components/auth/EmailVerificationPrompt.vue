<template>
    <div class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div class="bg-white/95 dark:bg-gray-900 rounded-3xl p-8 max-w-md w-full space-y-6">
            <div class="text-center">
                <Icon name="shield-check" class="text-green-500 text-6xl mx-auto mb-4" />
                <h3 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Verify Your Email
                </h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Please verify your email before continuing
                </p>
            </div>

            <div class="space-y-4">
                <button @click="resend"
                    class="w-full py-3.5 bg-gradient-to-r from-cyan-400 to-blue-600 rounded-xl text-white font-semibold transition hover:opacity-90">
                    <Icon name="redo-alt" class="mr-2" /> Resend Verification
                </button>
                <button @click="logout"
                    class="w-full py-3.5 bg-gray-200 dark:bg-gray-700 rounded-xl text-gray-700 dark:text-gray-300 font-semibold transition hover:bg-gray-300 dark:hover:bg-gray-600">
                    <Icon name="sign-out-alt" class="mr-2" /> Logout
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3';

const resend = () => {
    router.post(route('verification.send'));
};

const logout = () => {
    router.post(route('logout'));
};
</script>
