<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PerformanceStandardsTemplateExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PerformanceStandardsTemplateEmployee;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\PerformanceStandardsTemplateEmployeeRequests\PerformanceStandardsTemplateEmployeeRequests;
use PDF;
class PerformanceStandardsTemplateEmployeeController extends Controller
{

    public $model;
    public function __construct(PerformanceStandardsTemplateEmployee $model)
    {
        $this->model = $model;
    }
    public function index(Request $request)
    {
        $data = [
            'Performances'=>PerformanceStandardsTemplateEmployee::notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
            'staffs'=>Staff::notArchive()->select('id','name')->get(),
            'inputs'=>$request->all()
        ];
        return view('admin.PerformanceStandardsTemplateEmployee.index',$data);
    }
    public function test(Request $request)
    {
        return dd($request->all());
    }
    public function create()
    {
        $staffs = Staff::notArchive()->select('id','name')->get();
        return view('admin.PerformanceStandardsTemplateEmployee.create',compact('staffs'));
    }
    public function edit($id)
    {
        $data = [
            'staffs'=>Staff::notArchive()->select('id','name')->get(),
            'Performance'=>$this->model->findOrFail($id)
        ];
            return view('admin.PerformanceStandardsTemplateEmployee.edit',$data);
    }
    public function update(PerformanceStandardsTemplateEmployeeRequests $re,$id)
    {
        // dd($re->all());
        $Performance =$this->model->findOrFail($id);
        $Performance->staff_id = $re->staff_id;
        $Performance->job_title = $re->job_title;
        $Performance->understand_business_rules = $re->understand_business_rules;
        $Performance->get_work_done  = $re->get_work_done;
        $Performance->responding_to_work_pressure = $re->responding_to_work_pressure;
        $Performance->initiative_and_innovation_at_work = $re->initiative_and_innovation_at_work;
        $Performance->accept_directives_from_managers = $re->accept_directives_from_managers;
        $Performance->flexibility_and_adaptability = $re->flexibility_and_adaptability;
        $Performance->make_decisions_and_take_responsibility = $re->make_decisions_and_take_responsibility;
        $Performance->personal_cleanliness = $re->personal_cleanliness ;
        $Performance->adhere_to_corporate_policies = $re->adhere_to_corporate_policies;
        $Performance->teamwork  = $re->teamwork;
        $Performance->understand_notes =$re->understand_notes;
        $Performance->get_work_done_notes = $re->get_work_done_notes;
        $Performance->responding_to_work_pressure_notes = $re->responding_to_work_pressure_notes;
        $Performance->initiative_and_innovation_at_work_notes =$re->initiative_and_innovation_at_work_notes;
        $Performance->accept_directives_from_managers_notes = $re->accept_directives_from_managers_notes;
        $Performance->flexibility_and_adaptability_notes =$re->flexibility_and_adaptability_notes;
        $Performance->make_decisions_and_take_responsibility_notes = $re->make_decisions_and_take_responsibility_notes;
        $Performance->personal_cleanliness_notes = $re->personal_cleanliness_notes;
        $Performance->adhere_to_corporate_policies_notes = $re->adhere_to_corporate_policies_notes;
        $Performance->teamwork_notes = $re->teamwork_notes;
        $Performance->save();
        flash()->success("The Updated Has Been Done");
        return back();
    }
    public function store(PerformanceStandardsTemplateEmployeeRequests $re)
    {
        try{
            $Performance = new $this->model();
            $Performance->staff_id = $re->staff_id;
            $Performance->job_title = $re->job_title;
            $Performance->understand_business_rules = $re->understand_business_rules;
            $Performance->get_work_done  = $re->get_work_done;
            $Performance->responding_to_work_pressure = $re->responding_to_work_pressure;
            $Performance->initiative_and_innovation_at_work = $re->initiative_and_innovation_at_work;
            $Performance->accept_directives_from_managers = $re->accept_directives_from_managers;
            $Performance->flexibility_and_adaptability = $re->flexibility_and_adaptability;
            $Performance->make_decisions_and_take_responsibility = $re->make_decisions_and_take_responsibility;
            $Performance->personal_cleanliness = $re->personal_cleanliness ;
            $Performance->adhere_to_corporate_policies = $re->adhere_to_corporate_policies;
            $Performance->teamwork  = $re->teamwork;
            $Performance->understand_notes =$re->understand_notes;
            $Performance->get_work_done_notes = $re->get_work_done_notes;
            $Performance->responding_to_work_pressure_notes = $re->responding_to_work_pressure_notes;
            $Performance->initiative_and_innovation_at_work_notes =$re->initiative_and_innovation_at_work_notes;
            $Performance->accept_directives_from_managers_notes = $re->accept_directives_from_managers_notes;
            $Performance->flexibility_and_adaptability_notes =$re->flexibility_and_adaptability_notes;
            $Performance->make_decisions_and_take_responsibility_notes = $re->make_decisions_and_take_responsibility_notes;
            $Performance->personal_cleanliness_notes = $re->personal_cleanliness_notes;
            $Performance->adhere_to_corporate_policies_notes = $re->adhere_to_corporate_policies_notes;
            $Performance->teamwork_notes = $re->teamwork_notes;
            $Performance->is_activate = 1;
            $Performance->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
    }
   }


   public function activate($id)
   {
       try{

           $Performance = $this->model->findOrFail($id);
           if($Performance->is_activate==1)
           {
               $Performance->update(['is_activate'=>0]);
           }else
           {
               $Performance->update(['is_activate'=>1]);
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
            $Performance = $this->model->findOrFail($id);
            $Performance->archive = 1;
            $Performance->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function print($id)
    {
        $Performance = $this->model->findOrFail($id);
        return view('admin.PerformanceStandardsTemplateEmployee.print',compact('Performance'));
    }
    public function getMore(Request $re)
    {
        try{
            if(is_numeric($re->id) && $re->id > 0)
            {
              $Performances = $this->model->notArchive()->where('id','>',(int)$re->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $Performances = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($Performances&&count($Performances)>0)
            {
                foreach($Performances as $Performance)
                {
                    $Performance->urlRouteActivate = route('admin/performance/activate',$Performance->id);
                    $Performance->urlRouteDelete = route('admin/performance/delete',$Performance->id);
                    $Performance->urlRouteUpdate = route('admin/performance/edit',$Performance->id);
                    $Performance->urlRoutePrint = route('admin/performance/print',$Performance->id);
                    $Performance->StaffName = optional($Performance->staff)->name;
                    $data[] = $Performance;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportPdf(Request $request)
    {
        try{
            $inputs  = $request->all();
            $Performances = $this->model->all();
            $pdf = PDF::loadView('admin.PerformanceStandardsTemplateEmployee.pdf',compact('Performances','inputs'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('Performances.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new PerformanceStandardsTemplateExport($inputs), 'PerformanceStandardsTemplate.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
