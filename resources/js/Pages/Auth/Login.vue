<template>
    <AuthLayout>
        <Head title="Login" />

        <form @submit.prevent="submit">
            <div class="space-y-4">
                <!-- Email Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input
                        v-model="form.email"
                        type="email"
                        required
                        :class="[
                            form.errors.email ? 'border-red-500' : 'border-gray-300',
                            'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500'
                        ]"
                    />
                    <p v-if="form.errors.email" class="text-sm text-red-500 mt-1">{{ form.errors.email }}</p>
                </div>

                <!-- Password Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <div class="relative">
                        <input
                            v-model="form.password"
                            :type="showPassword ? 'text' : 'password'"
                            required
                            :class="[
                                form.errors.password ? 'border-red-500' : 'border-gray-300',
                                'w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500'
                            ]"
                        />
                        <button
                            type="button"
                            class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-600 hover:text-gray-800"
                            @click="togglePasswordVisibility"
                        >
                            <svg
                                v-if="showPassword"
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                />
                            </svg>
                            <svg
                                v-else
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.519 3.519m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"
                                />
                            </svg>
                        </button>
                    </div>
                    <p v-if="form.errors.password" class="text-sm text-red-500 mt-1">{{ form.errors.password }}</p>
                </div>

                <!-- Remember Me and Forgot Password -->
                <div class="flex justify-between items-center text-sm text-gray-600">
                    <label class="inline-flex items-center">
                        <input
                            type="checkbox"
                            v-model="form.remember"
                            class="rounded border-gray-300 text-blue-500 focus:ring-blue-500"
                        />
                        <span class="ml-2">Remember me</span>
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-lg transition duration-300"
                >
                    <FortAwesomeIcons icon="right-to-bracket" class="mr-2" />
                    Login
                </button>

                <!-- Register Link -->
                <div class="text-center text-sm text-gray-600 mt-4">
                    Don’t have an account?
                    <a href="/register" class="text-blue-500 hover:underline">Register</a>
                </div>
            </div>
        </form>
    </AuthLayout>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { Head, router, usePage } from '@inertiajs/vue3'
import AuthLayout from '@/Layouts/AuthLayout.vue'

const showPassword = ref(false)
const form = reactive({
    email: '',
    password: '',
    remember: false,
    errors: usePage().props.errors || {}, // Ambil error dari Inertia
})

function submit() {
    router.post('/login', form)
}

function togglePasswordVisibility() {
    showPassword.value = !showPassword.value
}
</script>
