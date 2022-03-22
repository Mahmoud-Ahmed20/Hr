<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Job_descriptionExports;
use App\Exports\Notice_absence_employeeExports;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\job_descriptionRequests\job_descriptionRequests;
use App\Models\Administration;
use App\Models\Job;
use App\Models\Job_description;
use App\Models\Section;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Job_descriptionController  extends Controller
{

    protected $model;

    public function __construct(Job_description $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $job_description = $this->model->with(['administration','staff','section'])->notArchive()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
            $inputs=$request->all();
            return view('admin.job_description.index', compact('job_description','inputs'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }
    // public function test(Request $request)
    // {
    //     dd($request->all());
    //     $job_description = $this->model->with(['administration','staff','section'])->notArchive()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
    //     $inputs = $request->all;

    // }

    public function create()
    {
        $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
        $administrations=Administration::deletArchive()->orderBy('id','DESC')->get();
        $sections=Section::notArchive()->orderBy('id','DESC')->get();
        $administrations=Administration::notArchive()->orderBy('id','DESC')->get();
        $sections=Section::notArchive()->orderBy('id','DESC')->get();
        return view('admin.job_description.create', compact('staffs','administrations','sections'));
    }

    public function store(job_descriptionRequests $request)
    {

        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create request
            $job_descriptionData = new $this->model();
            $job_descriptionData->job_title = $request->job_title;
            $job_descriptionData->section_id = $request->section_id;
            $job_descriptionData->staff_id = $request->staff_id;
            $job_descriptionData->administration_id = $request->administration_id;
            $job_descriptionData->direct_manager_name = $request->direct_manager_name;
            $job_descriptionData->follower_occupations = $request->follower_occupations;
            $job_descriptionData->aim_from_job = $request->aim_from_job;
            $job_descriptionData->functions_and_duties_job = $request->functions_and_duties_job;
            $job_descriptionData->special_circumstances = $request->special_circumstances;
            $job_descriptionData->job_relations = $request->job_relations;
            $job_descriptionData->skills_and_language = $request->skills_and_language;
            $job_descriptionData->occupant_specifications = $request->occupant_specifications;

            $job_descriptionData->save();

            DB::commit();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function update(job_descriptionRequests $request,$id)
    {
        try{
            $job_descriptionData =  $this->model->findOrFail($id);



            $job_descriptionData->job_title = $request->job_title;
            $job_descriptionData->section_id = $request->section_id;
            $job_descriptionData->staff_id = $request->staff_id;
            $job_descriptionData->administration_id = $request->administration_id;
            $job_descriptionData->direct_manager_name = $request->direct_manager_name;
            $job_descriptionData->follower_occupations = $request->follower_occupations;
            $job_descriptionData->aim_from_job = $request->aim_from_job;
            $job_descriptionData->functions_and_duties_job = $request->functions_and_duties_job;
            $job_descriptionData->special_circumstances = $request->special_circumstances;
            $job_descriptionData->job_relations = $request->job_relations;
            $job_descriptionData->skills_and_language = $request->skills_and_language;
            $job_descriptionData->occupant_specifications = $request->occupant_specifications;

            $job_descriptionData->save();




            DB::commit();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            DB::rollback();
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $current_data = $this->model->findOrFail($id)->load(['administration','staff','section']);
            $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
            $administrations=Administration::notArchive()->orderBy('id','DESC')->get();
            $sections=Section::notArchive()->orderBy('id','DESC')->get();

            return view('admin.job_description.edit', compact('current_data','staffs','administrations','sections'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $employe = $this->model->findOrFail($id);
            $employe->archive = 1;
            $employe->save();

            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $employees = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get()->load(['administration','staff','section']);
            }else{
                $employees = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get()->load(['administration','staff','section']);
            }
            $data = [];
            if($employees && count($employees) > 0){
                foreach($employees as $employee ){
                    $employee->urlRouteDelete = route('admin/job_description/delete', $employee->id);
                    $employee->urlRoutePrint = route('admin/job_description/print', $employee->id);
                    $data[] = $employee;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $employe = $this->model->findOrFail($id);
            $onestaff = Staff::where('id',$employe->staff_id)->first();
            $onesection = Section::where('id',$employe->section_id)->first();
//            dd($onesection->name);
            $oneadministration = Administration::where('id',$employe->administration_id)->first();
            return view('admin.job_description.print', compact('oneadministration','employe','onesection','onestaff'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new Job_descriptionExports($inputs) ,'job_description.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {

        try{
            $job_description = $this->model->with(['administration','staff','section'])->notArchive()->get();
            $pdf = PDF::loadView('admin.job_description.pdf',compact('job_description'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('job_description.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

}
