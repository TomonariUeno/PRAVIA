<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applists', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->string('pasj_id')->nullable();
            $table->string('system_map_no')->nullable();
            $table->string('legal_entity')->nullable();
            $table->integer('pas_use')->nullable();
            $table->integer('pits_use')->nullable();
            $table->integer('pce_use')->nullable();
            $table->string('app_name')->nullable();
            $table->string('app_description')->nullable();
            $table->string('app_local_name')->nullable();
            $table->string('app_type')->nullable();
            $table->string('resource_type')->nullable();
            $table->string('hosting_type')->nullable();
            $table->string('tsa_exit_disposition')->nullable();
            $table->string('app_classification')->nullable();
            $table->string('wave_type')->nullable();
            $table->string('wavex_judgement')->nullable();
            $table->string('business_process_area')->nullable();
            $table->string('person_in_charge')->nullable();
            $table->string('person_in_charge2')->nullable();
            $table->string('person_in_charge3')->nullable();
            $table->string('sa_policy')->nullable();
            $table->string('sa_policy_detail')->nullable();
            $table->string('transfer_method')->nullable();
            $table->string('brownfield_migration_destination')->nullable(); 
            $table->string('policy_decision_status')->nullable(); 
            $table->date('sit_start_date')->nullable();
            $table->date('sit_end_date')->nullable(); 
            $table->date('golive_date')->nullable(); 
            $table->date('app_stop_date')->nullable(); 
            $table->date('pj_start_date_plan')->nullable(); 
            $table->date('pj_end_date_plan')->nullable();
            $table->date('pj_start_date_actual')->nullable();
            $table->date('pj_end_date_actual')->nullable();
            $table->string('release_group')->nullable();
            $table->string('budget_name')->nullable();
            $table->string('budget_app_group')->nullable();
            $table->string('budget_app_id')->nullable();
            $table->string('remarks')->nullable();
            $table->string('outsourcing_flag')->nullable();
            $table->string('outsourcing_level')->nullable();
            $table->string('major_issuse_related')->nullable();
            $table->string('work_ability')->nullable();
            $table->string('core_related')->nullable();
            $table->string('tsa_no')->nullable();
            $table->string('ams_vendor_pas_recognition')->nullable();
            $table->string('rfp_send_vendor')->nullable();
            $table->string('rfp_send_vendor2')->nullable();
            $table->string('ams_vendor_phd_recognition')->nullable();
            $table->integer('rfp_type')->nullable();
            $table->integer('submission')->nullable();
            $table->integer('quote_reception')->nullable();
            $table->integer('quote_review')->nullable();
            $table->string('supplement_rfq')->nullable();
            $table->integer('quote_draft_seller')->nullable();
            $table->integer('quote_review_seller')->nullable();
            $table->integer('old_management_item')->nullable();
            $table->string('development_environment')->nullable();
            $table->string('test_environment')->nullable();
            $table->string('production_environment')->nullable();
            $table->string('charter_name')->nullable();
            $table->date('pas_board_review_date')->nullable();
            $table->integer('pas_board_charter_review')->nullable();
            $table->date('apollo_charter_review_date')->nullable();
            $table->integer('apollo_charter_review')->nullable();
            $table->integer('approval_app_submission')->nullable();
            $table->integer('charter_approval_status')->nullable();
            $table->integer('contracting')->nullable();
            $table->date('project_start_date')->nullable();
            $table->integer('project_kickoff')->nullable();
            $table->date('insert_date')->nullable();
            $table->string('insert_user')->nullable();
            $table->string('insert_program')->nullable();
            $table->date('update_date')->nullable();
            $table->string('update_user')->nullable();
            $table->string('update_program')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applists', function (Blueprint $table) {

            $table->dropSoftDeletes();

        });
    }
};
