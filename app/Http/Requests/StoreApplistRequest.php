<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplistRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pasj_id'                          => ['nullable', 'max:20'], 
            'system_map_no'                    => ['nullable', 'max:20'], 
            'legal_entity'                     => ['nullable', 'max:50'],
            'pas_use'                          => ['nullable', 'numeric'],
            'pits_use'                         => ['nullable', 'numeric'],
            'pce_use'                          => ['nullable', 'numeric'],
            'app_name'                         => ['nullable', 'max:50'],
            'app_description'                  => ['nullable', 'max:200'],
            'app_local_name'                   => ['nullable', 'max:200'],
            'app_type'                         => ['nullable', 'max:50'],
            'resource_type'                    => ['nullable', 'max:50'],
            'hosting_type'                     => ['nullable', 'max:50'],
            'tsa_exit_disposition'             => ['nullable', 'max:50'],
            'app_classification'               => ['nullable', 'max:50'],
            'wave_type'                        => ['nullable', 'max:20'],
            'wavex_judgement'                  => ['nullable', 'max:20'],
            'business_process_area'            => ['nullable', 'max:50'],
            'person_in_charge'                 => ['nullable', 'max:50'],
            'person_in_charge2'                => ['nullable', 'max:50'],
            'person_in_charge3'                => ['nullable', 'max:50'],
            'sa_policy'                        => ['nullable', 'max:50'],
            'sa_policy_detail'                 => ['nullable', 'max:200'],
            'transfer_method'                  => ['nullable', 'max:50'],
            'brownfield_migration_destination' => ['nullable', 'max:200'],
            'policy_decision_status'           => ['nullable', 'max:50'],
            'sit_start_date'                   => ['nullable', 'date'],
            'sit_end_date'                     => ['nullable', 'date', 'after:sit_start_date'],
            'golive_date'                      => ['nullable', 'date'],
            'app_stop_date'                    => ['nullable', 'date'],
            'pj_start_date_plan'               => ['nullable', 'date'],
            'pj_end_date_plan'                 => ['nullable', 'date', 'after:pj_end_date_plan'],
            'pj_start_date_actual'             => ['nullable', 'date'],
            'pj_end_date_actual'               => ['nullable', 'date', 'after:pj_end_date_actual'],
            'release_group'                    => ['nullable', 'max:50'],
            'budget_name'                      => ['nullable', 'max:50'],
            'budget_app_group'                 => ['nullable', 'max:50'],
            'budget_app_id'                    => ['nullable', 'max:50'],
            'remarks'                          => ['nullable', 'max:200'],
            'outsourcing_flag'                 => ['nullable', 'max:2'],
            'outsourcing_level'                => ['nullable', 'max:50'],
            'major_issuse_related'             => ['nullable', 'max:50'],
            'work_ability'                     => ['nullable', 'max:50'],
            'core_related'                     => ['nullable', 'max:50'],
            'tsa_no'                           => ['nullable', 'max:50'],
            'ams_vendor_pas_recognition'       => ['nullable', 'max:50'],
            'rfp_send_vendor'                  => ['nullable', 'max:50'],
            'rfp_send_vendor2'                 => ['nullable', 'max:50'],
            'ams_vendor_phd_recognition'       => ['nullable', 'max:50'],
            'rfp_type'                         => ['nullable', 'numeric'],
            'submission'                       => ['nullable', 'numeric'],
            'quote_reception'                  => ['nullable', 'numeric'],
            'quote_review'                     => ['nullable', 'numeric'],
            'supplement_rfq'                   => ['nullable', 'max:50'],
            'quote_draft_seller'               => ['nullable', 'numeric'],
            'quote_review_seller'              => ['nullable', 'numeric'],
            'old_management_item'              => ['nullable', 'numeric'],
            'development_environment'          => ['nullable', 'max:50'],
            'test_environment'                 => ['nullable', 'max:50'],
            'production_environment'           => ['nullable', 'max:50'],
            'charter_name'                     => ['nullable', 'max:50'],
            'pas_board_review_date'            => ['nullable', 'date'],
            'pas_board_charter_review'         => ['nullable', 'numeric'],
            'apollo_charter_review'            => ['nullable', 'numeric'],
            'approval_app_submission'          => ['nullable', 'numeric'],
            'charter_approval_status'          => ['nullable', 'numeric'],
            'contracting'                      => ['nullable', 'numeric'],
            'project_start_date'               => ['nullable', 'date'],
            'project_kickoff'                  => ['nullable', 'numeric'],
            'insert_date'                      => ['nullable', 'date'],
            'insert_user'                      => ['nullable', 'max:50'],
            'insert_program'                   => ['nullable', 'max:50'],
            'update_date'                      => ['nullable', 'date'],
            'update_user'                      => ['nullable', 'max:50'],
            'update_program'                   => ['nullable', 'max:50'],
        ];
    }
}
