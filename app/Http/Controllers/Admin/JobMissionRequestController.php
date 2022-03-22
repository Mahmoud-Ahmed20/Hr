<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobMissionRequest;
use App\Models\JobMissionRequestVisas;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\JobMissionRequests\JobMissiontRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MissionsExport;
use App\Models\Administration;
use App\Models\Staff;
use App\Models\Section;
use PDF;

class JobMissionRequestController  extends Controller
{

    protected $model;
    protected $visa;

    public function __construct(JobMissionRequest $model, JobMissionRequestVisas $visa)
    {
        $this->model = $model;
        $this->visa = $visa;
    }

    public function index(Request $request)
    {
        try{
            $data = [
                'Staff_names'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'missions'=>$this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'inputs'=>$request->all(),
                'sections'=>Section::select('id','name')->get()
            ];
            return view('admin.missions.index',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        $data = [
            'Staff_names'=>Staff::select('id','name')->get(),
            'sections'=>Section::select('id','name')->get(),
            'administrations'=>Administration::select('id','name_administration')->get(),
        ];
        return view('admin.missions.create',$data);
    }

    public function store(JobMissiontRequest $request)
    {
        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create employe
            $mission = new $this->model();
            $mission->location = $request->location;
            $mission->Staff_id = $request->Staff_id;
            $mission->date = $request->date;
            $mission->number = $request->number;
            $mission->job_title = $request->job_title;
            $mission->administration_id = $request->administration_id;
            $mission->section_id = $request->section_id;
            $mission->direction_of_the_mission = $request->direction_of_the_mission;
            $mission->duration_of_mission = $request->duration_of_mission;
            $mission->date_from = $request->date_from;
            $mission->date_to = $request->date_to;
            $mission->mission_specification = $request->mission_specification;
            $mission->expense_advance = $request->expense_advance;
            $mission->ticket = $request->ticket;
            $mission->save();

            $visas = $request->visas;
            foreach($visas as $vi){
                if(!$vi['name'] == null){
                    $record = new $this->visa();
                    $record->name = $vi['name'];
                    $record->job_mission_id = $mission->id;
                    $record->save();
                }
            }

            DB::commit();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $data = [
                'Staff_names'=>Staff::select('id','name')->get(),
                'administrations'=>Administration::select('id','name_administration')->get(),
                'mission'=>$this->model->findOrFail($id),
                'sections'=>Section::select('id','name')->get()
            ];
            return view('admin.missions.edit',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(JobMissiontRequest $request, $id)
    {
        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create employe
            $mission = $this->model->findOrFail($id);
            $mission->location = $request->location;
            $mission->Staff_id = $request->Staff_id;
            $mission->date = $request->date;
            $mission->number = $request->number;
            $mission->job_title = $request->job_title;
            $mission->administration_id = $request->administration_id;
            $mission->section_id = $request->section_id;
            $mission->direction_of_the_mission = $request->direction_of_the_mission;
            $mission->duration_of_mission = $request->duration_of_mission;
            $mission->date_from = $request->date_from;
            $mission->date_to = $request->date_to;
            $mission->mission_specification = $request->mission_specification;
            $mission->expense_advance = $request->expense_advance;
            $mission->ticket = $request->ticket;
            $mission->save();

            $visas = $request->visas;
            foreach($visas as $vi){
                if(!$vi['name'] == null && !$vi['id'] == null){
                    $record = $this->visa->find($vi['id']);
                    if($record){
                        $record->name = $vi['name'];
                        $record->job_mission_id = $mission->id;
                        $record->save();
                    }
                }
            }
            DB::commit();
            flash()->success("Success update");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
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

    public function exportExcel(Request $request)
    {

        try{
            $inputs = $request->all();
            return Excel::download(new MissionsExport($inputs), 'missions.xlsx');

        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function print($id)
    {
        try{
            $mission = $this->model->findOrFail($id);
            return view('admin.missions.print', compact('mission'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $missions = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.missions.pdf', compact('missions'));
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
        $inputs = $request->all();
        $missions = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
        $pdf = PDF::loadView('admin.missions.pdf', compact('missions','inputs'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('missions.pdf');
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $missions = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $missions = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($missions && count($missions) > 0){
                foreach($missions as $mission ){
                    $mission->urlRouteEdit = route('admin/missions/edit', $mission->id);
                    $mission->urlRouteDelete = route('admin/missions/delete', $mission->id);
                    $mission->urlRoutePrint = route('admin/missions/print', $mission->id);
                    $mission->urlRouteNameEmploye = optional($mission->NameEmploye)->name;
                    $mission->urlRouteAdministration = optional($mission->Administration)->name_administration;
                    $mission->urlRouteNameSections = optional($mission->NameSections)->name;

                    $data[] = $mission;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
