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
        { key: 'system_map_no', label: 'System Map No', visible: true, fixed: true, left: 200 },
        { key: 'legal_entity', label: 'Legal Entity', visible: true },
        { key: 'pas_use', label: 'PAS', visible: true },
        { key: 'pits_use', label: 'PITS', visible: true },
        { key: 'pce_use', label: 'PCE', visible: true },
        { key: 'app_name', label: 'App Name', visible: true },
        { key: 'app_description', label: 'Description', visible: false },
        { key: 'app_type', label: 'App Type', visible: true },
        { key: 'resource_type', label: 'Resource Type', visible: false },
        { key: 'hosting_type', label: 'Hosting Type', visible: false },
        { key: 'tsa_exit_disposition', label: 'TSA Exit', visible: false },
        { key: 'app_classification', label: 'Classification', visible: false },
        { key: 'wave_type', label: 'Wave', visible: false },
        { key: 'wavex_judgement', label: 'WaveX', visible: false },
        { key: 'business_process_area', label: 'Business Area', visible: false },
        { key: 'person_in_charge', label: '担当者', visible: true },
        { key: 'person_in_charge2', label: '担当者2', visible: false },
        { key: 'person_in_charge3', label: '担当者3', visible: false },
        { key: 'sa_policy', label: 'SA Policy', visible: false },
        { key: 'sa_policy_detail', label: 'SA Detail', visible: false },
        { key: 'transfer_method', label: 'Transfer', visible: false },
        { key: 'brownfield_migration_destination', label: 'Migration先', visible: false },
        { key: 'policy_decision_status', label: 'Policy Status', visible: false },
        { key: 'sit_start_date', label: 'SIT開始', visible: true },
        { key: 'sit_end_date', label: 'SIT終了', visible: true },
        { key: 'golive_date', label: 'GoLive', visible: true },
        { key: 'app_stop_date', label: '停止日', visible: false },
        { key: 'pj_start_date_plan', label: 'PJ開始(予定)', visible: false },
        { key: 'pj_end_date_plan', label: 'PJ終了(予定)', visible: false },
        { key: 'pj_start_date_actual', label: 'PJ開始(実績)', visible: false },
        { key: 'pj_end_date_actual', label: 'PJ終了(実績)', visible: false },
        { key: 'release_group', label: 'リリースG', visible: true },
        { key: 'budget_name', label: 'Budget Name', visible: false },
        { key: 'budget_app_group', label: 'Budget Group', visible: false },
        { key: 'budget_app_id', label: 'Budget ID', visible: false },
        { key: 'remarks', label: '備考', visible: false },
        { key: 'outsourcing_flag', label: 'Outsource', visible: false },
        { key: 'outsourcing_level', label: 'Outsource Level', visible: false },
        { key: 'major_issuse_related', label: '5大課題', visible: false },
        { key: 'work_ability', label: '職能', visible: false },
        { key: 'core_related', label: 'Core', visible: false },
        { key: 'tsa_no', label: 'TSA No', visible: false },
        { key: 'ams_vendor_pas_recognition', label: 'AMS(PAS)', visible: false },
        { key: 'rfp_send_vendor', label: 'RFP1', visible: false },
        { key: 'rfp_send_vendor2', label: 'RFP2', visible: false },
        { key: 'rfp_send_vendor3', label: 'RFP3', visible: false },
        { key: 'rfp_type', label: 'RFP Type', visible: false },
        { key: 'submission', label: 'Submission', visible: false },
        { key: 'quote_reception', label: 'Quote受領', visible: false },
        { key: 'quote_review', label: 'Quoteレビュー', visible: false },
        { key: 'supplement_rfq', label: '補足', visible: false },
        { key: 'quote_draft_seller', label: 'ドラフト', visible: false },
        { key: 'quote_review_seller', label: 'レビュー', visible: false },
        { key: 'old_management_item', label: '旧項目', visible: false },
        { key: 'development_environment', label: '開発環境', visible: false },
        { key: 'test_environment', label: '検証環境', visible: false },
        { key: 'production_environment', label: '本番環境', visible: false },
        { key: 'charter_name', label: 'Charter', visible: false },
        { key: 'pas_board_review_date', label: 'PAS審査日', visible: false },
        { key: 'apollo_charter_review_date', label: 'Apollo審査日', visible: false },
        { key: 'approval_app_submission', label: '承認', visible: false },
        { key: 'charter_approval_status', label: '承認状態', visible: false },
        { key: 'contracting', label: '契約', visible: false },
        { key: 'project_start_date', label: 'PJ開始', visible: false },
        { key: 'project_kickoff', label: 'Kickoff', visible: false },
    ])

    // 保存（列表示状態）
    watch(columns, (val) => {
        localStorage.setItem('columns', JSON.stringify(val))
    }, { deep: true })

    const saved = localStorage.getItem('columns')
    if (saved) {
        columns.value = JSON.parse(saved)
    }

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

        const rows = props.applists.data.map(row => {
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
                <div class="flex items-center gap-4">
                    <label for="transfer_method" class="w-40">
                        移転方式
                    </label>
                    <select v-model="form.transfer_method" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in tsaExitMehotds" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <input v-model="form.brownfield_migration_destination" placeholder="SA化方針 BrownField移行先App" class="border p-2"/>
                <input type="date" v-model="form.sit_start_date" placeholder="SIT開始日" class="border p-2" />
                <input type="date" v-model="form.sit_end_date" placeholder="SIT終了日" class="border p-2" />
                <input type="date" v-model="form.golive_date" placeholder="Go-Live日" class="border p-2" />
                <input type="date" v-model="form.app_stop_date" placeholder="停止時期" class="border p-2" />
                <input type="date" v-model="form.pj_start_date_plan" placeholder="PJ開始日(予定)" class="border p-2" />
                <input type="date" v-model="form.pj_end_date_plan" placeholder="PJ開始日(予定)" class="border p-2" />
                <input type="date" v-model="form.pj_start_date_actual" placeholder="SIT開始日(実績)" class="border p-2" />
                <input type="date" v-model="form.pj_end_date_actual" placeholder="SIT開始日(実績)" class="border p-2" />
                <div class="flex items-center gap-4">
                    <label class="w-40">リリースグループ</label>
                    <div class="flex gap-4">
                        <label v-for="item in releaseGroup" :key="item.value" class="flex items-center">
                            <input type="checkbox" :value="item.value" v-model="form.release_group" class="mr-2">
                            {{ item.label }}
                        </label>
                    </div>
                </div>
                <input v-model="form.budget_name" placeholder="Budget Name" class="border p-2"/>
                <input v-model="form.budget_app_group" placeholder="Budget App Group" class="border p-2"/>
                <input v-model="form.budget_app_id" placeholder="Budget ID" class="border p-2"/>
                <input v-model="form.remarks" placeholder="コメント" class="border p-2"/>
                <input type="checkbox" v-model="form.outsourcing_flag" class="mr-2"><label>アウトソーシングフラグ</label>
                <input v-model="form.outsourcing_level" placeholder="アウトソーシングレベル" class="border p-2"/>
                <input v-model="form.work_ability" placeholder="職能アプリフラグ" class="border p-2"/>
                <input v-model="form.major_issuse_related" placeholder="5大課題関連" class="border p-2"/>
                <input type="checkbox" v-model="form.core_related" class="mr-2"><label>Core関連</label>
                <input v-model="form.tsa_no" placeholder="TSA No" class="border p-2"/>
                <input v-model="form.ams_vendor_pas_recognition" placeholder="AMSベンダ(PAS認識)" class="border p-2"/>
                <input v-model="form.ams_vendor_phd_recognition" placeholder="AMSベンダ(PHD調査結果)" class="border p-2"/>
                <input v-model="form.rfp_send_vendor" placeholder="最終RFP送付先" class="border p-2"/>
                <input v-model="form.rfp_send_vendor2" placeholder="最終RFP送付先2" class="border p-2"/>
                <input v-model="form.rfp_send_vendor3" placeholder="最終RFP送付先3" class="border p-2"/>
                <div class="flex items-center gap-4">
                    <label for="submission" class="w-40">
                        RFP個別・一斉
                    </label>
                    <select v-model="form.submission" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpSends" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="submission" class="w-40">
                        Submission
                    </label>
                    <select v-model="form.submission" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="quote_reception" class="w-40">
                        quote_reception
                    </label>
                    <select v-model="form.quote_reception" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="quote_review" class="w-40">
                        quote_reception
                    </label>
                    <select v-model="form.quote_review" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <input v-model="form.supplement_rfq" placeholder="補足情報記載欄" class="border p-2"/>
                <div class="flex items-center gap-4">
                    <label for="quote_draft_seller" class="w-40">
                        quote_reception
                    </label>
                    <select v-model="form.quote_draft_seller" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="quote_review_seller" class="w-40">
                        quote_review_seller
                    </label>
                    <select v-model="form.quote_review_seller" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="old_management_item" class="w-40">
                        旧管理項目
                    </label>
                    <select v-model="form.old_management_item" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="development_environment" class="w-40">
                        開発環境
                    </label>
                    <select v-model="form.development_environment" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in environmentTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="test_environment" class="w-40">
                        検証環境
                    </label>
                    <select v-model="form.test_environment" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in environmentTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="production_environment" class="w-40">
                        本番環境
                    </label>
                    <select v-model="form.production_environment" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in environmentTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="charter_name" class="w-40">
                        charter_name
                    </label>
                    <select v-model="form.charter_name" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in charterTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <input type="date" v-model="form.pas_board_review_date" placeholder="pas_board_review_date" class="border p-2" />
                <input type="date" v-model="form.apollo_charter_review_date" placeholder="apollo_charter_review_date" class="border p-2" />
                <div class="flex items-center gap-4">
                    <label for="apollo_charter_review" class="w-40">
                        apollo_charter_review
                    </label>
                    <select v-model="form.apollo_charter_review" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpSends" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="approval_app_submission" class="w-40">
                        approval_app_submission
                    </label>
                    <select v-model="form.approval_app_submission" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in charterTypes" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="charter_approval_status" class="w-40">
                        charter_approval_status
                    </label>
                    <select v-model="form.charter_approval_status" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpSends" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="contracting" class="w-40">
                        contracting
                    </label>
                    <select v-model="form.contracting" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpSends" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <label for="contracting" class="w-40">
                        contracting
                    </label>
                    <select v-model="form.contracting" class="border p-2">
                        <option value="">選択してください</option>
                        <option v-for="item in rfpSends" :key="item.value" :value="item.value">
                            {{ item.label }}
                        </option>
                    </select>
                </div>
            </div>
            <button class="bg-blue-500 text-white px-4 py-2" @click="search">
                検索
            </button>

            <!-- 操作バー -->
            <div class="mb-4 flex gap-4">
                <button @click="exportCsv" class="bg-green-500 text-white px-4 py-2 rounded">
                    CSV出力
                </button>
            </div>

            <!-- 列ON/OFF -->
            <div class="mb-4 flex flex-wrap gap-2">
                <label v-for="col in columns" :key="col.key" class="flex items-center gap-1">
                    <input type="checkbox" v-model="col.visible">
                    {{ col.label }}
                </label>
            </div>

            <!-- テーブル -->
            <div class="overflow-x-auto">
                <table class="min-w-max border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th v-for="col in columns" v-if="col.visible" :key="col.key" class="p-2 cursor-pointer whitespace-nowrap" :class="{ 'sticky bg-gray-100 z-10': col.fixed }" :style="col.fixed ? { left: col.left + 'px' } : {}" @click="sortBy(col.key)">
                                {{ col.label }} {{ getSortIcon(col.key) }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in applists.data" :key="row.id" class="border-t">
                            <td v-for="col in columns" v-if="col.visible" :key="col.key" class="p-2 whitespace-nowrap" :class="{ 'sticky bg-white z-10': col.fixed }" :style="col.fixed ? { left: col.left + 'px' } : {}">
                                <template v-if="col.key === 'id'">
                                    <Link :href="route('applists.show', row.id)">
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
            <Pagination class="mt-6" :links="applists.links"/>
        </div>
    </AuthenticatedLayout>
</template>