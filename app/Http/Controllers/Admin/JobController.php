<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\jobRequests\jobRequests;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Administration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExports;
use PDF;

class JobController extends Controller
{
    public $model;
    public function __construct(Job $model)
    {
        $this->model= $model;
    }

    public function index()
    {
        try{
            $jobs = $this->model->deleteArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.job.index',compact('jobs'));
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.job.create');
    }

    public function store(jobRequests $re)
    {
        try{
            $job = new $this->model();
            $job->name_job = $re->name_job;
            $job->administration_id = $re->administration_id;
            $job->is_activate = 1;
            $job->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function edit($id)
    {
        try{
            $job = $this->model->findOrFail($id);
            return view('admin.job.edit',compact('job'));
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(jobRequests $re,$id)
    {
        try{
            $job = $this->model->findOrFail($id);
            $job->name_job = $re->name_job;
            $job->administration_id = $re->administration_id;
            $job->save();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if(is_numeric($request->id) && $request->id > 0)
            {
                $job = $this->model->deleteArchive()->where('id','>',(int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $job = $this->model->deleteArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($job&&count($job)>0)
            {
                foreach($job as $job)
                {
                    $job->urlRouteActivate = route('admin/job/activate',$job->id);
                    $job->urlRouteDelete = route('admin/job/delete',$job->id);
                    $job->urlRouteUpdate = route('admin/job/update',$job->id);
                    $job->administrationName = optional($job->administration)->name_administration;
                    $data[] = $job;
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
            $job->is_activate = 0;
            $job->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function activate($id)
    {
        try{
            $job = $this->model->findOrFail($id);
            if($job->is_activate==1)
            {
                $job->update(['is_activate'=>0]);
            }else
            {
                $job->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function search(Request $request)
    {
        try{
            $query = $request->get('query');
            if($query != ''){
                $jobs = $this->model->where('name_job', 'LIKE', '%'. $query .'%')->notArchive()->get();
            }else{
                $jobs = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($jobs) && count($jobs) > 0){
                foreach($jobs as $job ){
                    $job->urlRouteActivate = route('admin/job/activate',$job->id);
                    $job->urlRouteDelete = route('admin/job/delete',$job->id);
                    $job->urlRouteUpdate = route('admin/job/update',$job->id);
                    $job->administrationName = optional($job->administration)->name_administration;
                    if( $query != '' ){
                        $job->searchButton = 0;
                    }else{
                        $job->searchButton = 1;
                    }
                    $data[] = $job;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

    public function exportExcel()
    {
        try{
            return Excel::download(new JobsExports, 'jobs.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , PLease Contact Technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $jobs = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.job.pdf', compact('jobs'));
            $pdf = PDF::loadView('admin.job.pdf', compact('jobs'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('jobs.pdf');
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
