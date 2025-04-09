<template>
    <AuthLayout>
        <Head title="Forgot Password" />

        <form @submit.prevent="submit">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input v-model="form.email" type="email" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <button type="submit"
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                    <FortAwesomeIcons icon="key" class="mr-2" />
                    Send Reset Link
                </button>

                <div class="text-center text-sm text-gray-600 mt-4">
                    Remember your password?
                    <a href="/login" class="text-blue-500 hover:underline">Login</a>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>

<script setup>
import { reactive } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const form = reactive({
    email: '',
})

function submit() {
    router.post('/forgot-password', form)
}
</script>
