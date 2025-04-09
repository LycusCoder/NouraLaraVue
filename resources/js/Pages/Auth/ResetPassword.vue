<template>
    <AuthLayout>
        <Head title="Reset Password" />

        <form @submit.prevent="submit">
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input v-model="form.email" type="email" disabled
                           class="w-full px-4 py-2 border rounded-lg bg-gray-100 cursor-not-allowed" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input v-model="form.password" type="password" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                    <input v-model="form.password_confirmation" type="password" required
                           class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <button type="submit"
                        class="w-full bg-purple-500 hover:bg-purple-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                    <FortAwesomeIcons icon="lock" class="mr-2" />
                    Reset Password
                </button>

                <div class="text-center text-sm text-gray-600 mt-4">
                    Back to
                    <a href="/login" class="text-blue-500 hover:underline">Login</a>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>

<script setup>
import { reactive } from 'vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const page = usePage()
const token = page.props.token // Token dari URL atau props

const form = reactive({
    token: token,
    email: page.props.email || '', // Email dari props atau URL
    password: '',
    password_confirmation: '',
})

function submit() {
    router.post('/reset-password', form)
}
</script>
