<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BackToWork;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\BackToWorkRequests\BackToWorkRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BacksExport;
use App\Models\Staff;
use PDF;

class BackToWorkController  extends Controller
{

    protected $model;

    public function __construct(BackToWork $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{
           
            $data = [
                'backs'=> $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'Staff_names'=> Staff::select('id','name')->get()
            ];
            return view('admin.backs.index',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        $Staff_names = Staff::select('id','name')->get();
        return view('admin.backs.create',compact('Staff_names'));
    }

    public function store(BackToWorkRequest $request)
    {
        try{
            // validation 
            //create employe
            $back = new $this->model();
            $back->date = $request->date;
            $back->Staff_id = $request->Staff_id;
            $back->job_number = $request->job_number; 
            $back->job_title = $request->job_title; 
            $back->reason_for_leave = $request->reason_for_leave; 
            $back->first_day_off = $request->first_day_off;
            $back->last_date_off = $request->last_date_off;
            $back->date_word_resumed = $request->date_word_resumed;
            $back->no_of_actual_vacation_days = $request->no_of_actual_vacation_days;
            $back->hr_total_no_actual_vacation_days = $request->hr_total_no_actual_vacation_days;
            $back->hr_difference_between_vacation_days = $request->hr_difference_between_vacation_days;
            $back->save();

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
                'back'=>$this->model->findOrFail($id),
                'Staff_names'=>Staff::select('id','name')->get()
            ];
          
            return view('admin.backs.edit',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(BackToWorkRequest $request, $id)
    {
        try{
            // validation 
            //create employe
            $back = $this->model->findOrFail($id);
            $back->date = $request->date;
            $back->Staff_id = $request->Staff_id;
            $back->job_number = $request->job_number; 
            $back->job_title = $request->job_title; 
            $back->reason_for_leave = $request->reason_for_leave; 
            $back->first_day_off = $request->first_day_off;
            $back->last_date_off = $request->last_date_off;
            $back->date_word_resumed = $request->date_word_resumed;
            $back->no_of_actual_vacation_days = $request->no_of_actual_vacation_days;
            $back->hr_total_no_actual_vacation_days = $request->hr_total_no_actual_vacation_days;
            $back->hr_difference_between_vacation_days = $request->hr_difference_between_vacation_days;
            $back->save();

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
            $back = $this->model->findOrFail($id);
            $back->archive = 1;
            $back->save();
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
            return Excel::download(new BacksExport, 'backToWrok.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $back = $this->model->findOrFail($id);
            return view('admin.backs.print', compact('back'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $backs = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.backs.pdf', compact('backs'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $backs = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.backs.pdf', compact('backs'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('backs.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    
    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $backs = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $backs = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($backs && count($backs) > 0){
                foreach($backs as $back ){
                    $back->urlRouteEdit = route('admin/backs/edit', $back->id);
                    $back->urlRouteDelete = route('admin/backs/delete', $back->id);
                    $back->urlRoutePrint = route('admin/backs/print', $back->id);
                    $back->urlRouteNameEmploy = optional($back->NameEmployeBackToWork)->name;
                    $data[] = $back;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}