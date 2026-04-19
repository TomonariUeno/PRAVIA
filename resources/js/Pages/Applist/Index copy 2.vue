<script setup>
    import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
    import Pagination from '@/Components/Pagination.vue'
    import { Head, Link, router } from '@inertiajs/vue3'
    import { reactive, ref, watch   } from 'vue'

    const props = defineProps({
        applist: Object,
        filters: Object,
        sort: String,
        direction: String
    })

    const form = reactive({
        pasj_id: props.filters.pasj_id ?? '',
        system_map_no: props.filters.system_map_no ?? '',
        legal_entity: props.filters.legal_entity ?? '',
        pas_use: props.filters.pas_use ?? '',
        pits_use: props.filters.pits_use ?? '',
        pce_use: props.filters.pce_use ?? '',
        app_name: props.filters.app_name ?? '',
        app_description: props.filters.app_description ?? '',
        app_type: props.filters.app_type ?? '',
        resource_type: props.filters.resource_type ?? '',
        hosting_type: props.filters.hosting_type ?? '',
        tsa_exit_disposition: props.filters.tsa_exit_disposition ?? '',
        app_classification: props.filters.app_classification ?? '',
        wave_type: props.filters.wave_type ?? '',
        wavex_judgement: props.filters.wavex_judgement ?? '',
        business_process_area: props.filters.business_process_area ?? '',
        person_in_charge: props.filters.person_in_charge ?? '',
        person_in_charge2: props.filters.person_in_charge2 ?? '',
        person_in_charge3: props.filters.person_in_charge3 ?? '',
        sa_policy: props.filters.sa_policy ?? '',
        sa_policy_detail: props.filters.sa_policy_detail ?? '',
        transfer_method: props.filters.transfer_method ?? '',
        brownfield_migration_destination: props.filters.brownfield_migration_destination ?? '',
        policy_decision_status: props.filters.policy_decision_status ?? '',
        sit_start_date: props.filters.sit_start_date ?? '',
        sit_end_date: props.filters.sit_end_date ?? '',
        golive_date: props.filters.golive_date ?? '',
        app_stop_date: props.filters.app_stop_date ?? '',
        pj_start_date_plan: props.filters.pj_start_date_plan ?? '',
        pj_end_date_plan: props.filters.pj_end_date_plan ?? '',
        pj_start_date_actual: props.filters.pj_start_date_actual ?? '',
        pj_end_date_actual: props.filters.pj_end_date_actual ?? '',
        release_group: props.filters.release_group ?? '',
        budget_name: props.filters.budget_name ?? '',
        budget_app_group: props.filters.budget_app_group ?? '',
        budget_app_id: props.filters.budget_app_id ?? '',
        remarks: props.filters.remarks ?? '',
        outsourcing_flag: props.filters.outsourcing_flag ?? '',
        outsourcing_level: props.filters.outsourcing_level ?? '',
        major_issuse_related: props.filters.major_issuse_related ?? '',
        work_ability: props.filters.work_ability ?? '',
        core_related: props.filters.core_related ?? '',
        tsa_no: props.filters.tsa_no ?? '',
        ams_vendor_pas_recognition: props.filters.ams_vendor_pas_recognition ?? '',
        rfp_send_vendor: props.filters.rfp_send_vendor ?? '',
        rfp_send_vendor2: props.filters.rfp_send_vendor2 ?? '',
        rfp_send_vendor3: props.filters.rfp_send_vendor3 ?? '',
        rfp_type: props.filters.rfp_type ?? '',
        submission: props.filters.submission ?? '',
        quote_reception: props.filters.quote_reception ?? '',
        quote_review: props.filters.quote_review ?? '',
        supplement_rfq: props.filters.supplement_rfq ?? '',
        quote_draft_seller: props.filters.quote_draft_seller ?? '',
        quote_review_seller: props.filters.quote_review_seller ?? '',
        old_management_item: props.filters.old_management_item ?? '',
        development_environment: props.filters.development_environment ?? '',
        test_environment: props.filters.test_environment ?? '',
        production_environment: props.filters.production_environment ?? '',
        charter_name: props.filters.charter_name ?? '',
        pas_board_review_date: props.filters.pas_board_review_date ?? '',
        pas_board_charter_review: props.filters.pas_board_charter_review ?? '',
        apollo_charter_review_date: props.filters.apollo_charter_review_date ?? '',
        apollo_charter_review: props.filters.apollo_charter_review ?? '',
        approval_app_submission: props.filters.approval_app_submission ?? '',
        charter_approval_status: props.filters.charter_approval_status ?? '',
        contracting: props.filters.contracting ?? '',
        insert_date: props.filters.insert_date ?? '',
        insert_user: props.filters.insert_user ?? '',
        insert_program: props.filters.insert_program ?? '',
        update_date: props.filters.update_date ?? '',
        update_user: props.filters.update_user ?? '',
        update_program: props.filters.update_program ?? ''
    })

    // カラム定義（全項目）
    const columns = ref([
        { key: 'id', label: 'ID', visible: true, fixed: true, left: 0 },
        { key: 'pasj_id', label: 'PASJ ID', visible: true, fixed: true, left: 80 },
        { key: 'system_map_no', label: 'System Map No', visible: true},
        { key: 'legal_entity', label: 'Legal Entity', visible: true },
        { key: 'pas_use', label: 'PAS', visible: true },
        { key: 'pits_use', label: 'PITS', visible: true },
        { key: 'pce_use', label: 'PCE', visible: true },
        { key: 'app_name', label: 'App Name', visible: true },
        { key: 'app_description', label: 'Description', visible: true },
        { key: 'app_type', label: 'App Type', visible: true },
        { key: 'resource_type', label: 'Resource Type', visible: true },
        { key: 'hosting_type', label: 'Hosting Type', visible: true },
        { key: 'tsa_exit_disposition', label: 'TSA Exit', visible: true },
        { key: 'app_classification', label: 'Classification', visible: true },
        { key: 'wave_type', label: 'Wave', visible: true },
        { key: 'wavex_judgement', label: 'WaveX', visible: true },
        { key: 'business_process_area', label: 'Business Area', visible: true },
        { key: 'person_in_charge', label: '担当者', visible: true },
        { key: 'person_in_charge2', label: '担当者2', visible: true },
        { key: 'person_in_charge3', label: '担当者3', visible: true },
        { key: 'sa_policy', label: 'SA Policy', visible: true },
        { key: 'sa_policy_detail', label: 'SA Detail', visible: true },
        { key: 'transfer_method', label: 'Transfer', visible: true },
        { key: 'brownfield_migration_destination', label: 'Migration先', visible: true },
        { key: 'policy_decision_status', label: 'Policy Status', visible: true },
        { key: 'sit_start_date', label: 'SIT開始', visible: true },
        { key: 'sit_end_date', label: 'SIT終了', visible: true },
        { key: 'golive_date', label: 'GoLive', visible: true },
        { key: 'app_stop_date', label: '停止日', visible: true },
        { key: 'pj_start_date_plan', label: 'PJ開始(予定)', visible: true },
        { key: 'pj_end_date_plan', label: 'PJ終了(予定)', visible: true },
        { key: 'pj_start_date_actual', label: 'PJ開始(実績)', visible: true },
        { key: 'pj_end_date_actual', label: 'PJ終了(実績)', visible: true },
        { key: 'release_group', label: 'リリースG', visible: true },
        { key: 'budget_name', label: 'Budget Name', visible: true },
        { key: 'budget_app_group', label: 'Budget Group', visible: true },
        { key: 'budget_app_id', label: 'Budget ID', visible: true },
        { key: 'remarks', label: '備考', visible: true },
        { key: 'outsourcing_flag', label: 'Outsource', visible: true },
        { key: 'outsourcing_level', label: 'Outsource Level', visible: true },
        { key: 'major_issuse_related', label: '5大課題', visible: true },
        { key: 'work_ability', label: '職能', visible: true },
        { key: 'core_related', label: 'Core', visible: true },
        { key: 'tsa_no', label: 'TSA No', visible: true },
        { key: 'ams_vendor_pas_recognition', label: 'AMS(PAS)', visible: true },
        { key: 'rfp_send_vendor', label: 'RFP1', visible: true },
        { key: 'rfp_send_vendor2', label: 'RFP2', visible: true },
        { key: 'rfp_send_vendor3', label: 'RFP3', visible: true },
        { key: 'rfp_type', label: 'RFP Type', visible: true },
        { key: 'submission', label: 'Submission', visible: true },
        { key: 'quote_reception', label: 'Quote受領', visible: true },
        { key: 'quote_review', label: 'Quoteレビュー', visible: true },
        { key: 'supplement_rfq', label: '補足', visible: true },
        { key: 'quote_draft_seller', label: 'ドラフト', visible: true },
        { key: 'quote_review_seller', label: 'レビュー', visible: true },
        { key: 'old_management_item', label: '旧項目', visible: true },
        { key: 'development_environment', label: '開発環境', visible: true },
        { key: 'test_environment', label: '検証環境', visible: true },
        { key: 'production_environment', label: '本番環境', visible: true },
        { key: 'charter_name', label: 'Charter', visible: true },
        { key: 'pas_board_review_date', label: 'PAS審査日', visible: true },
        { key: 'apollo_charter_review_date', label: 'Apollo審査日', visible: true },
        { key: 'approval_app_submission', label: '承認', visible: true },
        { key: 'charter_approval_status', label: '承認状態', visible: true },
        { key: 'contracting', label: '契約', visible: true },
        { key: 'project_start_date', label: 'PJ開始', visible: true },
        { key: 'project_kickoff', label: 'Kickoff', visible: true },
    ])

    // 保存（列表示状態）
    // watch(columns, (val) => {
    //     localStorage.setItem('columns', JSON.stringify(val))
    // }, { deep: true })

    // const saved = localStorage.getItem('columns')
    // if (saved) {
    //     columns.value = JSON.parse(saved)
    // }

    // 検索
    const search = () => {
        router.get(route('applists.index'), {
            ...form,
            sort: props.sort,
            direction: props.direction
        })
    }

    // ソート
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

    // ソートアイコン
    const getSortIcon = (column) => {
        if (props.sort !== column) return ''
        return props.direction === 'asc' ? '▲' : '▼'
    }

    // CSV出力
    const exportCsv = () => {
        const visibleCols = columns.value.filter(col => col.visible)

        const header = visibleCols.map(col => col.label).join(',')

        const rows = props.applist.data.map(row => {
            return visibleCols.map(col => {
                let val = row[col.key] ?? ''
                return `"${val}"`
            }).join(',')
        })

        const csvContent = [header, ...rows].join('\n')

        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' })
        const url = URL.createObjectURL(blob)

        const link = document.createElement('a')
        link.href = url
        link.setAttribute('download', 'applist.csv')
        document.body.appendChild(link)
        link.click()
        document.body.removeChild(link)
    }

    const charterTypes = [
        { value: '0', label: 'Not Required'},
    ];

    const hostingTypes = [
        { value: '0', label: 'Dedicated'},
        { value: '1', label: 'Shared' },
        { value: '2', label: 'TBC' },
        { value: '3', label: 'TBD' },
    ];

    const rfpSends = [
        { value: '0', label: 'Complete'},
        { value: '1', label: 'Incomplete' },
        { value: '2', label: 'Not Required' },
    ];

    const rfpTypes = [
        { value: '0', label: 'Individually'},
        { value: '1', label: 'summarize' },
    ];

    const environmentTypes = [
        { value: '0', label: '回答不要'},
        { value: '1', label: '回答受領済(すべて)' },
        { value: '2', label: '回答受領済(未記載あり)' },
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
        { value: '8', label: 'FunctionalClone' },
        { value: '9', label: '物理機器移転' },
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

    const releaseGroup = [
        { value: '0', label: 'Core-FI'},
        { value: '1', label: 'Core-HR' },
        { value: '2', label: 'Core-PD-SAP' },
        { value: '3', label: 'Core-SA-SAP' },
        { value: '4', label: 'PCE' },
        { value: '5', label: 'WAVE 0' },
        { value: '6', label: 'WAVE 1' },
        { value: '7', label: 'WAVE 1-NW' },
        { value: '8', label: 'WAVE 2' },
        { value: '9', label: 'WAVE 3' },
        { value: '10', label: 'WAVE 4' },
        { value: '11', label: 'WAVE 5' },
        { value: '12', label: 'WAVE X-GA' },
        { value: '13', label: 'WAVE X-LE' },
        { value: '14', label: 'WAVE X-PR' },
        { value: '15', label: 'WAVE X-その他' },
        { value: '16', label: 'リリースグループ無し' },
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
            <h2 class="text-xl font-semibold text-gray-800">
                アプリ台帳
            </h2>
        </template>

        <div class="p-6 space-y-8 bg-gray-50 min-h-screen">
            <!-- ================= 基本情報 ================= -->
            <div class="card">
                <h3 class="section-title">基本情報</h3>
                <div class="grid grid-cols-4 gap-4">
                    <div class="form-item">
                        <label> PASJ ID </label>
                        <input v-model="form.pasj_id" class="input"/>
                    </div>
                    <div class="form-item">
                        <label> System Map No </label>
                        <input v-model="form.system_map_no" class="input"/>
                    </div>
                    <div class="form-item">
                        <label> Legal Entity </label>
                        <input v-model="form.legal_entity" class="input"/>
                    </div>
                    <div class="form-item">
                        <label> App Name </label>
                        <input v-model="form.app_name" class="input"/>
                    </div>
                </div>
                <div class="flex gap-6 mt-4">
                    <label class="checkbox"><input type="checkbox" v-model="form.pas_use"> PAS</label>
                    <label class="checkbox"><input type="checkbox" v-model="form.pits_use"> PITS</label>
                    <label class="checkbox"><input type="checkbox" v-model="form.pce_use"> PCE</label>
                </div>
            </div>
            <!-- ================= 区分系 ================= -->
            <div class="card">
                <h3 class="section-title">区分</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="form-item">
                        <label>App Type</label>
                        <select v-model="form.app_type" class="input">
                            <option value="">選択してください</option>
                            <option v-for="item in appTypes" :key="item.value" :value="item.value">
                                {{ item.label }}
                            </option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label>Hosting Type</label>
                        <select v-model="form.hosting_type" class="input">
                            <option value="">選択してください</option>
                            <option v-for="item in hostingTypes" :key="item.value" :value="item.value">
                                {{ item.label }}
                            </option>
                        </select>
                    </div>
                    <div class="form-item">
                        <label>Resource Type</label>
                        <select v-model="form.resource_type" class="input">
                            <option value="">選択してください</option>
                            <option v-for="item in hostingTypes" :key="item.value" :value="item.value">
                                {{ item.label }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- ================= TSA / SA ================= -->
            <div class="card">
                <h3 class="section-title">TSA / SA</h3>
                <div class="form-item">
                    <label>TSA Exit</label>
                    <div class="checkbox-group">
                        <label v-for="item in tsaExitMehotds" :key="item.value" class="checkbox">
                            <input type="checkbox" :value="item.value" v-model="form.tsa_exit_disposition">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
                <div class="form-item mt-4">
                    <label>SA方針</label>
                    <div class="checkbox-group">
                        <label v-for="item in tsaExitMehotdsPas" :key="item.value" class="checkbox">
                            <input type="checkbox" :value="item.value" v-model="form.sa_policy">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
            </div>
            <!-- ================= WAVE ================= -->
            <div class="card">
                <h3 class="section-title">WAVE</h3>
                <div class="checkbox-group">
                    <label v-for="item in waves" :key="item.value" class="checkbox">
                        <input type="checkbox" :value="item.value" v-model="form.wave_type">
                        {{ item.label }}
                    </label>
                    <label class="checkbox">
                        <input type="checkbox" v-model="form.wavex_judgement">
                        WAVE X判定
                    </label>
                </div>
            </div>
            <!-- ================= 日付 ================= -->
            <div class="card">
                <h3 class="section-title">日付</h3>
                <div class="grid grid-cols-4 gap-4">
                    <div class="form-item">
                        <label>SIT開始</label>
                        <input type="date" v-model="form.sit_start_date" class="input"/>
                    </div>
                    <div class="form-item">
                        <label>SIT終了</label>
                        <input type="date" v-model="form.sit_end_date" class="input"/>
                    </div>
                    <div class="form-item">
                        <label>GoLive</label>
                        <input type="date" v-model="form.golive_date" class="input"/>
                    </div>
                    <div class="form-item">
                        <label>停止日</label>
                        <input type="date" v-model="form.app_stop_date" class="input"/>
                    </div>
                </div>
            </div>
            <!-- ================= 担当 ================= -->
            <div class="card">
                <h3 class="section-title">担当</h3>
                <div class="grid grid-cols-3 gap-4">
                    <input v-model="form.person_in_charge" placeholder="PAS担当者" class="input"/>
                    <input v-model="form.person_in_charge2" placeholder="その他担当者" class="input"/>
                    <input v-model="form.person_in_charge3" placeholder="その他担当者3" class="input"/>
                </div>
            </div>
            <!-- ================= ボタン ================= -->
            <div class="flex justify-between items-center">
                <button @click="exportCsv" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-sm transition">
                    ⬇ CSV出力
                </button>
                <button @click="search" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-6 py-2 rounded-lg shadow transition">
                    🔍 検索
                </button>
            </div>
            <!-- ================= 列ON/OFF ================= -->
            <div class="bg-white p-4 rounded-xl shadow-sm border flex flex-wrap gap-3">
                <label v-for="col in columns" :key="col.key" class="checkbox">
                    <input type="checkbox" v-model="col.visible">
                    {{ col.label }}
                </label>
            </div>
            <!-- ================= テーブル ================= -->
            <div class="bg-white rounded-2xl shadow border border-gray-200 overflow-x-auto">
                <table class="min-w-max w-full text-sm">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th
                                v-for="col in columns.filter(c => c.visible)"
                                :key="col.key"
                                class="p-3 font-semibold whitespace-nowrap border-b"
                                :class="{ 'sticky z-30 bg-gray-100': col.fixed }"
                                :style="col.fixed ? { left: col.left + 'px' } : {}"
                            >
                                {{ col.label }} {{ getSortIcon(col.key) }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in applist.data" :key="row.id" class="border-t hover:bg-blue-50 transition">
                            <td
                                v-for="col in columns.filter(c => c.visible)"
                                :key="col.key"
                                class="p-3 whitespace-nowrap text-gray-700"
                                :class="{ 'sticky z-20 bg-white': col.fixed }"
                                :style="col.fixed ? { left: col.left + 'px' } : {}"
                            >
                                <template v-if="col.key === 'id'">
                                    <Link :href="route('applists.show', row.id)" class="text-blue-600 hover:underline">
                                        {{ row.id }}
                                    </Link>
                                </template>
                                <template v-else>
                                    {{ row[col.key] ?? '-' }}
                                </template>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <Pagination :links="applist?.links ?? []" />
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
    .card {
        @apply bg-white p-4 rounded shadow;
    }

    .section-title {
        @apply font-bold mb-3 border-b pb-1;
    }

    .form-item {
        @apply flex flex-col;
    }

    .input {
        @apply border rounded px-3 py-2;
    }

    .checkbox-group {
        @apply flex flex-wrap gap-4;
    }

    .btn-primary {
        @apply bg-blue-500 text-white px-6 py-2 rounded;
    }
</style>