<?php

namespace App\Http\Controllers;

use App\Models\Applist;
use App\Http\Requests\StoreApplistRequest;
use App\Http\Requests\UpdateApplistRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ApplistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index(Request $request)
    {
        //
        $sort = $request->sort ?? 'id';
        $direction = $request->direction ?? 'asc';

        $filters = $request->only([
            'pasj_id',
            'system_map_no',
            'legal_entity',
            'pas_use',
            'pits_use',
            'pce_use',
            'app_name',
            'app_description',
            'app_local_name',
            'app_type',
            'resource_type',
            'hosting_type',
            'tsa_exit_disposition',
            'app_classification',
            'wave_type',
            'wavex_judgement',
            'person_in_charge',
            'person_in_charge2',
            'person_in_charge3',
            'sa_policy',
            'sa_policy_detail',
            'transfer_method',
            'brownfield_migration_destination',
            'policy_decision_status',
            'sit_start_date',
            'sit_end_date',
            'golive_date',
            'app_stop_date',
            'pj_start_date_plan',
            'pj_end_date_plan',
            'pj_start_date_actual',
            'pj_end_date_actual',
            'release_group',
            'budget_name',
            'budget_app_group',
            'budget_app_id',
            'remarks',
            'outsourcing_flag',
            'outsourcing_level',
            'major_issuse_related',
            'work_ability',
            'core_related',
            'tsa_no',
            'ams_vendor_pas_recognition',
            'rfp_send_vendor',
            'rfp_send_vendor2',
            'ams_vendor_phd_recognition',
            'rfp_type',
            'submission',
            'quote_reception',
            'quote_review',
            'supplement_rfq',
            'quote_draft_seller',
            'quote_review_seller',
            'old_management_item',
            'development_environment',
            'test_environment',
            'production_environment',
            'charter_name',
            'pas_board_review_date',
            'pas_board_charter_review',
            'apollo_charter_review_date',
            'apollo_charter_review',
            'approval_app_submission',
            'charter_approval_status',
            'contracting',
            'project_start_date',
            'project_kickoff',
        ]);

        $applist = Applist::query()
            ->search($filters)
            ->select('*')
            ->orderBy($sort,$direction)
            ->paginate(1000)
            ->withQueryString();

        return Inertia::render('Applist/Index',[
            'applist'=>$applist,
            'filters'=>$filters,
            'sort'=>$sort,
            'direction'=>$direction
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Applist $applist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applist $applist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplistRequest $request, Applist $applist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applist $applist)
    {
        //
    }
}
