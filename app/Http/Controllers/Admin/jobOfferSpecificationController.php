<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobOfferSpecification;
use App\Models\Administration;
use App\Models\Nationality;
use App\Http\Requests\Admin\jobOfferRequests\jobOfferRequests;
use Illuminate\Support\Facades\DB;
use App\Models\JobOfferSalariesSpecification;
use App\Exports\JobOfferSpecificationExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;


class jobOfferSpecificationController extends Controller
{
    public $model;
    public $model_salarie;

    public function __construct(JobOfferSpecification $model,JobOfferSalariesSpecification $employeesSalariesAndBonuses)
    {
        $this->model = $model;
        $this->model_salarie = $employeesSalariesAndBonuses;
    }
    public function index(Request $request)
    {
        $data = [
            'jobOffers'=>$this->model->deleteArchive()->orderBy('id')
                ->when($request->basic_salary_monthly || $request->basic_salary_monthly || $request->basic_salary_Year
                || $request->housing_allowance_monthly || $request->housing_allowance_Year || $request->switch_connectors_monthly
                || $request->switch_connectors_Year || $request->other_allowances_Year || $request->other_allowances_monthly,function($query){
                $query->with(['jobOfferSalary'=>function($d)
                {
                    $d->get();
                }]);
            })->paginate(PAGINATION_COUNT),
            'inputs'=>$request->all()
        ];
        return view('admin.jobOfferSpecification.index', $data);
    }
    public function create()
    {
        return view('admin.jobOfferSpecification.create');
    }
    public function store(jobOfferRequests $re)
    {
        try{

            // insert tabel employeesjobOfferSpecification
            $jobOffer = new $this->model();
            $jobOffer->name = $re->name;
            $jobOffer->nationality_id = $re->nationality_id ;
            $jobOffer->date = $re->date;
            $jobOffer->national_id = $re->national_id;
            $jobOffer->issue_id = $re->issue_id;
            $jobOffer->issue_id_data=$re->issue_id_data;
            $jobOffer->job_id =$re->job_id ;
            $jobOffer->degree_job = $re->degree_job;
            $jobOffer->qualification = $re->qualification;
            $jobOffer->administration_id = $re->administration_id;
            $jobOffer->	branch = $re->branch;
            $jobOffer->degree= $re->degree;
            $jobOffer->is_activate = 1 ;
            $jobOffer->year_contract = $re->year_contract;
            $jobOffer->	yearly_vacation = $re->	yearly_vacation;
            $jobOffer->	treatment = $re->treatment;
            $jobOffer->Probation = $re->Probation;
            $jobOffer->save();
            // insert table employeesSalariesAndBonuses
            $SalariesAndBonuses = new $this->model_salarie();
            $SalariesAndBonuses->basic_salary_monthly = $re->basic_salary_monthly;
            $SalariesAndBonuses->basic_salary_Year = $re->basic_salary_Year;
            $SalariesAndBonuses->housing_allowance_monthly = $re->housing_allowance_monthly;
            $SalariesAndBonuses->housing_allowance_Year= $re->housing_allowance_Year;
            $SalariesAndBonuses->switch_connectors_monthly= $re->switch_connectors_monthly;
            $SalariesAndBonuses->switch_connectors_Year= $re->switch_connectors_monthly;
            $SalariesAndBonuses->employees_job_offer_specification_id = $jobOffer->id;
            $SalariesAndBonuses->other_allowances_Year = $re->other_allowances_Year;
            $SalariesAndBonuses->other_allowances_monthly = $re->other_allowances_monthly;
            $SalariesAndBonuses->save();


            flash()->success("Success Add");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function activate($id)
    {
        try{

            $jobOffer = $this->model->findOrFail($id);
            if($jobOffer->is_activate==1)
            {
                $jobOffer->update(['is_activate'=>0]);
            }else
            {
                $jobOffer->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function edit($id)
    {
        $data = [
            'jobOffer'=>$this->model->findOrFail($id)
        ];
        return view('admin.jobOfferSpecification.edit',$data);
    }
    public function update(jobOfferRequests $re,$id)
    {
        try{
            $jobOffer = $this->model->findOrFail($id);
            $jobOffer->name = $re->name;
            $jobOffer->nationality_id = $re->nationality_id ;
            $jobOffer->date = $re->date;
            $jobOffer->national_id = $re->national_id;
            $jobOffer->issue_id = $re->issue_id;
            $jobOffer->issue_id_data=$re->issue_id_data;
            $jobOffer->job_id =$re->job_id ;
            $jobOffer->degree_job = $re->degree_job;
            $jobOffer->qualification = $re->qualification;
            $jobOffer->administration_id = $re->administration_id;
            $jobOffer->	branch = $re->branch;
            $jobOffer->degree= $re->degree;
            $jobOffer->year_contract = $re->year_contract;
            $jobOffer->	yearly_vacation = $re->	yearly_vacation;
            $jobOffer->	treatment = $re->treatment;
            $jobOffer->Probation = $re->Probation;
            $jobOffer->save();
            $SalariesAndBonuses = $this->model_salarie->where('employees_job_offer_specification_id',$id)->first();
            $SalariesAndBonuses->basic_salary_monthly = $re->basic_salary_monthly;
            $SalariesAndBonuses->basic_salary_Year = $re->basic_salary_Year;
            $SalariesAndBonuses->housing_allowance_monthly = $re->housing_allowance_monthly;
            $SalariesAndBonuses->housing_allowance_Year= $re->housing_allowance_Year;
            $SalariesAndBonuses->switch_connectors_monthly= $re->switch_connectors_monthly;
            $SalariesAndBonuses->switch_connectors_Year= $re->switch_connectors_monthly;
            $SalariesAndBonuses->employees_job_offer_specification_id = $jobOffer->id;
            $SalariesAndBonuses->other_allowances_Year = $re->other_allowances_Year;
            $SalariesAndBonuses->other_allowances_monthly = $re->other_allowances_monthly;
            $SalariesAndBonuses->save();
            flash()->success("The Updated Has Been Done");
            return back();

        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }

    }
    public function getMore(Request $re)
    {
        try{
            if(is_numeric($re->id) && $re->id > 0)
            {
              $jobOffers = $this->model->deleteArchive()->where('id','>',(int)$re->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $jobOffers = $this->model->deleteArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($jobOffers&&count($jobOffers)>0)
            {
                foreach($jobOffers as $jobOffer)
                {
                    $jobOffer->urlRouteActivate = route('admin/jobOfferSpecification/activate',$jobOffer->id);
                    $jobOffer->urlRouteDelete = route('admin/jobOfferSpecification/delete',$jobOffer->id);
                    $jobOffer->urlRouteUpdate = route('admin/jobOfferSpecification/edit',$jobOffer->id);
                    $jobOffer->urlRoutePrint = route('admin/jobOfferSpecification/print',$jobOffer->id);
                    $jobOffer->jobOfferSpecifincation = optional($jobOffer->jobOfferSpecifincation)->name_job;
                    $jobOffer->nationality = optional($jobOffer->nationality)->name_nationality;
                    $jobOffer->administration = optional($jobOffer->administration)->name_administration;
                    $data[] = $jobOffer;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function delete($id)
    {
        try{
            $job = $this->model->findOrFail($id);
            $job->archive = 1;
            $job->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }
    public function exportExcel(Request $request)
    {
        try{
            $inputs = $request->all();
            return Excel::download(new JobOfferSpecificationExport($inputs), 'JobOfferSpecification.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function exportPdf(Request $request)
    {
        try{
            $inputs = $request->all();
            $jobOffers = $this->model->orderBy('id')
            ->when($request->basic_salary_monthly || $request->basic_salary_monthly || $request->basic_salary_Year
            || $request->housing_allowance_monthly || $request->housing_allowance_Year || $request->switch_connectors_monthly
            || $request->switch_connectors_Year || $request->other_allowances_Year || $request->other_allowances_monthly,function($query){
                $query->with(['jobOfferSalary'=>function($d)
                {
                    $d->get();
                }]);
            })->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.jobOfferSpecification.pdf',compact(['jobOffers','inputs']));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('jobOffers.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    public function print($id)
    {
        $jobOffer = $this->model->findOrFail($id);
        return view('admin.jobOfferSpecification.print',compact('jobOffer'));
    }
    public function administrations_get(Request $request)
    {
        if($request->get('q') == null){
            $administrations_get = Administration::deletArchive()->limit(PAGINATION_COUNT)->get();
        }else{
            $administrations_get = Administration::deletArchive()->where('name_administration', 'LIKE', '%'.$request->get('q').'%')->get();
        }
        return json_encode($administrations_get);
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
    public function job_get(Request $request)
    {
        dd($request->all());
        
    }
}
