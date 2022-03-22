<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanRequests;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\LoanRequest\LoanRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LoanRequestExport;
use PDF;

class LoanRequestsController extends Controller
{
    public $model;

    public function __construct(LoanRequests $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        try{
            $LoanRequests = $this->model->deleteArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.loanRequest.index',compact('LoanRequests'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
    
    public function create()
    {
        return view('admin.loanRequest.create');
    }

    public function store(LoanRequest $re)
    {
        try{
            $LoanRequest = new $this->model();
            $LoanRequest->staff_id = $re->staff_id;
            $LoanRequest->job_id = $re->job_id;
            $LoanRequest->number = $re->number;
            $LoanRequest->section_id = $re->section_id;
            $LoanRequest->administration_id = $re->administration_id;
            $LoanRequest->going_date = $re->going_date;
            $LoanRequest->basic_salary = $re->basic_salary;
            $LoanRequest->advance_value = $re->advance_value;
            $LoanRequest->direct_manager= $re->direct_manager;
            $LoanRequest->direct_manager_nots = $re->direct_manager_nots;
            $LoanRequest->hr = $re->hr;
            $LoanRequest->hr_nots = $re->hr_nots;
            $LoanRequest->the_accountant = $re->the_accountant;
            $LoanRequest->the_accountant_nots = $re->the_accountant_nots;
            $LoanRequest->is_activate = 0;
            $LoanRequest->archive = 0;
            $LoanRequest->save();
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
            $LoanRequest = $this->model->findOrFail($id);
            return view('admin.loanRequest.edit',compact('LoanRequest'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , please Contact Technical Support");
            return back();
        }
    }

    public function update(LoanRequest $re, $id)
    {
        try{
            $LoanRequest = $this->model->findOrFail($id);
            $LoanRequest->staff_id = $re->staff_id;
            $LoanRequest->job_id = $re->job_id;
            $LoanRequest->number = $re->number;
            $LoanRequest->section_id = $re->section_id;
            $LoanRequest->administration_id = $re->administration_id;
            $LoanRequest->going_date = $re->going_date;
            $LoanRequest->basic_salary = $re->basic_salary;
            $LoanRequest->advance_value = $re->advance_value;
            $LoanRequest->direct_manager= $re->direct_manager;
            $LoanRequest->direct_manager_nots = $re->direct_manager_nots;
            $LoanRequest->hr = $re->hr;
            $LoanRequest->hr_nots = $re->hr_nots;
            $LoanRequest->the_accountant = $re->the_accountant;
            $LoanRequest->the_accountant_nots = $re->the_accountant_nots;
            $LoanRequest->save();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    } 

    public function activate($id)
    {
        try{
            $LoanRequest = $this->model->findOrFail($id);
            if($LoanRequest->is_activate==1)
            {
                $LoanRequest->update(['is_activate'=>0]);
            }else{
                $LoanRequest->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $LoanRequest = $this->model->findOrFail($id);
            $LoanRequest->archive=1;
            $LoanRequest->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $LoanRequest = $this->model->findOrFail($id);
            return view('admin.loanRequest.print',compact('LoanRequest'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $re)
    {
        try{
            if(is_numeric($re->id) && $re->id > 0)
            {
                $LoanRequests = $this->model->deleteArchive()->where('id','>',(int)$re->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $LoanRequests = $this->model->deleteArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($LoanRequests &&count($LoanRequests)>0)
            {
                foreach($LoanRequests as $LoanRequest)
                {
                    $LoanRequest->urlRouteActivate = route('admin/loanRequests/activate',$LoanRequest->id);
                    $LoanRequest->urlRouteDelete = route('admin/loanRequests/delete',$LoanRequest->id);
                    $LoanRequest->urlRouteEdit = route('admin/loanrequests/edit',$LoanRequest->id);
                    $LoanRequest->urlRoutePrint = route('admin/loanRequests/print',$LoanRequest->id);
                    $LoanRequest->name =optional($LoanRequest->staff)->name;
                    $data[] = $LoanRequest;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportExcel()
    {
        try{
        return Excel::download(new LoanRequestExport, 'loanRequest.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function exportPdf()
    {
        try{
            $LoanRequests = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.loanRequest.pdf',compact('LoanRequests'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('LoanRequests.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }

    }
}
