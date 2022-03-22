<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administration;
use App\Models\Job;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Staff;

class HomeController extends Controller
{
    public function home()
    {
        return view('admin.home');
    }

    public function getStaffs(Request $request)
    {
        try{
            if($request->get('q') == null){
                $staffs = Staff::notArchive()->limit(PAGINATION_COUNT)->get();
            }else{
                $staffs = Staff::notArchive()->where('name','LIKE','%'.$request->get('q').'%')->get();
            }
            return json_encode($staffs);
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Technical Support' ]);
        }
    }

    public function getSections(Request $request)
    {
        try{
            if($request->get('q') == null){
                $sections = Section::deleteArchive()->limit(PAGINATION_COUNT)->get();
            }else{
                $sections = Section::deleteArchive()->where('name','LIKE','%'.$request->get('q').'%')->get();
            }
            return json_encode($sections);
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contect Technical Support' ]);
        }
    }

    public function getAdministrations(Request $request)
    {
        try{
            if($request->get('q') == null){
                $administrations = Administration::notArchive()->active()->limit(PAGINATION_COUNT)->get();
            }else{
                $administrations = Administration::notArchive()->active()->where('name_administration', 'LIKE', '%'.$request->get('q').'%' )->get();
            }
            return json_encode($administrations);
        }catch(\Exception $ex){ 
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Technical Support']);
        }
    }

    public function getJobsAdministration(Request $request)
    {
        try{
            $query = $request->get('administration_id');
            $data = [];
            if(!$query == null){
                $jobs = Job::notArchive()->active()->where('administration_id', $query)->select('id', 'name_job')->get();
                return $jobs;
            }else{
                return $data;
            }
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Technical Support']);
        }
    }

    public function getNationalities(Request $request)
    {
        try{
            if($request->get('q') == null){
                $nationality_get = Nationality::deleteArchive()->active()->limit(PAGINATION_COUNT)->get();
                
            }else{
                $nationality_get = Nationality::deleteArchive()->active()->where('name_nationality', 'LIKE', '%'.$request->get('q').'%' )->get();
            }
            return json_encode($nationality_get);
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support']);
        }
    }

    public function getJobs(Request $request)
    {
        try{
            if($request->get('q') == null){
                $jobs = Job::deleteArchive()->active()->limit(PAGINATION_COUNT)->get();
            }else{
                $jobs = Job::deleteArchive()->active()->where('name_job', 'LIKE', '%'.$request->get('q').'%' )->get();
            }
            return json_encode($jobs);
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Technical Support']);
        }
    }
}
