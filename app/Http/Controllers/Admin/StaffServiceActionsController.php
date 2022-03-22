<?php

namespace App\Http\Controllers\Admin;

use App\Exports\staffsActionsExports;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\staffServiceActionsRequests\staffServiceActionsRequests;
use App\Models\Section;
use App\Models\Staff;
use App\Models\StaffServiceActions;
use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Hash;
use PDF;

use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class StaffServiceActionsController  extends Controller
{

    protected $model;

    public function __construct(StaffServiceActions $model)
    {
        $this->model = $model;
    }

    public function index(Request  $request)
    {
        try{
            $data = [
                'staffsActions'=>$this->model->with(['section','Staff','job'])->notArchive()->orderBy('id','DESC')->paginate(PAGINATION_COUNT),
                'inputs'=>$request->all(),
            ];
            return view('admin.staffServiceActions.index',$data);
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {

        $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
        $jobs=Job::notArchive()->orderBy('id','DESC')->get();
        $sections=Section::notArchive()->orderBy('id','DESC')->get();
        return view('admin.staffServiceActions.create', compact('staffs','jobs','sections'));
    }

    public function store(staffServiceActionsRequests $request)
    {

        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create staffServiceActions
            $staffAction = new $this->model();
            $staffAction->employee_status = $request->employee_status;
            $staffAction->employee_special_work = $request->employee_special_work;
            $staffAction->he_has = $request->he_has;
            $staffAction->manager_confirm = $request->manager_confirm;
            $staffAction->equipment_reciver = $request->equipment_reciver;
            $staffAction->move_department = $request->move_department;
            $staffAction->debit_balance = $request->debit_balance;
            $staffAction->company_data = $request->company_data;
            $staffAction->finish_donot_have_covenant = $request->finish_donot_have_covenant;
            $staffAction->balance = $request->balance;
            $staffAction->bank_signature_status = $request->bank_signature_status;
            $staffAction->balance_status = $request->balance_status;
            $staffAction->financial_covenant_value = $request->financial_covenant_value;
            $staffAction->financial_covenant_status = $request->financial_covenant_status;
            $staffAction->code_numbers_note = $request->code_numbers_note;
            $staffAction->accreditation_Administrative_Affairs = $request->accreditation_Administrative_Affairs;
            $staffAction->operation_done = $request->operation_done;
            $staffAction->receipt_covenant = $request->receipt_covenant;
            $staffAction->approval_direct_manager = $request->approval_direct_manager;
            $staffAction->document_type = $request->document_type;
            $staffAction->staff_id = $request->staff_id;
            $staffAction->section_id = $request->section_id;
            $staffAction->job_number = $request->job_number;
            $staffAction->work_address = $request->work_address;
            $staffAction->action_type = $request->action_type;
            $staffAction->to_staff_id = $request->to_staff_id;
            $staffAction->job_id = $request->job_id;
            $staffAction->save();


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
            $StaffServiceActions = $this->model->findOrFail($id);
            if($StaffServiceActions->is_activate == 1){
                $StaffServiceActions->update(['is_activate' => 0]);
            }else{
                $StaffServiceActions->update(['is_activate' => 1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong ,  Please Contact Technical Support");
            return back();
        }

    }
    public function update(staffServiceActionsRequests $request,$id)
    {
        try{
            $staffAction =  $this->model->findOrFail($id);

//dd($request->all());
            $staffAction->employee_status = $request->employee_status;
            $staffAction->employee_special_work = $request->employee_special_work;
            $staffAction->he_has = $request->he_has;
            $staffAction->manager_confirm = $request->manager_confirm;
            $staffAction->equipment_reciver = $request->equipment_reciver;
            $staffAction->move_department = $request->move_department;
            $staffAction->debit_balance = $request->debit_balance;
            $staffAction->company_data = $request->company_data;
            $staffAction->finish_donot_have_covenant = $request->finish_donot_have_covenant;
            $staffAction->balance = $request->balance;
            $staffAction->bank_signature_status = $request->bank_signature_status;
            $staffAction->balance_status = $request->balance_status;
            $staffAction->financial_covenant_value = $request->financial_covenant_value;
            $staffAction->financial_covenant_status = $request->financial_covenant_status;
            $staffAction->code_numbers_note = $request->code_numbers_note;
            $staffAction->accreditation_Administrative_Affairs = $request->accreditation_Administrative_Affairs;
            $staffAction->operation_done = $request->operation_done;
            $staffAction->receipt_covenant = $request->receipt_covenant;
            $staffAction->approval_direct_manager = $request->approval_direct_manager;
            $staffAction->document_type = $request->document_type;
            $staffAction->staff_id = $request->staff_id;
            $staffAction->section_id = $request->section_id;
            $staffAction->job_number = $request->job_number;
            $staffAction->work_address = $request->work_address;
            $staffAction->action_type = $request->action_type;
            $staffAction->to_staff_id = $request->to_staff_id;
            $staffAction->job_id = $request->job_id;
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


            $staffServiceAction = $this->model->findOrFail($id);
            $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
            $jobs=Job::notArchive()->orderBy('id','DESC')->get();
            $sections=Section::notArchive()->orderBy('id','DESC')->get();

            return view('admin.staffServiceActions.edit', compact('staffServiceAction' ,'staffs','jobs','sections'));

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
            return $ex;
            return back();
        }
    }
    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $staffServiceActions = $this->model->with(['staff','job'])->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $staffServiceActions = $this->model->with(['staff','job'])->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($staffServiceActions && count($staffServiceActions) > 0){
                foreach($staffServiceActions as $staffServiceAction ){
                    $staffServiceAction->urlRouteDelete = route('admin/staffServiceActions/delete', $staffServiceAction->id);
                    $staffServiceAction->urlRoutePrint = route('admin/staffServiceActions/print', $staffServiceAction->id);
                    $staffServiceAction->urlRoutesectionName = $staffServiceAction->section->name;

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
            $staff = $this->model->findOrFail($id);
            return view('admin.staffServiceActions.print', compact('staff'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }



    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new StaffsActionsExports($inputs) ,'staffsActions.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {
        try{
            $staffServiceActions = $this->model->with(['section','Staff','job'])->notArchive()->orderBy('id')->get();
            $pdf = PDF::loadView('admin.staffServiceActions.pdf',compact('staffServiceActions'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('staffServiceActions.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
}
