<template>
    <div class="bg-white p-6 rounded-lg shadow-md">
        <FortAwesomeIcons :icon="icon" class="text-4xl text-blue-500 mb-4" />
        <h3 class="text-xl font-semibold mb-2">{{ title }}</h3>
        <p class="text-gray-600">{{ description }}</p>
    </div>
</template>

<script>
export default {
    props: {
        icon: String,
        title: String,
        description: String,
    },
};
</script>
