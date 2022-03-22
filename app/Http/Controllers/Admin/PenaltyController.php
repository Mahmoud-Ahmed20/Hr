<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PenaltyProcedures;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\PenaltysRequests\PenaltysStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PenaltysExport;
use App\Models\Staff;
use App\Models\Administration;
use App\Models\Section;
use PDF;

class PenaltyController  extends Controller
{

    protected $model;

    public function __construct(PenaltyProcedures $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $data = [
                'penaltys'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'Staff_names'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'sections'=>Sections::select('id','name')->get(),
                'inputs'=>$request->all()
            ];
            return view('admin.penaltys.index', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }
    public function create()
    {
        $data = [
            'staffs'=>Staff::select('id','name')->get(),
            'administrations'=>Administration::select('id','name_administration')->get(),
            'sections'=>Sections::select('id','name')->get(),
            'sections'=>Section::select('id','name')->get()


        ];
        return view('admin.penaltys.create',$data);
    }

    public function store(PenaltysStoreRequest $request)
    {
        try{
            // validation
            //create employe
            $penalty = new $this->model();
            $penalty->staff_id = $request->staff_id;
            $penalty->section_id = $request->section_id;
            $penalty->number = $request->number;
            $penalty->joining_date = $request->joining_date;
            $penalty->administration_id = $request->administration_id;
            $penalty->job_title = $request->job_title;
            $penalty->last_penalty = $request->last_penalty;
            $penalty->subject = $request->subject;
            $penalty->draw_attention = $request->draw_attention;
            $penalty->penalty = $request->penalty;
            $penalty->deduction = $request->deduction;
            $penalty->written_warning_by_fired = $request->written_warning_by_fired;
            $penalty->others = $request->others;
            $penalty->stopping_from_work_for = $request->stopping_from_work_for;
            $penalty->stopping_the_yearly_increase = $request->stopping_the_yearly_increase;
            $penalty->firing_with_a_bying = $request->firing_with_a_bying;
            $penalty->firing_without_a_bying = $request->firing_without_a_bying;
            $penalty->save();
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
                'penalty'=>$this->model->findOrFail($id),
                'staffs'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'sections'=>Section::select('id','name')->get()

            ];
            return view('admin.penaltys.edit',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(PenaltysStoreRequest $request, $id)
    {
        try{
            // validation
            //create employe
            $penalty = $this->model->findOrFail($id);
            $penalty->staff_id = $request->staff_id;
            $penalty->section_id = $request->section_id;
            $penalty->number = $request->number;
            $penalty->joining_date = $request->joining_date;
            $penalty->administration_id = $request->administration_id;
            $penalty->job_title = $request->job_title;
            $penalty->last_penalty = $request->last_penalty;
            $penalty->subject = $request->subject;
            $penalty->draw_attention = $request->draw_attention;
            $penalty->penalty = $request->penalty;
            $penalty->deduction = $request->deduction;
            $penalty->written_warning_by_fired = $request->written_warning_by_fired;
            $penalty->others = $request->others;
            $penalty->stopping_from_work_for = $request->stopping_from_work_for;
            $penalty->stopping_the_yearly_increase = $request->stopping_the_yearly_increase;
            $penalty->firing_with_a_bying = $request->firing_with_a_bying;
            $penalty->firing_without_a_bying = $request->firing_without_a_bying;
            $penalty->save();
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
            $penalty = $this->model->findOrFail($id);
            $penalty->archive = 1;
            $penalty->save();
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
            return Excel::download(new PenaltysExport, 'penaltys.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $penalty = $this->model->findOrFail($id);
            return view('admin.penaltys.print', compact('penalty'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $penaltys = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.penaltys.pdf', compact('penaltys'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(Request $request)
    {
        // try{

        // }catch(\Exception $ex){
        //     flash()->error("There Is Something Wrong , Please Contact Technical Support");
        //     return back();
        // }
        $date =[
            'penaltys'=>$this->model->orderBy('id')->paginate(PAGINATION_COUNT),
            'inputs'=>$request->all()
        ];
        $pdf = PDF::loadView('admin.penaltys.pdf', compact('date'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('penaltys.pdf');
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $penaltys = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $penaltys = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($penaltys && count($penaltys) > 0){
                foreach($penaltys as $penalty ){
                    $penalty->urlRouteEdit = route('admin/penaltys/edit', $penalty->id);
                    $penalty->urlRouteDelete = route('admin/penaltys/delete', $penalty->id);
                    $penalty->urlRoutePrint = route('admin/penaltys/print', $penalty->id);
                    $penalty->staffName = optional($penalty->staff)->name;
                    $penalty->sectionName = optional($penalty->section)->name;
                    $penalty->administrationName = optional($penalty->administration)->name_administration;
                    $data[] = $penalty;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
            return response()->json([ 'error' => "There Is Something Wrong , Please Contact Technical Support"]);
        }
    }

}
