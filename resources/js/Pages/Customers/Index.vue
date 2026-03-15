<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import Pagination from '@/Components/Pagination.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { reactive } from 'vue'

    const props = defineProps({
        customers: Object,
        filters: Object,
        sort: String,
        direction: String
    })

    const form = reactive({
        name: props.filters.name ?? '',
        kana: props.filters.kana ?? '',
        tel: props.filters.tel ?? '',
        email: props.filters.email ?? ''
    })

    const search = () => {
        router.get(route('customers.index'), {
            ...form,
            sort: props.sort,
            direction: props.direction
        })
    }

    const sortBy = (column) => {

        let direction = 'asc'

        if (props.sort === column && props.direction === 'asc') {
            direction = 'desc'
        }

        router.get(route('customers.index'), {
            ...form,
            sort: column,
            direction: direction
        })
    }
</script>

<template>
    <Head title="顧客一覧" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-bold">
                顧客一覧
            </h2>
        </template>
        <div class="p-6">
            <!-- 検索フォーム -->
            <div class="mb-4 grid grid-cols-4 gap-2">
                <input v-model="form.name" placeholder="氏名" class="border p-2"/>
                <input v-model="form.kana" placeholder="カナ" class="border p-2"/>
                <input v-model="form.tel" placeholder="電話番号" class="border p-2"/>
                <input v-model="form.email" placeholder="メール" class="border p-2"/>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2" @click="search">
                検索
            </button>
            <!-- 顧客テーブル -->
            <table class="w-full mt-6 border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 cursor-pointer" @click="sortBy('id')">
                            ID
                        </th>
                        <th class="p-2 cursor-pointer" @click="sortBy('name')">
                            氏名
                        </th>
                        <th class="p-2 cursor-pointer"@click="sortBy('kana')">
                            カナ
                        </th>
                        <th class="p-2 cursor-pointer" @click="sortBy('tel')">
                            電話番号
                        </th>
                        <th class="p-2 cursor-pointer"@click="sortBy('email')">
                            メール
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="customer in customers.data" :key="customer.id" class="border-t">
                        <td class="p-2">
                            {{ customer.id }}
                        </td>
                        <td class="p-2">
                            <Link :href="route('customers.edit', customer.id)">
                                {{ customer.name }}
                            </Link>
                        </td>
                        <td class="p-2">
                            {{ customer.kana }}
                        </td>
                        <td class="p-2">
                            {{ customer.tel }}
                        </td>
                        <td class="p-2">
                            {{ customer.email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <Pagination class="mt-6" :links="customers.links"/>
        </div>
    </AuthenticatedLayout>
</template>