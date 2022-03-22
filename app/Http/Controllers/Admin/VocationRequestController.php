<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VocationRequest;
use App\Models\VacationRequestRequiredService;
use App\Models\VacationRequestPersons;
use App\Models\VacationRequestHumanResources;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\VocationRequestRequests\VocationRequestStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VocationsExport;
use PDF;

class VocationRequestController  extends Controller
{

    protected $model;
    protected $requiredService;
    protected $persons;
    protected $humanResources;

    public function __construct(VocationRequest $model, VacationRequestRequiredService $requiredService,
                                VacationRequestPersons $persons, VacationRequestHumanResources $humanResources)
    {
        $this->model = $model;
        $this->requiredService = $requiredService;
        $this->persons = $persons;
        $this->humanResources = $humanResources;
    }

    public function index()
    {
        try{
            $vacations = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.vacations.index', compact('vacations'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.vacations.create');
    }

    public function store(VocationRequestStoreRequest $request)
    {
        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create vacation
            $vacation = new $this->model();
            $vacation->request_date = $request->request_date;
            $vacation->Staff_id = $request->Staff_id;
            $vacation->job_title = $request->job_title;
            $vacation->job_number = $request->job_number;
            $vacation->reason_for_leave = $request->reason_for_leave;
            $vacation->first_day_off = $request->first_day_off;
            $vacation->last_date_off = $request->last_date_off;
            $vacation->address_in_vacation = $request->address_in_vacation;
            $vacation->phone = $request->phone;
            $vacation->save();

            $service = new $this->requiredService();
            $service->exit_and_return_visa = $request->exit_and_return_visa;
            $service->country_visa = $request->country_visa;
            $service->ticket_reservation = $request->ticket_reservation;
            $service->ticket_reimbursement = $request->ticket_reimbursement;
            $service->notes_one = $request->notes_one;
            $service->date_travel = $request->date_travel;
            $service->air_line = $request->air_line;
            $service->line = $request->line;
            $service->vacation_id = $vacation->id;
            $service->save();

            $employeFamily = $request->persons;
            foreach($employeFamily as $per){
                if(!$per['name'] == null && !$per['age'] == null ){
                    $person = new $this->persons();
                    $person->person_id = $per['person_id'];
                    $person->name = $per['name'];
                    $person->age = $per['age'];
                    $person->vacation_id = $vacation->id;
                    $person->save();
                }
            }

            $humanResource = new $this->humanResources();
            $humanResource->previous_return_date = $request->previous_return_date;
            $humanResource->paid_leave = $request->paid_leave;
            $humanResource->unpaid_leave = $request->unpaid_leave;
            $humanResource->notes_tow = $request->notes_tow;
            $humanResource->unpaid_leave_per_year = $request->unpaid_leave_per_year;
            $humanResource->holidays = $request->holidays;
            $humanResource->is_the_passport_valid = $request->is_the_passport_valid;
            $humanResource->cover_the_duration_of_the_visa = $request->cover_the_duration_of_the_visa;
            $humanResource->is_the_residence_permit_valid = $request->is_the_residence_permit_valid;
            $humanResource->vacation_id = $vacation->id;
            $humanResource->save();
            DB::commit();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return redirect()->back()->with('exampleModal', 1);
        }
    }

    public function edit($id)
    {
        try{
            $vacation = $this->model->findOrFail($id);
            return view('admin.vacations.edit',compact('vacation'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(VocationRequestStoreRequest $request, $id)
    {
        try{
            // validation
            // db transaction
            DB::beginTransaction();
            //create vacation
            $vacation = $this->model->findOrFail($id);
            $vacation->request_date = $request->request_date;
            $vacation->Staff_id = $request->Staff_id;
            $vacation->job_title = $request->job_title;
            $vacation->job_number = $request->job_number;
            $vacation->reason_for_leave = $request->reason_for_leave;
            $vacation->first_day_off = $request->first_day_off;
            $vacation->last_date_off = $request->last_date_off;
            $vacation->address_in_vacation = $request->address_in_vacation;
            $vacation->phone = $request->phone;
            $vacation->save();

            $service = $vacation->required_service()->first();
            $service->exit_and_return_visa = $request->exit_and_return_visa;
            $service->country_visa = $request->country_visa;
            $service->ticket_reservation = $request->ticket_reservation;
            $service->ticket_reimbursement = $request->ticket_reimbursement;
            $service->notes_one = $request->notes_one;
            $service->date_travel = $request->date_travel;
            $service->air_line = $request->air_line;
            $service->line = $request->line;
            $service->save();

            $employeFamily = $request->persons;
            foreach($employeFamily as $per){
                if(!$per['name'] == null && !$per['age'] == null ){
                    if($person = $vacation->persons()->where('person_id', (int)$per['person_id'])->first()){
                        $person->name = $per['name'];
                        $person->age = $per['age'];
                        $person->save();
                    }else{
                        $person = new $this->persons();
                        $person->person_id = $per['person_id'];
                        $person->name = $per['name'];
                        $person->age = $per['age'];
                        $person->vacation_id = $vacation->id;
                        $person->save();
                    }
                }
            }

            $humanResource = $vacation->human_resources()->first();
            $humanResource->previous_return_date = $request->previous_return_date;
            $humanResource->paid_leave = $request->paid_leave;
            $humanResource->unpaid_leave = $request->unpaid_leave;
            $humanResource->notes_tow = $request->notes_tow;
            $humanResource->unpaid_leave_per_year = $request->unpaid_leave_per_year;
            $humanResource->holidays = $request->holidays;
            $humanResource->is_the_passport_valid = $request->is_the_passport_valid;
            $humanResource->cover_the_duration_of_the_visa = $request->cover_the_duration_of_the_visa;
            $humanResource->is_the_residence_permit_valid = $request->is_the_residence_permit_valid;
            $humanResource->save();
            DB::commit();
            flash()->success("Success Add");
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
            $vacation = $this->model->findOrFail($id);
            $vacation->archive = 1;
            $vacation->save();
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
                $vacations = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $vacations = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($vacations && count($vacations) > 0){
                foreach($vacations as $vacation ){
                    $vacation->required_service = $vacation->required_service()->first();
                    $vacation->persons = $vacation->persons()->get();
                    $vacation->human_resources = $vacation->human_resources()->first();
                    $vacation->urlRouteUpdate = route('admin/vacations/edit', $vacation->id);
                    $vacation->urlRouteDelete = route('admin/vacations/delete', $vacation->id);
                    $vacation->urlRoutePrint = route('admin/vacations/print', $vacation->id);
                    $vacation->urlRouteNameEmploye =optional( $vacation->NameEmploye)->name ;

                    $data[] = $vacation;
                }
            }
            return $data;
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportExcel()
    {
        try{
            return Excel::download(new VocationsExport, 'vacations.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $vacations = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.vacations.pdf', compact('vacations'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('vacations.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $vacation = $this->model->findOrFail($id);
            return view('admin.vacations.print', compact('vacation'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
