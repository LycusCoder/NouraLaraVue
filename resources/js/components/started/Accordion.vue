<template>
    <div class="mb-6">
        <h3 @click="toggle" class="text-xl font-semibold cursor-pointer text-blue-600">
            {{ title }}
        </h3>
        <div v-if="visible" class="text-lg text-gray-600 mt-2">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
    },
    data() {
        return {
            visible: false,
        };
    },
    methods: {
        toggle() {
            this.visible = !this.visible;
        },
    },
};
</script>
