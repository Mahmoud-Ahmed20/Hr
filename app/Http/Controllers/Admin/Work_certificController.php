<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Notice_absence_employeeExports;
use App\Exports\Work_certificExports;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Work_certificRequests\Work_certificRequests;
use App\Models\Work_certific;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use DB;
use Hash;
use Illuminate\Validation\Rule;

class Work_certificController  extends Controller
{

    protected $model;

    public function __construct(Work_certific $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $data['work_certific'] = $this->model->with(['staff'])->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
//           dd($data['work_certific'][0]);
           $data['staffs'] = Staff::notArchive()->select('id','name')->get();
            $data['inputs'] = $request->all();
            return view('admin.work_certific.index', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        $data['staffs'] = Staff::notArchive()->select('id','name')->get();
        return view('admin.work_certific.create', $data);
    }

    public function store(Work_certificRequests $request)
    {

        try{
            // validation
            // db transaction
            //create work_certific
            $staffAction = new $this->model();
            $staffAction->staff_id = $request->staff_id;
            $staffAction->date = $request->date;
            $staffAction->job_title = $request->job_title;
            $staffAction->start_work = $request->start_work;
            $staffAction->end_work = $request->end_work;
            $staffAction->save();


            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function update(Work_certificRequests $request,$id)
    {
        try{
            $staffAction =  $this->model->findOrFail($id);
            $staffAction->staff_id = $request->staff_id;
            $staffAction->date = $request->date;
            $staffAction->job_title = $request->job_title;
            $staffAction->start_work = $request->start_work;
            $staffAction->end_work = $request->end_work;
            $staffAction->save();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {

        try{
            $data['current_data'] = $this->model->findOrFail($id);
            $data['staffs'] = Staff::notArchive()->select('id','name')->get();
            return view('admin.work_certific.edit', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $work_certific = $this->model->findOrFail($id);
            $work_certific->archive = 1;
            $work_certific->save();


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
                $work_certific = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $work_certific = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($work_certific && count($work_certific) > 0){
                foreach($work_certific as $staffServiceAction ){
                    $staffServiceAction->urlRouteDelete = route('admin/work_certific/delete', $staffServiceAction->id);
                    $staffServiceAction->urlRoutePrint = route('admin/work_certific/print', $staffServiceAction->id);
                    $staffServiceAction->staffName = ($staffServiceAction->staff)?$staffServiceAction->staff->name : '';
                    $data[] = $staffServiceAction;
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
            $current_data = $this->model->findOrFail($id);
            return view('admin.work_certific.print', compact('current_data'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new Work_certificExports($inputs) ,'work_certific.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {
        try{
            $work_certific = $this->model->with(['staff'])->notArchive()->orderBy('id')->get();
            $pdf = PDF::loadView('admin.work_certific.pdf',compact('work_certific'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('work_certific.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
}
