<script setup>
    import { ref } from 'vue'
    import axios from 'axios'

    const emit = defineEmits([
        'selected',
        'close'
    ])

    const customers = ref([])
    const keyword = ref('')

    const search = async () => {
        const res = await axios.get('/api/customers/search', {
            params: {
                search: keyword.value
            }
        })

        customers.value = res.data
    }

    const selectCustomer = (customer) => {
        emit('selected', customer)
    }
</script>

<template>
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white w-3/4 p-6 rounded">
            <h2 class="text-lg font-bold mb-4">
                顧客検索
            </h2>
            <div class="flex mb-4">
                <input v-model="keyword" class="border p-2 flex-1" placeholder="名前 / カナ / 電話"/>
                <button @click="search" class="bg-blue-500 text-white px-4 ml-2">
                    検索
                </button>
            </div>
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">ID</th>
                        <th class="p-2">氏名</th>
                        <th class="p-2">カナ</th>
                        <th class="p-2">電話</th>
                        <th class="p-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers" :key="customer.id" class="border-t">
                        <td class="p-2">
                            {{ customer.id }}
                        </td>
                        <td class="p-2">
                            {{ customer.name }}
                        </td>
                        <td class="p-2">
                            {{ customer.kana }}
                        </td>
                        <td class="p-2">
                            {{ customer.tel }}
                        </td>
                        <td class="p-2">
                            <button @click="selectCustomer(customer)" class="bg-green-500 text-white px-2 py-1 rounded">
                                選択
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="mt-4 text-right">
                <button @click="$emit('close')" class="bg-gray-400 text-white px-4 py-2 rounded">
                    閉じる
                </button>
            </div>
        </div>
    </div>
</template>