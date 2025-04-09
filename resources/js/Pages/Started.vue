<script>
import { Head, router } from '@inertiajs/vue3'; // Pastikan Head diimpor
import GuestLayout from '@/Layouts/GuestLayout.vue';

export default {
    components: {
        Head,
        GuestLayout,
    },
    data() {
        return {
            guides: [
                {
                    title: 'Using Tailwind CSS',
                    content:
                        'This project uses Tailwind CSS as the CSS framework. You can easily customize the appearance with Tailwind classes.',
                    visible: false,
                },
                {
                    title: 'Integrating FontAwesome Icons',
                    content:
                        'You can use the `<FortAwesomeIcons>` component to display icons from FontAwesome. Example: `<FortAwesomeIcons icon="rocket" />`',
                    visible: false,
                },
                {
                    title: 'Other Configurations',
                    content:
                        'For further configurations, see the `app.js` file and the documentation for Laravel and Vue.js.',
                    visible: false,
                },
            ],
        };
    },
    methods: {
        copyToClipboard(text) {
            // Fallback jika navigator.clipboard tidak tersedia
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text)
                    .then(() => {
                        alert(`Copied: ${text}`);
                    })
                    .catch((err) => {
                        console.error('Failed to copy text: ', err);
                        this.fallbackCopyToClipboard(text); // Gunakan fallback
                    });
            } else {
                this.fallbackCopyToClipboard(text);
            }
        },
        fallbackCopyToClipboard(text) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            try {
                document.execCommand('copy');
                alert(`Copied: ${text}`);
            } catch (err) {
                console.error('Fallback copy failed: ', err);
                alert('Failed to copy text. Please try again.');
            }
            document.body.removeChild(textarea);
        },
        toggleGuide(index) {
            this.guides[index].visible = !this.guides[index].visible;
        },
        goToWelcome() {
            router.visit(route('welcome'));
        },
    },
};
</script>

<template>
    <GuestLayout>

        <Head title="Getting Started" />

        <!-- Header -->
        <section class="bg-gradient-to-r from-blue-500 to-purple-600 py-20 text-white">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Getting Started with NouraLara Vue</h1>
                <p class="text-lg md:text-xl mb-8">
                    A comprehensive guide to help you get started with the features and functionalities of NouraLara
                    Vue.
                </p>

                <!-- Tombol Back to Home -->
                <button @click="goToWelcome"
                    class="bg-white text-blue-500 px-6 py-2 rounded-full font-semibold hover:bg-gray-100 transition">
                    <FortAwesomeIcons icon="house" class="text-blue-500 text-lg" />
                    Back to Home
                </button>
            </div>
        </section>

        <!-- Autentikasi -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">Authentication</h2>
                <p class="text-lg text-gray-700 mb-12 text-center">
                    This project comes with a basic authentication system using Laravel Sanctum and Vue.js.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Login -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold mb-4 flex items-center">
                            <FortAwesomeIcons icon="right-to-bracket" class="text-blue-500 text-2xl mr-2" /> Login
                        </h3>
                        <p class="text-lg text-gray-600 mb-4">
                            Use the login form to access your account.
                        </p>
                        <p class="text-lg text-gray-600 mb-4">
                            <strong>Endpoint:</strong> <code class="bg-gray-100 p-1 rounded">/login</code>
                        </p>
                        <button @click="copyToClipboard('/login')"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Copy Endpoint
                        </button>
                    </div>

                    <!-- Register -->
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <h3 class="text-2xl font-semibold mb-4 flex items-center">
                            <FortAwesomeIcons icon="user-plus" class="text-blue-500 text-2xl mr-2" /> Register
                        </h3>
                        <p class="text-lg text-gray-600 mb-4">
                            Register a new account using the registration form.
                        </p>
                        <p class="text-lg text-gray-600 mb-4">
                            <strong>Endpoint:</strong> <code class="bg-gray-100 p-1 rounded">/register</code>
                        </p>
                        <button @click="copyToClipboard('/register')"
                            class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                            Copy Endpoint
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Fitur Utama -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">Main Features</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 justify-center">
                    <!-- Fast & Efficient -->
                    <div
                        class="relative bg-white p-8 rounded-lg shadow-lg text-center transform transition hover:scale-105">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white p-2 rounded-full">
                            <FortAwesomeIcons icon="rocket" class="text-2xl" />
                        </div>
                        <h3 class="text-2xl font-semibold mb-2">Fast & Efficient</h3>
                        <p class="text-gray-600">
                            Quick and efficient solutions for your digital needs.
                        </p>
                    </div>

                    <!-- Clean Code -->
                    <div
                        class="relative bg-white p-8 rounded-lg shadow-lg text-center transform transition hover:scale-105">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white p-2 rounded-full">
                            <FortAwesomeIcons icon="code" class="text-2xl" />
                        </div>
                        <h3 class="text-2xl font-semibold mb-2">Clean Code</h3>
                        <p class="text-gray-600">
                            Clean and understandable code for better development.
                        </p>
                    </div>

                    <!-- FontAwesome Icons -->
                    <div
                        class="relative bg-white p-8 rounded-lg shadow-lg text-center transform transition hover:scale-105">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white p-2 rounded-full">
                            <FortAwesomeIcons icon="icons" class="text-2xl" />
                        </div>
                        <h3 class="text-2xl font-semibold mb-2">FontAwesome Icons</h3>
                        <p class="text-gray-600">
                            Global access to FontAwesome icons for your project.
                        </p>
                    </div>

                    <!-- Authentication -->
                    <div
                        class="relative bg-white p-8 rounded-lg shadow-lg text-center transform transition hover:scale-105">
                        <div class="absolute top-4 right-4 bg-blue-500 text-white p-2 rounded-full">
                            <FortAwesomeIcons icon="lock" class="text-2xl" />
                        </div>
                        <h3 class="text-2xl font-semibold mb-2">Authentication</h3>
                        <p class="text-gray-600">
                            Built-in authentication for secure access.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Panduan Tambahan -->
        <section class="py-16 bg-gradient-to-r from-purple-600 to-blue-500 text-white">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold mb-8 text-center">Additional Guides</h2>
                <p class="text-lg mb-12 text-center">
                    Here are some additional guides to help you get started:
                </p>

                <div class="space-y-8">
                    <div v-for="(guide, index) in guides" :key="index"
                        class="bg-white p-8 rounded-lg shadow-lg text-gray-800">
                        <h3 @click="toggleGuide(index)"
                            class="text-2xl font-semibold cursor-pointer flex justify-between items-center">
                            {{ guide.title }}
                            <FortAwesomeIcons :icon="guide.visible ? 'chevron-up' : 'chevron-down'"
                                class="text-blue-500 text-lg" />
                        </h3>
                        <div v-if="guide.visible" class="text-lg mt-4">
                            {{ guide.content }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<style scoped>
body {
    font-family: 'Inter', 'Poppins', sans-serif;
}
</style>
