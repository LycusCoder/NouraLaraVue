<template>
    <AuthLayout>
        <Head title="Verify Email" />

        <div class="space-y-4">
            <h1 class="text-2xl font-bold text-gray-800">Verify Your Email Address</h1>

            <p class="text-sm text-gray-600">
                Before proceeding, please check your email for a verification link.
                If you did not receive the email, we can send another one.
            </p>

            <div v-if="status" class="text-sm text-green-600">
                {{ status }}
            </div>

            <button @click="resendVerification"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition duration-300">
                <FortAwesomeIcons icon="envelope" class="mr-2" />
                Resend Verification Link
            </button>

            <div class="text-center text-sm text-gray-600 mt-4">
                Back to
                <a href="/login" class="text-blue-500 hover:underline">Login</a>
            </div>
        </div>
    </AuthLayout>
</template>

<script setup>
import { ref } from 'vue'
import { router, usePage } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const page = usePage()
const status = ref(page.props.status || null)

function resendVerification() {
    router.post('/email/verification-notification', {}, {
        onSuccess: () => {
            status.value = 'A new verification link has been sent to your email address.'
        },
    })
}
</script>
