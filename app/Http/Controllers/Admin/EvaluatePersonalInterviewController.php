<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvaluatePersonalInterview;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Section;
use App\Models\Job;
use App\Http\Requests\Admin\EvaluateRequests\EvaluateStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EvaluateExport;
use PDF;

class EvaluatePersonalInterviewController  extends Controller
{

    protected $model;

    public function __construct(EvaluatePersonalInterview $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $data = [
                'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
                'evaluates'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'inputs'=>$request->all(),
                'section'=>Section::deleteArchive()->select('id','name')->get(),
                'evaluates'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT)
            ];

            return view('admin.evaluates.index', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }


    public function create()
    {
        $data = [
            'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
            'section'=>Section::deleteArchive()->select('id','name')->get(),
        ];
        return view('admin.evaluates.create',$data);
    }

    public function store(EvaluateStoreRequest $request)
    {
        try{
            // validation
            $evaluate = new $this->model();
            $evaluate->name = $request->name;
            $evaluate->job_id = $request->job_id;
            $evaluate->qualification = $request->qualification;
            $evaluate->section_id = $request->section_id;
            $evaluate->extierior = $request->extierior;
            $evaluate->personal = $request->personal;
            $evaluate->team_work = $request->team_work;
            $evaluate->initiatire = $request->initiatire;
            $evaluate->english = $request->english;
            $evaluate->ambition = $request->ambition;
            $evaluate->make_decision = $request->make_decision;
            $evaluate->experience = $request->experience;
            $evaluate->skills = $request->skills;
            $evaluate->qualification_skills = $request->qualification_skills;
            if($request->interview_status == "قبول" || $request->interview_status == "انتظار" || $request->interview_status == "رفض" ){
                $evaluate->interview_status = $request->interview_status;
            }else{
                flash()->error("هناك خطا ما ...برجاء الاتصال بالدعم الفني");
                return back();
            }
            $evaluate->notes = $request->notes;
            $evaluate->interview_date = $request->interview_date;
            $evaluate->save();
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
            $data = [
                'jobs'=>Job::deleteArchive()->select('id','name_job')->get(),
                'section'=>Section::deleteArchive()->select('id','name')->get(),
                'evaluate'=>$this->model->findOrFail($id)
            ];
            return view('admin.evaluates.edit',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(EvaluateStoreRequest $request, $id)
    {
        try{
            // validation
            $evaluate = $this->model->findOrFail($id);
            if(!$evaluate == null){
                $evaluate->name = $request->name;
                $evaluate->job_id = $request->job_id;
                $evaluate->qualification = $request->qualification;
                $evaluate->section_id = $request->section_id;
                $evaluate->extierior = $request->extierior;
                $evaluate->personal = $request->personal;
                $evaluate->team_work = $request->team_work;
                $evaluate->initiatire = $request->initiatire;
                $evaluate->english = $request->english;
                $evaluate->ambition = $request->ambition;
                $evaluate->make_decision = $request->make_decision;
                $evaluate->experience = $request->experience;
                $evaluate->skills = $request->skills;
                $evaluate->qualification_skills = $request->qualification_skills;
                if($request->interview_status == "قبول" || $request->interview_status == "انتظار" || $request->interview_status == "رفض" ){
                    $evaluate->interview_status = $request->interview_status;
                }else{
                    flash()->error("هناك خطا ما ...برجاء الاتصال بالدعم الفني");
                    return back();
                }
                $evaluate->notes = $request->notes;
                $evaluate->interview_date = $request->interview_date;
                $evaluate->save();
                flash()->success("Success update");
                return back();
            }else{
                flash()->error("Not Found , please Contact Technical Support");
                return back();
            }
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $evaluate = $this->model->findOrFail($id);
            $evaluate->archive = 1;
            $evaluate->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportExcel(Request $request)
    {
        try{
            $inputs =  $request->all();
            return Excel::download(new EvaluateExport($inputs), 'evaluates.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $evaluate = $this->model->findOrFail($id);
            return view('admin.evaluates.print', compact('evaluate'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $evaluates = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.evaluates.pdf', compact('evaluates'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(Request $request)
    {
        try{
            $inputs = $request->all();
            $evaluates = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.evaluates.pdf', ['evaluates'=>$evaluates,'inputs'=>$inputs]);
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('evaluates.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $evaluates = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $evaluates = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($evaluates && count($evaluates) > 0){
                foreach($evaluates as $evaluate ){
                    $evaluate->urlRouteEdit = route('admin/evaluatePersonalInterviews/edit', $evaluate->id);
                    $evaluate->urlRouteDelete = route('admin/evaluatePersonalInterviews/delete', $evaluate->id);
                    $evaluate->urlRoutePrint = route('admin/evaluatePersonalInterviews/print', $evaluate->id);
                    $evaluate->urlRouteSection= optional($evaluate->Section)->name;
                    $evaluate->urlRouteJob =optional($evaluate->Job)->name_job ;
                    $data[] = $evaluate;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
