<script setup>

    import CustomerSearchModal from '@/Components/CustomerSearchModal.vue'
    import { ref } from 'vue'

    const showCustomerModal = ref(false)
    const customer = ref(null)
    const setCustomer = (data) => {
        customer.value = data
        showCustomerModal.value = false
    }

</script>

<template>

    <button @click="showCustomerModal = true" class="bg-blue-500 text-white px-4">
        顧客検索
    </button>

    <div v-if="customer" class="mt-4">
        顧客：{{ customer.name }}
    </div>

    <CustomerSearchModal
        v-if="showCustomerModal"
        @selected="setCustomer"
        @close="showCustomerModal=false"
    />

</template>