<script setup>
    import { usePage } from '@inertiajs/vue3'
    import { ref, computed, onMounted } from 'vue'

    const page = usePage()
    const visible = ref(true)

    const alertClass = computed(() => {
        return page.props.flash.status === 'success'
            ? 'bg-green-500'
            : 'bg-red-500'
    })

    onMounted(() => {
        setTimeout(() => visible.value = false, 3000)
    })
</script>

<template>
    <div v-if="visible && page.props.flash?.message":class="['text-white p-4 mb-4 rounded', alertClass]">
        {{ page.props.flash.message }}
    </div>
</template>