<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EffectiveDateNotice;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Administration;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Staff;
use App\Http\Requests\Admin\EffectiveDateNoticeRequests\EffectiveDateNoticeRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EffectivesNoticeExport;
use PDF;

class EffectivesDateNoticeController  extends Controller
{

    protected $model;

    public function __construct(EffectiveDateNotice $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{

            $data = [
                'effectives'=> $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'Staff_names'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'sections'=>Section::select('id','name')->get(),
                'jobs'=>Job::select('id','name_job')->get(),
                'nationalitys'=>Nationality::select('id','name_nationality')->get()
            ];
            return view('admin.effectives.index',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        $data = [
            'Staff_names'=>Staff::select('id','name')->get(),
            'administrations'=>Administration::select('id','name_administration')->get(),
            'sections'=>Section::select('id','name')->get(),
            'jobs'=>Job::select('id','name_job')->get(),
            'nationalitys'=>Nationality::select('id','name_nationality')->get()
        ];
        return view('admin.effectives.create',$data);
    }

    public function store(EffectiveDateNoticeRequest $request)
    {
        try{
            // dd($request->all());
            // validation
            //create employe
            $effective = new $this->model();
            $effective->staff_id = $request->staff_id;
            $effective->job_id = $request->job_id;
            $effective->id_number = $request->id_number;
            $effective->administration_id = $request->administration_id;
            $effective->section_id = $request->section_id;
            $effective->nationality_id = $request->nationality_id;
            $effective->start_working_at = $request->start_working_at;
            $effective->save();
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
                'effective'=>$this->model->findOrFail($id),
                'Staff_names'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'sections'=>Section::select('id','name')->get(),
                'jobs'=>Job::select('id','name_job')->get(),
                'nationalitys'=>Nationality::select('id','name_nationality')->get()
            ];
            return view('admin.effectives.edit',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(EffectiveDateNoticeRequest $request, $id)
    {
        try{
            // validation
            //create employe
            $effective = $this->model->findOrFail($id);
            $effective->staff_id = $request->staff_id;
            $effective->job_id = $request->job_id;
            $effective->id_number = $request->id_number;
            $effective->administration_id = $request->administration_id;
            $effective->section_id = $request->section_id;
            $effective->nationality_id = $request->nationality_id;
            $effective->start_working_at = $request->start_working_at;
            $effective->save();
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
            $effective = $this->model->findOrFail($id);
            $effective->archive = 1;
            $effective->save();
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
            return Excel::download(new EffectivesNoticeExport, 'effectives.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $effective = $this->model->findOrFail($id);
            return view('admin.effectives.print', compact('effective'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $effectives = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.effectives.pdf', compact('effectives'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $effectives = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.effectives.pdf', compact('effectives'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('effectives.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $effectives = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $effectives = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($effectives && count($effectives) > 0){
                foreach($effectives as $effective ){
                    $effective->urlRouteEdit = route('admin/effectiveNotice/edit', $effective->id);
                    $effective->urlRouteDelete = route('admin/effectiveNotice/delete', $effective->id);
                    $effective->urlRoutePrint = route('admin/effectiveNotice/print', $effective->id);
                    $effective->urlRouteNameEmpolye = optional($effective->NameEmploye)->name;
                    $effective->urlRoutejob = optional($effective->jobEmploye)->name_job;
                    $effective->urlRoutenationality = optional($effective->nationalityEmploye)->name_nationality;
                    $effective->urlRoutesection = optional($effective->sectionEmploye)->name;
                    $effective->urlRouteadministration = optional($effective->administrationEmploye)->name_administration;
                    $data[] = $effective;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
