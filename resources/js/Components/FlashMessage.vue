<script setup>
    import { usePage } from '@inertiajs/vue3'
    import { ref, onMounted } from 'vue'

    const page = usePage()

    const visible = ref(true)

    onMounted(() => {
        if (page.props.flash?.message) {
            setTimeout(() => {
                visible.value = false
            }, 3000) // 3秒
        }
    })
</script>

<template>
    <div
        v-if="visible && page.props.flash?.message"
        class="bg-green-500 text-white p-4 mb-4 rounded"
    >
        {{ page.props.flash.message }}
    </div>
</template>