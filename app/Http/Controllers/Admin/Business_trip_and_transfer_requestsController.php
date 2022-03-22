<?php

namespace App\Http\Controllers\Admin;

use App\Exports\Business_trip_and_transfer_requestsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Business_trip_and_transfer_requestsRequests\business_trip_and_transfer_requestsRequests;
use App\Models\Business_trip_and_transfer_requests;
use App\Models\Business_trip_and_transfer_requests_managers;
use App\Models\Business_trip_and_transfer_requests_travel_expenses;
use App\Models\Business_trip_and_transfer_requests_travel_residence_details;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\EmployeRequests\EmployeStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class Business_trip_and_transfer_requestsController  extends Controller
{

    protected $model;

    public function __construct(Business_trip_and_transfer_requests $model)
    {
        $this->model = $model;
    }

    public function index(Request  $request)
    {
        try{
            $inputs=$request->all();
            $requests = $this->model->with(['nationalityRow','Staff'])->notArchive()->orderBy('id','DESC')->paginate(PAGINATION_COUNT);
//           dd(($requests[0]->nationalityRow));
            return view('admin.business_trip_and_transfer_requests.index', compact('inputs','requests'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
        $nationaliities=Nationality::notArchive()->orderBy('id','DESC')->get();
        return view('admin.business_trip_and_transfer_requests.create', compact('staffs','nationaliities'));
    }

    public function store(business_trip_and_transfer_requestsRequests $request)
    {

        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create request
            $requestData = new $this->model();
            $requestData->name = $request->name;
            $requestData->expensestotal_saudi_val = $request->expensestotal_saudi_val;
            $requestData->expensestotal_foreign_val = $request->expensestotal_foreign_val;
            $requestData->id_no = $request->id_no;
            $requestData->nationality = $request->nationality;
            $requestData->position = $request->position;
            $requestData->business_leave_details = $request->business_leave_details;
            $requestData->start_date = $request->start_date;
            $requestData->current_work_site = $request->current_work_site;
            $requestData->period_of_stay = $request->period_of_stay;
            $requestData->destination = $request->destination;
            $requestData->means_of_transportation = $request->means_of_transportation;
            $requestData->reasons_for_business_leave = $request->reasons_for_business_leave;
//            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'transfer_requests'); // function on helper file to upload file
                $requestData->photo = $file;
            }
            $requestData->save();

            $Travel_Residence_details_count=0;
            if (isset($request->Travel_Residence_details_date) ) {
                foreach ($request->Travel_Residence_details_date as $date) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_travel_residence_details();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->from = $request->Travel_Residence_details_from[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->to = $request->Travel_Residence_details_to[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->remarks = $request->Travel_Residence_details_remarks[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->period = $request->Travel_Residence_details_period[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->place = $request->Travel_Residence_details_place[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->visas = $request->Travel_Residence_details_visas[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->airlines = $request->Travel_Residence_details_airlines[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->date = $date;
                    $Travel_Residence_detailsData->save();
                    $Travel_Residence_details_count++;
                }
            }



            $Travel_expenses_details_count=0;
            if (isset($request->expenses_no) ) {
                foreach ($request->expenses_no as $no) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_travel_expenses();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->details = $request->expenses_details[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->amount_foreign = $request->expenses_amount_foreign[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->amount_saudi = $request->expenses_amount_saudi[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->remarks = $request->expenses_remarks[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->no = $no;
                    $Travel_Residence_detailsData->save();
                    $Travel_expenses_details_count++;
                }
            }


            $Travel_manager_details_count=0;
            if (isset($request->manager_general_manager) ) {
                foreach ($request->manager_general_manager as $manager_general_manager) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_managers();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->admin_manager = $request->manager_admin_manager[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->accounts = $request->manager_accounts[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->dept_manager = $request->manager_dept_manager[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->direct_suppervisor = $request->manager_direct_suppervisor[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->employee = $request->manager_employee[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->general_manager = $manager_general_manager;
                    $Travel_Residence_detailsData->save();
                    $Travel_manager_details_count++;
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


    public function update(business_trip_and_transfer_requestsRequests $request,$id)
    {
        try{
            $requestData =  $this->model->findOrFail($id);
            $requestData->name = $request->name;
            $requestData->expensestotal_saudi_val = $request->expensestotal_saudi_val;
            $requestData->expensestotal_foreign_val = $request->expensestotal_foreign_val;
            $requestData->id_no = $request->id_no;
            $requestData->nationality = $request->nationality;
            $requestData->position = $request->position;
            $requestData->business_leave_details = $request->business_leave_details;
            $requestData->start_date = $request->start_date;
            $requestData->current_work_site = $request->current_work_site;
            $requestData->period_of_stay = $request->period_of_stay;
            $requestData->destination = $request->destination;
            $requestData->means_of_transportation = $request->means_of_transportation;
            $requestData->reasons_for_business_leave = $request->reasons_for_business_leave;

//            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'transfer_requests'); // function on helper file to upload file
                $requestData->photo = $file;
            }
            $requestData->save();



            Business_trip_and_transfer_requests_travel_residence_details::where('request_id',$id)->delete();

            $Travel_Residence_details_count=0;
            if (isset($request->Travel_Residence_details_date) ) {
                foreach ($request->Travel_Residence_details_date as $date) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_travel_residence_details();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->from = $request->Travel_Residence_details_from[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->to = $request->Travel_Residence_details_to[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->remarks = $request->Travel_Residence_details_remarks[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->period = $request->Travel_Residence_details_period[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->place = $request->Travel_Residence_details_place[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->visas = $request->Travel_Residence_details_visas[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->airlines = $request->Travel_Residence_details_airlines[$Travel_Residence_details_count];
                    $Travel_Residence_detailsData->date = $date;
                    $Travel_Residence_detailsData->save();
                    $Travel_Residence_details_count++;
                }
            }


            Business_trip_and_transfer_requests_travel_expenses::where('request_id',$id)->delete();

            $Travel_expenses_details_count=0;
            if (isset($request->expenses_no) ) {
                foreach ($request->expenses_no as $no) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_travel_expenses();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->details = $request->expenses_details[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->amount_foreign = $request->expenses_amount_foreign[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->amount_saudi = $request->expenses_amount_saudi[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->remarks = $request->expenses_remarks[$Travel_expenses_details_count];
                    $Travel_Residence_detailsData->no = $no;
                    $Travel_Residence_detailsData->save();
                    $Travel_expenses_details_count++;
                }
            }

            Business_trip_and_transfer_requests_managers::where('request_id',$id)->delete();

            $Travel_manager_details_count=0;
            if (isset($request->manager_general_manager) ) {
                foreach ($request->manager_general_manager as $manager_general_manager) {
                    $Travel_Residence_detailsData = new Business_trip_and_transfer_requests_managers();
                    $Travel_Residence_detailsData->request_id = $requestData->id;
                    $Travel_Residence_detailsData->admin_manager = $request->manager_admin_manager[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->accounts = $request->manager_accounts[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->dept_manager = $request->manager_dept_manager[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->direct_suppervisor = $request->manager_direct_suppervisor[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->employee = $request->manager_employee[$Travel_manager_details_count];
                    $Travel_Residence_detailsData->general_manager = $manager_general_manager;
                    $Travel_Residence_detailsData->save();
                    $Travel_manager_details_count++;
                }
            }












            DB::commit();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            DB::rollback();
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $staffs=Staff::notArchive()->orderBy('id','DESC')->get();
            $nationaliities=Nationality::notArchive()->orderBy('id','DESC')->get();

            $request = $this->model->findOrFail($id)->load(['expenses','manager','residence_details']);
//            dd($request);
            return view('admin.business_trip_and_transfer_requests.edit', compact('request','staffs','nationaliities'));
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
    public function deleteresidence(Request $request)
    {

        $id = $request->get('id');
        try{
            $employe = Business_trip_and_transfer_requests_travel_residence_details::where('id',$id)->delete();

            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function deleteexpenses(Request $request)
    {

        $id = $request->get('id');
        try{
            $employe = Business_trip_and_transfer_requests_travel_expenses::where('id',$id)->delete();

            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function deletemanager(Request $request)
    {

        $id = $request->get('id');
        try{
            $employe = Business_trip_and_transfer_requests_managers::where('id',$id)->delete();

            return 'deleted';
        }catch(\Exception $ex){
            return 'error';
        }
    }
    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $Business_trip_and_transfer_requests = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $Business_trip_and_transfer_requests = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($Business_trip_and_transfer_requests && count($Business_trip_and_transfer_requests) > 0){
                foreach($Business_trip_and_transfer_requests as $employee ){
                    $employee->urlRouteDelete = route('admin/business_trip_and_transfer_requests/delete', $employee->id);
                    $employee->urlRoutePrint = route('admin/business_trip_and_transfer_requests/print', $employee->id);
                    $data[] = $employee;
                }
            }
            return $data;
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $request = $this->model->findOrFail($id);
            $onestaff = Staff::where('id',$request->name)->first();
            $onenationality = Nationality::where('id',$request->nationality)->first();
            return view('admin.business_trip_and_transfer_requests.print', compact('onenationality','request','onestaff'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }



    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new Business_trip_and_transfer_requestsExport($inputs), 'Business_trip_and_transfer_requests.xlsx');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function pdf()
    {
        try{
            $Business_trip_and_transfer_requests = $this->model->notArchive()->orderBy('id')->get();
            return view('admin.Business_trip_and_transfer_requests.pdf', compact('Business_trip_and_transfer_requests'));
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(Request $request)
    {
        try{
            $inputs = $request->all();
            $business_trip_and_transfer_requests = $this->model->with(['nationalityRow','Staff'])->notArchive()->orderBy('id')->get();
            $pdf = PDF::loadView('admin.business_trip_and_transfer_requests.pdf', compact(['business_trip_and_transfer_requests', 'inputs']));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('business_trip_and_transfer_requests.pdf');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
}
