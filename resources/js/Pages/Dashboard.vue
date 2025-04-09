<template>
    <AuthenticatedLayout>
        <Head title="Dashboard" />

        <!-- Header -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-4 py-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-blue-600">NouraLara Dashboard</h1>
                <div>
                    <button
                        @click="logout"
                        class="text-red-500 font-medium hover:text-red-600 transition duration-300 flex items-center"
                    >
                        <FortAwesomeIcons :icon="['fas', 'sign-out-alt']" class="mr-2" />
                        Logout
                    </button>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="container mx-auto px-4 py-8">
            <!-- User Information Section -->
            <section class="mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center gap-4">
                    <img
                        :src="user.profile_picture"
                        alt="User profile picture"
                        class="rounded-full w-16 h-16"
                    />
                    <div>
                        <h2 class="text-2xl font-semibold mb-2">{{ user.name }}</h2>
                        <p class="text-gray-600">{{ user.email }}</p>
                    </div>
                </div>
            </section>

            <!-- Recent Activity Section -->
            <section class="mb-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold mb-4">Recent Activity</h2>
                    <ul class="space-y-4">
                        <li v-for="(activity, index) in recentActivities" :key="index" class="flex items-center">
                            <FortAwesomeIcons :icon="getIconForActivity(activity.type)" class="text-blue-500 mr-3" />
                            <span class="text-gray-600">{{ activity.activity }} - {{ activity.time }}</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Quick Links Section -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card: Profile Settings -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <FortAwesomeIcons :icon="['fas', 'user-cog']" class="text-blue-500 mr-3 text-2xl" />
                        <h2 class="text-2xl font-semibold text-gray-700">Profile Settings</h2>
                    </div>
                    <Link :href="route('profile')" class="text-blue-500 hover:underline">Edit Profile</Link>
                </div>

                <!-- Card: Account Settings -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <FortAwesomeIcons :icon="['fas', 'cog']" class="text-blue-500 mr-3 text-2xl" />
                        <h2 class="text-2xl font-semibold text-gray-700">Account Settings</h2>
                    </div>
                    <Link :href="route('settings')" class="text-blue-500 hover:underline">Manage Account</Link>
                </div>

                <!-- Card: Notifications -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <FortAwesomeIcons :icon="['fas', 'bell']" class="text-blue-500 mr-3 text-2xl" />
                        <h2 class="text-2xl font-semibold text-gray-700">Notifications</h2>
                    </div>
                    <Link :href="route('notifications')" class="text-blue-500 hover:underline">View Notifications</Link>
                </div>
            </section>
        </main>
    </AuthenticatedLayout>
</template>

<script setup>
import { computed } from 'vue';
import { usePage, router, Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const page = usePage();

// User information
const user = computed(() => page.props.user);

// Recent activities
const recentActivities = computed(() => page.props.recentActivities);

// Handle logout
const logout = () => {
    router.post(route('logout'));
};

// Mapping icons based on activity type
const activityIcons = {
    register: ['fas', 'user-plus'],
    login: ['fas', 'sign-in-alt'],
    update_profile: ['fas', 'user-edit'],
    logout: ['fas', 'sign-out-alt'],
};

function getIconForActivity(type) {
    if (!type) {
        console.warn('Activity type is missing or undefined');
        return ['fas', 'question']; // Default icon
    }
    console.log(activityIcons[type]);
    return activityIcons[type] || ['fas', 'question'];
}
</script>
