<template>
    <AuthLayout>
        <Head title="Register" />
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Register</h1>

        <!-- Success Popup -->
        <SuccessPopup :visible="showSuccessPopup" />

        <!-- Terms and Conditions Modal -->
        <TermsModal :visible="showTermsModal" @close="closeTermsModal" />

        <!-- Registration Form -->
        <form class="space-y-4" @submit.prevent="submitForm">
            <!-- Name Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                <input
                    v-model="form.name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="text"
                />
                <p v-if="errors.name" class="text-sm text-red-500 mt-1 error-message">{{ errors.name }}</p>
            </div>

            <!-- Email Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input
                    v-model="form.email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    type="email"
                />
                <p v-if="errors.email" class="text-sm text-red-500 mt-1 error-message">{{ errors.email }}</p>
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input
                        v-model="form.password"
                        :type="showPassword ? 'text' : 'password'"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <button
                        type="button"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800"
                        @click="togglePasswordVisibility"
                    >
                        <FortAwesomeIcons :icon="showPassword ? 'eye-slash' : 'eye'" />
                    </button>
                </div>
                <p v-if="errors.password" class="text-sm text-red-500 mt-1 error-message">{{ errors.password }}</p>
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <div class="relative">
                    <input
                        v-model="form.password_confirmation"
                        :type="showConfirmPassword ? 'text' : 'password'"
                        class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <button
                        type="button"
                        class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800"
                        @click="toggleConfirmPasswordVisibility"
                    >
                        <FortAwesomeIcons :icon="showConfirmPassword ? 'eye-slash' : 'eye'" />
                    </button>
                </div>
                <p v-if="errors.password_confirmation" class="text-sm text-red-500 mt-1 error-message">
                    {{ errors.password_confirmation }}
                </p>
            </div>

            <!-- Agreement Checkbox -->
            <div class="flex items-center">
                <input
                    v-model="form.agreement"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    type="checkbox"
                />
                <label class="ml-2 block text-sm text-gray-900">
                    I agree to the
                    <a class="text-blue-500 hover:underline" href="#" @click.prevent="openTermsModal">terms and conditions</a>
                </label>
            </div>
            <p v-if="errors.agreement" class="text-sm text-red-500 mt-1 error-message">{{ errors.agreement }}</p>

            <!-- Submit Button -->
            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-2 rounded-lg transition duration-300"
            >
                <FortAwesomeIcons icon="user-plus" class="mr-2" />
                Register
            </button>

            <!-- Login Link -->
            <div class="text-center text-sm text-gray-600 mt-4">
                Already have an account?
                <a class="text-blue-500 hover:underline" href="/login">Login</a>
            </div>
        </form>
    </AuthLayout>
</template>

<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { ref, reactive } from 'vue';
import { Head, router } from '@inertiajs/vue3';
import TermsModal from '@/components/auth/TermsModal.vue';
import SuccessPopup from '@/components/auth/SuccessPopup.vue';

// State variables
const showPassword = ref(false);
const showConfirmPassword = ref(false);
const showSuccessPopup = ref(false);
const showTermsModal = ref(false);

// Form data
const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    agreement: false,
});

// Error messages
const errors = reactive({});

// Toggle password visibility
const togglePasswordVisibility = () => {
    showPassword.value = !showPassword.value;
};

const toggleConfirmPasswordVisibility = () => {
    showConfirmPassword.value = !showConfirmPassword.value;
};

// Open and close terms modal
const openTermsModal = () => {
    showTermsModal.value = true;
};

const closeTermsModal = () => {
    showTermsModal.value = false;
};

// Form submission
const submitForm = () => {
    // Reset errors
    Object.keys(errors).forEach((key) => {
        errors[key] = '';
    });

    // Validasi frontend (boleh kamu lanjutkan atau disederhanakan)
    let hasError = false;
    if (!form.name) {
        errors.name = 'Name is required.';
        hasError = true;
    }
    if (!form.email) {
        errors.email = 'Email is required.';
        hasError = true;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) {
        errors.email = 'Invalid email format.';
        hasError = true;
    }
    if (!form.password) {
        errors.password = 'Password is required.';
        hasError = true;
    } else if (form.password.length < 8) {
        errors.password = 'Password must be at least 8 characters.';
        hasError = true;
    }
    if (form.password !== form.password_confirmation) {
        errors.password_confirmation = 'Passwords do not match.';
        hasError = true;
    }
    if (!form.agreement) {
        errors.agreement = 'You must agree to the terms and conditions.';
        hasError = true;
    }

    // Kirim ke server jika valid
    if (!hasError) {
        router.post('/register', form, {
            onSuccess: () => {
                showSuccessPopup.value = true;
                setTimeout(() => {
                    showSuccessPopup.value = false;
                    router.visit('/dashboard');
                }, 2000);
            },
            onError: (serverErrors) => {
                Object.assign(errors, serverErrors);
            },
        });
    }
};

</script>

<style>
.error-message {
    background-color: #ffe5e5;
    border-left: 4px solid #f44336;
    padding: 10px;
    border-radius: 4px;
}
</style>
