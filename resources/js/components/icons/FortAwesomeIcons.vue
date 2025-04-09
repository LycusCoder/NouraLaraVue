<template>
    <font-awesome-icon v-bind="$attrs" />
</template>

<script>
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { fas } from '@fortawesome/free-solid-svg-icons';
import { fab } from '@fortawesome/free-brands-svg-icons';
import { far } from '@fortawesome/free-regular-svg-icons';

// Add all icon sets to the library
library.add(fas, fab, far);

export default {
    name: 'FortAwesomeIcons',
    components: {
        FontAwesomeIcon,
    },
};
</script>
