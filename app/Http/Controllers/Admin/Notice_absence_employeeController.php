<?php

namespace App\Http\Controllers\Admin;

use App\Exports\EmployeesExport;
use App\Exports\Notice_absence_employeeExports;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notice_absence_employeeRequests\Notice_absence_employeeRequests;
use App\Models\Job;
use App\Models\Notice_absence_employee;
use App\Models\Section;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Hash;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Validation\Rule;

class Notice_absence_employeeController  extends Controller
{

    protected $model;

    public function __construct(Notice_absence_employee $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        try{
            $data = [
                'notice_absence_employee'=>$this->model->with(['job', 'staff', 'section'])->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT),
                'staffs'=>Staff::notArchive()->orderBy('id','DESC')->get(),
                'jobs'=>Job::notArchive()->orderBy('id','DESC')->get(),
                'sections'=>Section::notArchive()->orderBy('id','DESC')->get(),
                            'inputs'=>$request->all(),
];
            return view('admin.notice_absence_employee.index', $data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {

        $data = [
            'staffs'=>Staff::notArchive()->orderBy('id','DESC')->get(),
            'jobs'=>Job::notArchive()->orderBy('id','DESC')->get(),
            'sections'=>Section::notArchive()->orderBy('id','DESC')->get()
        ];

        return view('admin.notice_absence_employee.create', $data);
    }

    public function store(Notice_absence_employeeRequests $request)
    {

        try{
            // validation
            // db transaction
            //create request
            $notice_absence_employeeData = new $this->model();
            $notice_absence_employeeData->staff_number = $request->staff_number;
            $notice_absence_employeeData->section_id = $request->section_id;
            $notice_absence_employeeData->staff_id = $request->staff_id;
            $notice_absence_employeeData->job_id = $request->job_id;
            $notice_absence_employeeData->date = $request->date;

            $notice_absence_employeeData->save();

            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function update(Notice_absence_employeeRequests $request,$id)
    {
        try{
            $notice_absence_employeeData =  $this->model->findOrFail($id);



            $notice_absence_employeeData->staff_number = $request->staff_number;
            $notice_absence_employeeData->section_id = $request->section_id;
            $notice_absence_employeeData->staff_id = $request->staff_id;
            $notice_absence_employeeData->job_id = $request->job_id;
            $notice_absence_employeeData->date = $request->date;

            $notice_absence_employeeData->save();




            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $current_data = $this->model->findOrFail($id)->load(['job','staff','section']);
            $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
            $jobs=Job::notArchive()->orderBy('id','DESC')->get();
            $sections=Section::notArchive()->orderBy('id','DESC')->get();

            return view('admin.notice_absence_employee.edit', compact('current_data','staffs','jobs','sections'));
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
                $employees = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get()->load(['job','staff','section']);
            }else{
                $employees = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get()->load(['job','staff','section']);
            }
            $data = [];
            if($employees && count($employees) > 0){
                foreach($employees as $employee ){
                    $employee->urlRouteDelete = route('admin/notice_absence_employee/delete', $employee->id);
                    $employee->urlRoutePrint= route('admin/notice_absence_employee/print', $employee->id);
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
            $current_data = $this->model->findOrFail($id);
            return view('admin.notice_absence_employee.print', compact('current_data'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }


    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new Notice_absence_employeeExports($inputs) ,'notice_absence_employee.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {

        try{
            $notices = $this->model->with(['job', 'staff', 'section'])->notArchive()->get();
            $pdf = PDF::loadView('admin.notice_absence_employee.pdf',compact('notices'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('notices.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }


}
