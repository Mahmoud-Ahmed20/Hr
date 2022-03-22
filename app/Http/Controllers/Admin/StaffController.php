<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\StaffDrivingLicence;
use App\Models\StaffLastJob;
use App\Models\StaffLastQualification;
use App\Models\StaffSalary;
use App\Models\StaffId;
use DB;
use Illuminate\Validation\Rule;
use App\Models\Job;
use App\Models\Nationality;
use App\Http\Requests\Admin\StaffsRequests\StaffsStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StaffsExport;
use App\Models\Section;
use PDF;

class StaffController  extends Controller
{

    protected $model;
    protected $staffDrivingLicence;
    protected $staffLastJob;
    protected $staffLastQualification;
    protected $staffSalary;
    protected $staffId;

    public function __construct(Staff $model, StaffDrivingLicence $staffDrivingLicence, StaffLastJob $staffLastJob,
                                StaffLastQualification $staffLastQualification, StaffSalary $staffSalary, StaffId $staffId)
    {
        $this->model = $model;
        $this->staffDrivingLicence = $staffDrivingLicence;
        $this->staffLastJob = $staffLastJob;
        $this->staffLastQualification = $staffLastQualification;
        $this->staffSalary = $staffSalary;
        $this->staffId = $staffId;
    }

    public function index(Request $request)
    {
        try{
            $data = [
                'staffs'=> $this->model->notArchive()->orderBy('id')
                ->when($request->card_id || $request->place_of_issue || $request->place_of_issue, function($query){
                    $query->with(['cardId' => function ($c){
                        $c->get();
                    }]);
                })
                ->when($request->number || $request->category || $request->blood_group || $request->date_of_issue_driving || $request->expiry_date || $request->place_of_issue_driving, function($query){
                    $query->with(['drivingLicence' => function ($d){
                        $d->get();
                    }]);
                })
                ->when($request->qualification || $request->place_name || $request->specialize || $request->country || $request->city || $request->from_qualification || $request->to_qualification, function($query){
                    $query->with(['qualification' => function ($q){
                        $q->get();
                    }]);
                })
                ->when($request->bisic_salary || $request->allowance || $request->company_name || $request->phone || $request->address || $request->reason_for_leaving || $request->description_for_your_duties, function($query){
                    $query->with(['lastJob' => function ($j){
                        $j->get();
                    }]);
                })->paginate(PAGINATION_COUNT),
                'inputs'=>$request->all(),
            ];

            return view('admin.staffs.index',$data);
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.staffs.create');
    }

    public function store(StaffsStoreRequest $request)
    {
        try{
            // dd($request->all());
            // validation
            // db transaction
            DB::beginTransaction();
            // create employe
            $staff = new $this->model();
            $staff->name = $request->name;
            $staff->id_number = $request->id_number;
            $staff->job_id = $request->job_id;
            $staff->section_id = $request->section_id;
            $staff->nationality_id = $request->nationality_id;
            $staff->date_of_birth = $request->date_of_birth;
            $staff->religion = $request->religion;
            $staff->marital_status = $request->marital_status;
            $staff->present_adderss = $request->present_adderss;
            $staff->post = $request->post;
            $staff->mobile = $request->mobile;
            $staff->home_phone = $request->home_phone;
            $staff->salary_system = $request->salary_system;
            $staff->have_you_any_dependents = $request->have_you_any_dependents;
            $staff->dependents_address = $request->dependents_address;
            $staff->save();

            $card = new $this->staffId();
            $card->card_id = $request->card_id;
            $card->place_of_issue = $request->card_place_of_issue;
            $card->date_of_issue = $request->card_date_of_issue;
            $card->staff_id = $staff->id;
            $card->save();

            $drivingLicence = new $this->staffDrivingLicence();
            $drivingLicence->category = $request->category;
            $drivingLicence->number = $request->number;
            $drivingLicence->date_of_issue = $request->date_of_issue;
            $drivingLicence->place_of_issue = $request->place_of_issue;
            $drivingLicence->expiry_date = $request->expiry_date;
            $drivingLicence->blood_group = $request->blood_group;
            $drivingLicence->staff_id = $staff->id;
            $drivingLicence->save();

            $lastJob = new $this->staffLastJob();
            $lastJob->from = $request->from;
            $lastJob->to = $request->to;
            $lastJob->job_title = $request->job_title_last_job;
            $lastJob->bisic_salary = $request->bisic_salary;
            $lastJob->allowance = $request->allowance;
            $lastJob->company_name = $request->company_name;
            $lastJob->reason_for_leaving = $request->reason_for_leaving;
            $lastJob->description_for_your_duties = $request->description_for_your_duties;
            $lastJob->address = $request->address;
            $lastJob->phone = $request->phone;
            $lastJob->staff_id = $staff->id;
            $lastJob->save();

            $lastQualification = new $this->staffLastQualification();
            $lastQualification->qualification = $request->qualification;
            $lastQualification->place_name = $request->place_name;
            $lastQualification->country = $request->country;
            $lastQualification->city = $request->city;
            $lastQualification->from = $request->from_qualification;
            $lastQualification->to = $request->to_qualification;
            $lastQualification->specialize = $request->specialize;
            $lastQualification->staff_id = $staff->id;
            $lastQualification->save();

            $salaries = $request->salaries;
            foreach($salaries as $row){
                $salary = new $this->staffSalary();
                $salary->salary = $row['salary'];
                $salary->type = $row['type'];
                $salary->current_housing = $row['current_housing'];
                $salary->current_transportation = $row['current_transportation'];
                $salary->other_allowances = $row['other_allowances'];
                $salary->staff_id = $staff->id;
                $salary->save();
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
            $staff = $this->model->findOrFail($id);
            return view('admin.staffs.edit',compact('staff'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(StaffsStoreRequest $request, $id)
    {
        try{
            // dd($request->all());
            // validation
            // db transaction
            DB::beginTransaction();
            //create employe
            $staff = $this->model->findOrFail($id);
            if(!$staff == null){
                $staff->name = $request->name;
                $staff->id_number = $request->id_number;
                $staff->job_id = $request->job_id;
                $staff->section_id = $request->section_id;
                $staff->nationality_id = $request->nationality_id;
                $staff->date_of_birth = $request->date_of_birth;
                $staff->religion = $request->religion;
                $staff->marital_status = $request->marital_status;
                $staff->present_adderss = $request->present_adderss;
                $staff->post = $request->post;
                $staff->mobile = $request->mobile;
                $staff->home_phone = $request->home_phone;
                $staff->salary_system = $request->salary_system;
                $staff->have_you_any_dependents = $request->have_you_any_dependents;
                $staff->dependents_address = $request->dependents_address;
                $staff->save();

                $card = $this->staffId->findOrFail($request->cardRow_id);
                if(!$card == null){
                    $card->card_id = $request->card_id;
                    $card->place_of_issue = $request->card_place_of_issue;
                    $card->date_of_issue = $request->card_date_of_issue;
                    $card->staff_id = $staff->id;
                    $card->save();
                }

                $drivingLicence = $this->staffDrivingLicence->findOrFail($request->drivingLicence_id);
                if(!$drivingLicence == null){
                    $drivingLicence->category = $request->category;
                    $drivingLicence->number = $request->number;
                    $drivingLicence->date_of_issue = $request->date_of_issue;
                    $drivingLicence->place_of_issue = $request->place_of_issue;
                    $drivingLicence->expiry_date = $request->expiry_date;
                    $drivingLicence->blood_group = $request->blood_group;
                    $drivingLicence->staff_id = $staff->id;
                    $drivingLicence->save();
                }

                $lastJob = $this->staffLastJob->findOrFail($request->lastJob_id);
                if(!$lastJob == null){
                    $lastJob->from = $request->from;
                    $lastJob->to = $request->to;
                    $lastJob->job_title = $request->job_title_last_job;
                    $lastJob->bisic_salary = $request->bisic_salary;
                    $lastJob->allowance = $request->allowance;
                    $lastJob->company_name = $request->company_name;
                    $lastJob->reason_for_leaving = $request->reason_for_leaving;
                    $lastJob->description_for_your_duties = $request->description_for_your_duties;
                    $lastJob->address = $request->address;
                    $lastJob->phone = $request->phone;
                    $lastJob->staff_id = $staff->id;
                    $lastJob->save();
                }

                $lastQualification = $this->staffLastQualification->findOrFail($request->qualification_id);
                if(!$lastQualification == null){
                    $lastQualification->qualification = $request->qualification;
                    $lastQualification->place_name = $request->place_name;
                    $lastQualification->country = $request->country;
                    $lastQualification->city = $request->city;
                    $lastQualification->from = $request->from_qualification;
                    $lastQualification->to = $request->to_qualification;
                    $lastQualification->specialize = $request->specialize;
                    $lastQualification->staff_id = $staff->id;
                    $lastQualification->save();
                }

                $salaries = $request->salaries;
                foreach($salaries as $row){
                    $salary = $this->staffSalary->findOrFail($row['salary_id']);
                    if(!$salary == null){
                        $salary->salary = $row['salary'];
                        $salary->current_housing = $row['current_housing'];
                        $salary->current_transportation = $row['current_transportation'];
                        $salary->other_allowances = $row['other_allowances'];
                        $salary->staff_id = $staff->id;
                        $salary->save();
                    }
                }
                DB::commit();
                flash()->success("Success update");
                return back();
            }else{
                flash()->error("Not Found , please Contact Technical Support");
                return back();
            }
        }catch(\Exception $ex){
            DB::rollback();
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $staff = $this->model->findOrFail($id);
            $staff->archive = 1;
            $staff->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function search(Request $request)
    {
        try{
            $query = $request->get('query');
            if($query != ''){
                $staffs = $this->model->where('id', 'LIKE', '%'. $query .'%')
                                        ->orWhere('name', 'LIKE', '%'. $query .'%')
                                        ->notArchive()->get();            
            }else{
                $staffs = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($staffs) && count($staffs) > 0){
                foreach($staffs as $staff ){
                    $staff->urlRouteEdit = route('admin/staffs/edit', $staff->id);
                    $staff->urlRouteDelete = route('admin/staffs/delete', $staff->id);
                    $staff->urlRoutePrint = route('admin/staffs/print', $staff->id);
                    if( $query != '' ){
                        $staff->searchButton = 0;
                    }else{
                        $staff->searchButton = 1;
                    }
                    $data[] = $staff;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new StaffsExport($inputs), 'staffs.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $staff = $this->model->findOrFail($id);
            return view('admin.staffs.print', compact('staff'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $staffs = $this->model->all();
            return view('admin.staffs.pdf', compact('staffs'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(Request $request)
    {
        try{
            $inputs = $request->all();
            $staffs = $this->model->orderBy('id')
                        ->when($request->card_id || $request->place_of_issue || $request->place_of_issue, function($query){
                            $query->with(['cardId' => function ($c){
                                $c->get();
                            }]);
                        })
                        ->when($request->number || $request->category || $request->blood_group || $request->date_of_issue_driving || $request->expiry_date || $request->place_of_issue_driving, function($query){
                            $query->with(['drivingLicence' => function ($d){
                                $d->get();
                            }]);
                        })
                        ->when($request->qualification || $request->place_name || $request->specialize || $request->country || $request->city || $request->from_qualification || $request->to_qualification, function($query){
                            $query->with(['qualification' => function ($q){
                                $q->get();
                            }]);
                        })
                        ->when($request->bisic_salary || $request->allowance || $request->company_name || $request->phone || $request->address || $request->reason_for_leaving || $request->description_for_your_duties, function($query){
                            $query->with(['lastJob' => function ($j){
                                $j->get();
                            }]);
                        })->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.staffs.pdf', compact(['staffs', 'inputs']));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('staffs.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $staffs = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $staffs = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($staffs && count($staffs) > 0){
                foreach($staffs as $staff ){
                    $staff->urlRouteEdit = route('admin/staffs/edit', $staff->id);
                    $staff->urlRouteDelete = route('admin/staffs/delete', $staff->id);
                    $staff->urlRoutePrint = route('admin/staffs/print', $staff->id);
                    $staff->urlRouteJob = optional($staff->job)->name_job;
                    $staff->urlRouteNationality = optional($staff->nationality)->name_nationality;
                    $staff->urlRouteSections = optional($staff->NameSections)->name;
                    $data[] = $staff;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function nationality_get(Request $request)
    {
        if($request->get('q') == null){
            $nationality_get = Nationality::deleteArchive()->limit(PAGINATION_COUNT)->get();

        }else{
            $nationality_get = Nationality::deleteArchive()->where('name_nationality','LIKE','%'.$request->get('q').'%')->get();
        }
        return json_encode($nationality_get);
    }
    

}
