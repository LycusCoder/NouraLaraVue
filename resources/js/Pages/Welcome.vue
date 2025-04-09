<template>
    <GuestLayout>

        <Head title="Welcome" />

        <!-- Header -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <!-- Logo Section -->
                <div class="flex items-center space-x-4">
                    <img src="https://storage.googleapis.com/a1aa/image/j79R2dtCEl_vS19DtsODiE5CVTcQlTe8EV5On9QZOzk.jpg"
                        alt="Logo" class="h-12 w-12" />
                    <div>
                        <div class="text-2xl font-bold text-blue-500">NouraLara Vue</div>
                        <div class="text-sm font-mono text-gray-600">
                            Code Like a Polar Bear – Stay Cool Under Pressure
                        </div>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Conditional Rendering Based on Authentication Status -->
                    <template v-if="!isAuthenticated">
                        <Link :href="route('login')"
                            class="text-blue-500 font-medium hover:text-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="right-to-bracket" class="mr-2" />
                        Login
                        </Link>
                        <Link :href="route('register')"
                            class="bg-blue-500 text-white px-4 py-2 rounded-full font-medium hover:bg-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="user-plus" class="mr-2" />
                        Register
                        </Link>
                    </template>
                    <template v-else>
                        <Link :href="route('dashboard')"
                            class="text-blue-500 font-medium hover:text-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="chart-line" class="mr-2" />
                        Dashboard
                        </Link>
                        <form @submit.prevent="logout">
                            <button type="submit"
                                class="text-red-500 font-medium hover:text-red-600 transition duration-300 flex items-center">
                                <FortAwesomeIcons icon="arrow-right-from-bracket" class="mr-2" />
                                Logout
                            </button>
                        </form>
                    </template>
                </div>

                <!-- Mobile Menu Toggle -->
                <div class="md:hidden">
                    <button class="text-gray-600 focus:outline-none" @click="toggleMenu">
                        <FortAwesomeIcons icon="bars" class="text-2xl" />
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div v-if="menuOpen" class="md:hidden">
                <nav class="px-4 py-4 space-y-2">
                    <template v-if="!isAuthenticated">
                        <Link :href="route('login')"
                            class="block text-blue-500 font-medium hover:text-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="right-to-bracket" class="mr-2" />
                        Login
                        </Link>
                        <Link :href="route('register')"
                            class="block bg-blue-500 text-white px-4 py-2 rounded-full font-medium hover:bg-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="user-plus" class="mr-2" />
                        Register
                        </Link>
                    </template>
                    <template v-else>
                        <Link :href="route('dashboard')"
                            class="block text-blue-500 font-medium hover:text-blue-600 transition duration-300 flex items-center">
                        <FortAwesomeIcons icon="chart-line" class="mr-2" />
                        Dashboard
                        </Link>
                        <form @submit.prevent="logout">
                            <button type="submit"
                                class="block text-red-500 font-medium hover:text-red-600 transition duration-300 flex items-center">
                                <FortAwesomeIcons icon="arrow-right-from-bracket" class="mr-2" />
                                Logout
                            </button>
                        </form>
                    </template>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section class="relative bg-gradient-to-r from-blue-500 to-blue-700 text-white text-center py-20">
                <!-- Latar Belakang Gambar -->
                <img src="https://storage.googleapis.com/a1aa/image/EUMMqkqmFFBZtIwQ5m2hwuJIfREXD56SMiCgY6miGZ8.jpg"
                    alt="Background" class="absolute inset-0 w-full h-full object-cover opacity-20" />
                <!-- Overlay untuk meningkatkan kontras teks -->
                <div class="absolute inset-0 bg-black opacity-50"></div>

                <!-- Konten Utama -->
                <div class="relative container mx-auto px-4">
                    <!-- Judul Besar -->
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in-down">
                        Welcome to NouraLara Vue
                    </h1>

                    <!-- Deskripsi -->
                    <p class="text-xl md:text-2xl mb-8 animate-fade-in-up">
                        A modern template for your Laravel and Vue.js projects.
                    </p>

                    <!-- Tombol Get Started -->
                    <button :href="route('started')"
                        class="bg-transparent border border-white rounded-lg px-6 py-3 text-white font-medium transition duration-300 ease-in-out hover:bg-white hover:text-blue-700 hover:border-blue-700">
                        <FortAwesomeIcons icon="rocket" class="mr-2" />
                        Get Started
                    </button>

                    <!-- Pesan Selamat Datang -->
                    <div class="mt-6">
                        <p v-if="page.props.auth.user" class="animate-fade-in-up">
                            Welcome, {{ page.props.auth.user.name }}!
                        </p>
                        <p v-else class="animate-fade-in-up">
                            Welcome, Guest!
                        </p>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="bg-gray-100 py-20">
                <div class="container mx-auto px-4">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div
                            class="text-center p-6 bg-white rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                            <FortAwesomeIcons icon="rocket" class="text-4xl text-blue-500 mb-4" />
                            <h3 class="text-xl font-semibold">Fast & Efficient</h3>
                            <p class="text-gray-600 mt-2">Solutions that are fast and efficient for your digital
                                needs.
                            </p>
                        </div>
                        <div
                            class="text-center p-6 bg-white rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                            <FortAwesomeIcons icon="code" class="text-4xl text-blue-500 mb-4" />
                            <h3 class="text-xl font-semibold">Clean Code</h3>
                            <p class="text-gray-600 mt-2">Clean and understandable code for better development.</p>
                        </div>
                        <div
                            class="text-center p-6 bg-white rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                            <FortAwesomeIcons icon="icons" class="text-4xl text-blue-500 mb-4" />
                            <h3 class="text-xl font-semibold">FontAwesome Icons</h3>
                            <p class="text-gray-600 mt-2">Global access to FontAwesome icons for your projects.</p>
                        </div>
                        <div
                            class="text-center p-6 bg-white rounded-lg shadow-md transform transition duration-500 hover:scale-105">
                            <FortAwesomeIcons icon="lock" class="text-4xl text-blue-500 mb-4" />
                            <h3 class="text-xl font-semibold">Authentication</h3>
                            <p class="text-gray-600 mt-2">Built-in authentication for secure access.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Call to Action Section -->
            <section class="bg-blue-500 text-white text-center py-20">
                <div class="container mx-auto px-4">
                    <h2 class="text-3xl font-bold">Why Choose NouraLara Vue?</h2>
                    <p class="text-xl mt-4">Experience the best of Laravel and Vue.js with our modern, efficient,
                        and
                        feature-rich template.</p>
                    <div class="mt-8 flex flex-wrap justify-center space-x-4">
                        <div
                            class="bg-white text-blue-500 px-6 py-3 rounded-full text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300">
                            <FortAwesomeIcons icon="check-circle" class="mr-2" /> Tailwind CSS
                        </div>
                        <div
                            class="bg-white text-blue-500 px-6 py-3 rounded-full text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300">
                            <FortAwesomeIcons icon="icons" class="mr-2" /> FontAwesome Icons
                        </div>
                        <div
                            class="bg-white text-blue-500 px-6 py-3 rounded-full text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300">
                            <FortAwesomeIcons icon="lock" class="mr-2" /> Authentication
                        </div>
                        <div
                            class="bg-white text-blue-500 px-6 py-3 rounded-full text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300">
                            <FortAwesomeIcons icon="code" class="mr-2" /> Clean Code
                        </div>
                    </div>
                    <a href="#"
                        class="mt-8 inline-block bg-white text-blue-500 px-6 py-3 rounded-full text-lg font-medium hover:bg-blue-600 hover:text-white transition duration-300">
                        <FortAwesomeIcons icon="rocket" class="mr-2" /> Get Started Now
                    </a>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-100 py-6 mt-8">
            <div class="container mx-auto px-4 text-center text-gray-600 text-sm">
                © {{ currentYear }} NouraLara Vue. All rights reserved.
            </div>
        </footer>
    </GuestLayout>
</template>

<script setup>
import { ref, computed } from 'vue';
import { usePage, router, Head, Link } from '@inertiajs/vue3';
import GuestLayout from '@/Layouts/GuestLayout.vue';



const page = usePage();
const menuOpen = ref(false);


console.log(page.props.auth);

// Toggle mobile menu
const toggleMenu = () => {
    menuOpen.value = !menuOpen.value;
};

// Check if user is authenticated
const isAuthenticated = computed(() => !!page.props.auth?.user);

// Handle logout
const logout = () => {
    router.post(route('logout'));
};

// Get current year for footer
const currentYear = new Date().getFullYear();

// Greeting message based on time of day
const greeting = computed(() => {
    const hour = new Date().getHours();
    if (hour < 12) return 'Good Morning!';
    if (hour < 18) return 'Good Afternoon!';
    return 'Good Evening!';
});
</script>

<style scoped>
/* Animasi Fade In */
@keyframes fade-in-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 1s ease-in-out;
}

.animate-fade-in-up {
    animation: fade-in-up 1s ease-in-out;
}
</style>
