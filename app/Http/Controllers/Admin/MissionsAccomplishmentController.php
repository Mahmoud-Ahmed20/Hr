<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MissionsAccomplishment;
use App\Models\Administration;
use App\Models\Staff;
use App\Models\Section;
use App\Models\Job;
use App\Http\Requests\Admin\MissionsAccomplishmentRequests\MissionsAccomplishmentStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\missionsAccomplishmentExport;
use PDF;

class MissionsAccomplishmentController  extends Controller
{

    protected $model;
    protected $staff;
    protected $administration;
    protected $sections;
    protected $job;

    public function __construct(MissionsAccomplishment $model, Staff $staff, Job $job, Section $sections, Administration $administration)
    {
        $this->model = $model;
        $this->staff = $staff;
        $this->administration = $administration;
        $this->sections = $sections;
        $this->job = $job;
    }

    public function index()
    {
        try{
            $data = [];
            $data['missionsAccomplishment'] = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            $data['Staffs'] = $this->staff->notArchive()->select('id', 'name')->get();
            $data['jobs'] = $this->job->deleteArchive()->select('id', 'name_job')->get();
            $data['sections'] = $this->sections->deleteArchive()->select('id', 'name')->get();
            $data['administrations'] = $this->administration->deletArchive()->select('id', 'name_administration')->get();
            return view('admin.missionsAccomplishment.index', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        try{
            $data = [];
            $data['Staffs'] = $this->staff->notArchive()->select('id', 'name')->get();
            $data['jobs'] = $this->job->deleteArchive()->select('id', 'name_job')->get();
            $data['sections'] = $this->sections->deleteArchive()->select('id', 'name')->get();
            $data['administrations'] = $this->administration->deletArchive()->select('id', 'name_administration')->get();
            return view('admin.missionsAccomplishment.create', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function store(MissionsAccomplishmentStoreRequest $request)
    {
        try{
            // validation
            //create employe
            $mission = new $this->model();
            $mission->staff_id = $request->staff_id;
            $mission->job_id = $request->job_id;
            $mission->section_id = $request->section_id;
            $mission->number = $request->number;
            $mission->work_date = $request->work_date;
            $mission->administration_id = $request->administration_id;
            $mission->duration_of_mission = $request->duration_of_mission;
            $mission->direction_of_the_mission = $request->direction_of_the_mission;
            $mission->start_working_at = $request->start_working_at;
            $mission->leaving_date = $request->leaving_date;
            $mission->mission_details = $request->mission_details;
            $mission->results = $request->results;
            $mission->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $data = [];
            $data['mission'] = $this->model->notArchive()->findOrFail($id);
            $data['Staffs'] = $this->staff->notArchive()->select('id', 'name')->get();
            $data['jobs'] = $this->job->deleteArchive()->select('id', 'name_job')->get();
            $data['sections'] = $this->sections->deleteArchive()->select('id', 'name')->get();
            $data['administrations'] = $this->administration->deletArchive()->select('id', 'name_administration')->get();
            return view('admin.missionsAccomplishment.edit', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function update(MissionsAccomplishmentStoreRequest $request, $id)
    {
        try{
            // validation
            //create employe
            $mission = $this->model->findOrFail($id);
            $mission->staff_id = $request->staff_id;
            $mission->job_id = $request->job_id;
            $mission->section_id = $request->section_id;
            $mission->number = $request->number;
            $mission->work_date = $request->work_date;
            $mission->administration_id = $request->administration_id;
            $mission->duration_of_mission = $request->duration_of_mission;
            $mission->direction_of_the_mission = $request->direction_of_the_mission;
            $mission->start_working_at = $request->start_working_at;
            $mission->leaving_date = $request->leaving_date;
            $mission->mission_details = $request->mission_details;
            $mission->results = $request->results;
            $mission->save();
            flash()->success("Success update");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $mission = $this->model->findOrFail($id);
            $mission->archive = 1;
            $mission->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportExcel()
    {
        try{
            return Excel::download(new missionsAccomplishmentExport, 'missionsAccomplishment.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $data = [];
            $data['mission'] = $this->model->notArchive()->findOrFail($id);
            $data['Staffs'] = $this->staff->notArchive()->select('id', 'name')->get();
            $data['jobs'] = $this->job->deleteArchive()->select('id', 'name_job')->get();
            $data['sections'] = $this->sections->deleteArchive()->select('id', 'name')->get();
            $data['administrations'] = $this->administration->deletArchive()->select('id', 'name_administration')->get();
            return view('admin.missionsAccomplishment.print', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $missionsAccomplishment = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.missionsAccomplishment.pdf', compact('missionsAccomplishment'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $missionsAccomplishment = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.missionsAccomplishment.pdf', compact('missionsAccomplishment'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('missionsAccomplishment.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $missionsAccomplishment = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $missionsAccomplishment = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($missionsAccomplishment && count($missionsAccomplishment) > 0){
                foreach($missionsAccomplishment as $mission ){
                    $mission->urlRouteEdit = route('admin/MissionsAccomplishment/edit', $mission->id);
                    $mission->urlRouteDelete = route('admin/MissionsAccomplishment/delete', $mission->id);
                    $mission->urlRoutePrint = route('admin/MissionsAccomplishment/print', $mission->id);
                    $mission->staffName = optional($mission->staff)->name;
                    $mission->jobName = optional($mission->job)->name_job;
                    $mission->sectionName = optional($mission->section)->name;
                    $mission->administrationName = optional($mission->administration)->name_administration;
                    $data[] = $mission;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Technical Support' ]);
        }
    }
}
