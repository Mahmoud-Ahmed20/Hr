<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UnderTheScabiesExport;
use App\Http\Controllers\Controller;
use App\Models\UnderTheScabies;
use App\Models\Job;
use App\Models\Administration;
use App\Models\Staff;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\UnderTheScabieRequests\UnderTheScabieRequests;
use PDF;
use Maatwebsite\Excel\Facades\Excel;


class UnderTheScabiesController extends Controller
{
    public $model;
    public function __construct(UnderTheScabies $model)
    {
        $this->model = $model;
    }


    public function index(Request $request)
    {
        $data= [
            'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
            'administrations'=>Administration::deletArchive()->select('id','name_administration')->get(),
            'staffs'=>Staff::notArchive()->select('id','name')->get(),
            'UnderTheScabies'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
            'inputs'=>$request->all(),
            'sections'=>Section::deleteArchive()->select('id','name')->get(),
            'UnderTheScabies'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT)
        ];
        return view('admin.UnderTheScabies.index',$data);
    }
    public function test(Request $request)
    {
        return dd($request->all());
    }
    public function create()
    {
        $data= [
            'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
            'administrations'=>Administration::deletArchive()->select('id','name_administration')->get(),
            'staffs'=>Staff::notArchive()->select('id','name')->get(),
            'sections'=>Section::deleteArchive()->select('id','name')->get()
        ];
        return view('admin.UnderTheScabies.create',$data);
    }
    public function activate($id)
    {
        try{

            $UnderTheScabie = $this->model->findOrFail($id);
            if($UnderTheScabie->is_activate==1)
            {
                $UnderTheScabie->update(['is_activate'=>0]);
            }else
            {
                $UnderTheScabie->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function delete($id)
    {
        try{
            $UnderTheScabie = $this->model->findOrFail($id);
            $UnderTheScabie->archive = 1;
            $UnderTheScabie->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function edit($id)
    {
        $data = [
            'UnderTheScabie'=>$this->model->findOrFail($id),
            'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
            'administrations'=>Administration::deletArchive()->select('id','name_administration')->get(),
            'staffs'=>Staff::notArchive()->select('id','name')->get(),
            'sections'=>Section::deleteArchive()->select('id','name')->get()
        ];
        return view('admin.UnderTheScabies.edit',$data);
    }
    public function update(UnderTheScabieRequests $re,$id)
    {
        $UnderTheScabie = $this->model->findOrFail($id);
        $UnderTheScabie->staff_id = $re->staff_id;
        $UnderTheScabie->job_id = $re->job_id;
        $UnderTheScabie->section_id = $re->section_id;
        $UnderTheScabie->administration_id = $re->administration_id;
        $UnderTheScabie->direct_admin_name = $re->direct_admin_name;
        $UnderTheScabie->date_of_being_hired = $re->date_of_being_hired;
        $UnderTheScabie->performance_appraisal_date = $re->performance_appraisal_date;
        $UnderTheScabie->maintain_working_hours = $re->maintain_working_hours;
        $UnderTheScabie->good_productivity_performance =$re->good_productivity_performance;
        $UnderTheScabie->production_quantity = $re->production_quantity;
        $UnderTheScabie->learning_ability = $re->learning_ability;
        $UnderTheScabie->work_progress = $re->work_progress;
        $UnderTheScabie->adhere_to_the_directives_instructions = $re->adhere_to_the_directives_instructions;
        $UnderTheScabie->initiative_and_quick_wit = $re->initiative_and_quick_wit;
        $UnderTheScabie->relationship_with_colleagues = $re->relationship_with_colleagues;
        $UnderTheScabie->ability_to_organize_work = $re->ability_to_organize_work;
        $UnderTheScabie->take_advantage_of_working_time = $re->take_advantage_of_working_time;
        $UnderTheScabie->direct_administrators_recommendation = $re->direct_administrators_recommendation;
        $UnderTheScabie->notes = $re->notes;
        $UnderTheScabie->save();
        flash()->success("The Updated Has Been Done");
        return back();
    }
    public function print($id)
    {
        $UnderTheScabie = $this->model->findOrFail($id);
        return view('admin.UnderTheScabies.print',compact('UnderTheScabie'));
    }
    public function store(UnderTheScabieRequests $re)
    {
        try{
            $UnderTheScabie = new $this->model();
            $UnderTheScabie->staff_id = $re->staff_id;
            $UnderTheScabie->job_id = $re->job_id;
            $UnderTheScabie->section_id = $re->section_id;
            $UnderTheScabie->administration_id = $re->administration_id;
            $UnderTheScabie->direct_admin_name = $re->direct_admin_name;
            $UnderTheScabie->date_of_being_hired = $re->date_of_being_hired;
            $UnderTheScabie->performance_appraisal_date = $re->performance_appraisal_date;
            $UnderTheScabie->maintain_working_hours = $re->maintain_working_hours;
            $UnderTheScabie->good_productivity_performance =$re->good_productivity_performance;
            $UnderTheScabie->production_quantity = $re->production_quantity;
            $UnderTheScabie->learning_ability = $re->learning_ability;
            $UnderTheScabie->work_progress = $re->work_progress;
            $UnderTheScabie->adhere_to_the_directives_instructions = $re->adhere_to_the_directives_instructions;
            $UnderTheScabie->initiative_and_quick_wit = $re->initiative_and_quick_wit;
            $UnderTheScabie->relationship_with_colleagues = $re->relationship_with_colleagues;
            $UnderTheScabie->ability_to_organize_work = $re->ability_to_organize_work;
            $UnderTheScabie->take_advantage_of_working_time = $re->take_advantage_of_working_time;
            $UnderTheScabie->direct_administrators_recommendation = $re->direct_administrators_recommendation;
            $UnderTheScabie->notes = $re->notes;
            $UnderTheScabie->is_activate = 1;
            $UnderTheScabie->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $UnderTheScabies = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $UnderTheScabies = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($UnderTheScabies && count($UnderTheScabies) > 0){
                foreach($UnderTheScabies as $UnderTheScabie ){
                    $UnderTheScabie->urlRouteEdit = route('admin/evaluatePersonalInterviews/edit', $UnderTheScabie->id);
                    $UnderTheScabie->urlRouteDelete = route('admin/evaluatePersonalInterviews/delete', $UnderTheScabie->id);
                    $UnderTheScabie->urlRoutePrint = route('admin/evaluatePersonalInterviews/print', $UnderTheScabie->id);
                    $UnderTheScabie->urlRouteStaff= optional($UnderTheScabie->staff)->name;
                    $UnderTheScabie->urlRouteJob =optional($UnderTheScabie->Job)->name_job ;
                    $data[] = $UnderTheScabie;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportPDF(Request $request)
    {
        try{
            $inputs = $request->all();
            $UnderTheScabies = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.UnderTheScabies.pdf', ['UnderTheScabies'=>$UnderTheScabies,'inputs'=>$inputs]);
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('evaluates.pdf');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new UnderTheScabiesExport($inputs), 'UnderTheScabies.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }



}
