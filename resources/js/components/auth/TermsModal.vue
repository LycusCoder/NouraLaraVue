<template>
    <div v-if="visible" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Terms and Conditions</h2>
                <button class="text-gray-600 hover:text-gray-800" @click="closeModal">
                    <FortAwesomeIcons icon="times" />
                </button>
            </div>
            <div class="terms-content">
                <p class="mb-4">
                    By using our service, you agree to the following terms and conditions.
                </p>
                <h3 class="text-lg font-bold mb-2">1. Introduction</h3>
                <p class="mb-4">
                    Welcome to NouraLara Vue! These Terms and Conditions ("Terms") govern your use of our website
                    and services. Please read these Terms carefully before using our platform.
                </p>
                <h3 class="text-lg font-bold mb-2">2. Use of Service</h3>
                <p class="mb-4">
                    You must be at least 18 years old to use our service. By registering, you agree to provide
                    accurate and up-to-date information during the registration process.
                </p>
                <h3 class="text-lg font-bold mb-2">3. Privacy and Data Protection</h3>
                <p class="mb-4">
                    We respect your privacy. Our Privacy Policy outlines how we collect, use, and protect your
                    personal data. By using our service, you consent to the practices described in our Privacy
                    Policy.
                </p>
                <h3 class="text-lg font-bold mb-2">4. User Responsibility</h3>
                <p class="mb-4">
                    You are responsible for maintaining the confidentiality of your account credentials. You agree
                    not to misuse our service, including but not limited to spamming or violating any laws.
                </p>
                <h3 class="text-lg font-bold mb-2">5. Changes to Terms</h3>
                <p class="mb-4">
                    We reserve the right to update or change these Terms at any time. Continued use of the service
                    after changes are posted constitutes acceptance of the revised Terms.
                </p>
                <h3 class="text-lg font-bold mb-2">6. Contact Us</h3>
                <p class="mb-4">
                    If you have any questions about these Terms, please contact us at <a
                        href="mailto:support@nourivex.tech">support@nourivex.tech</a>.
                </p>
            </div>
            <div class="text-right mt-4">
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300"
                    @click="closeModal">Close</button>
            </div>
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

const emit = defineEmits(['close']);

const closeModal = () => {
    emit('close');
};
</script>
