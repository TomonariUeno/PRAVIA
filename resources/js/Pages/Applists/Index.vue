<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import Pagination from '@/Components/Pagination.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { reactive } from 'vue'

    const props = defineProps({
        applists: Object,
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
        router.get(route('applists.index'), {
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

        router.get(route('applists.index'), {
            ...form,
            sort: column,
            direction: direction
        })
    }

    const hostingTypes = [
        { value: '0', label: 'Dedicated'},
        { value: '1', label: 'Shared' },
        { value: '2', label: 'TBC' },
        { value: '3', label: 'TBD' },
    ];

    const appTypes = [
        { value: '0', label: 'Dedicated'},
        { value: '1', label: 'Shared' },
        { value: '2', label: 'TBC' },
        { value: '3', label: 'TBD' },
        { value: '4', label: 'Application' },
        { value: '5', label: 'Appliance' },
        { value: '6', label: 'BPO Service' },
        { value: '7', label: 'COTS' },
        { value: '8', label: 'Saas' },
        { value: '9', label: 'Custom' },
        { value: '10', label: 'Stop Using' },
    ];

    const tsaExitMehotds = [
        { value: '0', label: 'GreenField'},
        { value: '1', label: 'BrownField' },
        { value: '2', label: 'Clone' },
        { value: '3', label: 'Contract Change' },
        { value: '4', label: 'Network Change' },
        { value: '5', label: 'TBC' },
        { value: '6', label: 'TBD' },
        { value: '7', label: 'Stop Using' },
    ];

    const tsaExitMehotdsPas = [
        { value: '0', label: 'GreenField'},
        { value: '1', label: 'BrownField' },
        { value: '2', label: 'Clone' },
        { value: '3', label: '契約切替' },
        { value: '4', label: 'NW/認証切替' },
        { value: '5', label: 'TBC' },
        { value: '6', label: 'TBD' },
        { value: '7', label: 'Stop Using' },
        { value: '8', label: 'Iaas切り替え' },
        { value: '9', label: 'ブランド変更対応' },
        { value: '10', label: '要検討' },
    ];

    const coreOther = [
        { value: '0', label: 'Core Systems'},
        { value: '1', label: 'Ohter Systems' },
        { value: '2', label: 'Infra Cyber' },
    ];

    const waves = [
        { value: '0', label: 'WAVE 0-1'},
        { value: '1', label: 'WAVE 0-2' },
        { value: '2', label: 'WAVE 0-3' },
        { value: '3', label: 'WAVE 1-1' },
        { value: '4', label: 'WAVE 1-2' },
        { value: '5', label: 'WAVE 1-3' },
        { value: '6', label: 'WAVE 2' },
        { value: '7', label: 'WAVE 3' },
        { value: '8', label: 'WAVE 4' },
        { value: '9', label: 'WAVE 5' },
    ];

    const businessAreas = [
        { value: '0', label: 'HRIS & Payroll'},
        { value: '1', label: 'Finance & Accounting' },
        { value: '2', label: 'Sales & Marketing' },
        { value: '3', label: 'Middleware & EDI' },
        { value: '4', label: 'Engineering & Design' },
        { value: '5', label: 'Logistics(domestic)' },
        { value: '6', label: 'logistics(international)' },
        { value: '7', label: 'Procurement' },
        { value: '8', label: 'Infrastructure' },
        { value: '9', label: 'Legal' },
        { value: '10', label: 'Quality & Environment' },
        { value: '11', label: 'General Affairs' },
        { value: '12', label: 'CS' },
        { value: '13', label: 'IP' },
        { value: '14', label: 'Corporate' },
        { value: '15', label: 'manufacturing_工場現場系' },
        { value: '16', label: 'manufacturing_直轄基幹系' },
        { value: '17', label: 'manufacturing_直轄現場系' },
    ];
</script>

<template>
    <Head title="アプリ台帳" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-bold">
                アプリ台帳
            </h2>
        </template>
        <div class="p-6">
            <!-- 検索フォーム -->
            <div class="mb-4 grid grid-cols-4 gap-2">
                <input v-model="form.pasj_id" placeholder="PASJ ID" class="border p-2"/>
                <input v-model="form.system_map_no" placeholder="System Map No" class="border p-2"/>
                <input v-model="form.legal_entity" placeholder="legal Entity" class="border p-2"/>
                <input type="checkbox" v-model="form.pas_use" class="mr-2"><label>PAS</label>
                <input type="checkbox" v-model="form.pits_use" class="mr-2"><label>PITS</label>
                <input type="checkbox" v-model="form.pce_use" class="mr-2"><label>PCE</label>
                <input v-model="form.app_name" placeholder="App Name" class="border p-2"/>
                <input v-model="form.app_local_name" placeholder="App Local Name" class="border p-2"/>
                <input v-model="form.app_description" placeholder="App Description" class="border p-2"/>
                <div class="flex items-center gap-4">
                    <label for="legal_entity" class="w-40">
                        App Type
                    </label>
                    <select v-model="form.app_type" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in appTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="hosting_type" class="w-40">
                        Hosting Type
                    </label>
                    <select v-model="form.hosting_type" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in appTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="resource_type" class="w-40">
                        Resource Type
                    </label>
                    <select v-model="form.resource_type" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in hostingTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label class="w-40">TSA Exit Disposition</label>
                    <div class="flex gap-4">
                        <label v-for="item in tsaExitMehotds" :key="item.value" class="flex items-center">
                            <input type="checkbox" :value="item.value" v-model="form.tsa_exit_disposition" class="mr-2">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <label class="w-40">SA化方針 PAS</label>
                    <div class="flex gap-4">
                        <label v-for="item in tsaExitMehotdsPas" :key="item.value" class="flex items-center">
                            <input type="checkbox" :value="item.value" v-model="form.sa_policy" class="mr-2">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <label for="app_classification" class="w-40">
                        App Classification
                    </label>
                    <select v-model="form.app_classification" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in coreOther" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label class="w-40">WAVE Type</label>
                    <div class="flex gap-4">
                        <label v-for="item in waves" :key="item.value" class="flex items-center">
                            <input type="checkbox" :value="item.value" v-model="form.wave_type" class="mr-2">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
                <input type="checkbox" v-model="form.wavex_judgement" class="mr-2"><label>WAVE X判定フラグ</label>
                <div class="flex items-center gap-4">
                    <label for="business_process_area" class="w-40">
                        Business Process Area
                    </label>
                    <select v-model="form.business_process_area" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in businessAreas" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <input v-model="form.person_in_charge" placeholder="PAS担当者" class="border p-2"/>
                <input v-model="form.person_in_charge2" placeholder="その他担当者" class="border p-2"/>
                <input v-model="form.sa_policy_detail" placeholder="SA化方針詳細" class="border p-2"/>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2" @click="search">
                検索
            </button>
            <!-- 顧客テーブル -->
            <table class="w-full mt-6 border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 cursor-pointer" @click="sortBy('id')">ID</th>
                        <th class="p-2 cursor-pointer" @click="sortBy('name')"> 氏名</th>
                        <th class="p-2 cursor-pointer"@click="sortBy('kana')">カナ</th>
                        <th class="p-2 cursor-pointer" @click="sortBy('tel')">電話番号</th>
                        <th class="p-2 cursor-pointer"@click="sortBy('email')">メール</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="applist in applists.data" :key="applist.id" class="border-t">
                        <td class="p-2">
                            <Link :href="route('applists.show', applist.id)">
                                {{ applist.id }}
                            </Link>
                        </td>
                        <td class="p-2">{{ applist.kana }}</td>
                        <td class="p-2">{{ applist.tel }}</td>
                        <td class="p-2">{{ applist.email }}</td>
                    </tr>
                </tbody>
            </table>
            <Pagination class="mt-6" :links="applists.links"/>
        </div>
    </AuthenticatedLayout>
</template>