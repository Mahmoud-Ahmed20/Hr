<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administration;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdministrationExport;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\AdministrationRequests\administrationRequests;
use PDF;

class AdministrationController extends Controller
{
    public $model;

    public function __construct(administration $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $administrations = $this->model->deletArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.administration.index',compact('administrations'));
    }

    public function store(administrationRequests $re)
    {
        try{
            $administration = new $this->model();
            $administration->name_administration = $re->name_administration;
            $administration->is_activate = 1;
            $administration->archive = 0;
            $administration->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.administration.create');
    }

    public function update(administrationRequests $re,$id)
    {
        try{
            $administration =  $this->model->findOrFail($id);
            $administration->name_administration = $re->name_administration;
            $administration->save();
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
            $administration = $this->model->findOrFail($id);
            if($administration->is_activate==1)
            {
                $administration->update(['is_activate'=>0]);
            }else
            {
                $administration->update(['is_activate'=>1]);
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
        // dd($id);
        try{
            $administration = $this->model->findOrFail($id);
            $administration->archive = 1;
            $administration->is_activate = 0;
            $administration->save();
            flash()->success("The Deleted Has Been Done");
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
                $administration = $this->model->deletArchive()->where('id','>',(int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $administration = $this->model->deletArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($administration&&count($administration)>0)
            {
                foreach($administration as $admin)
                {
                    $admin->urlRouteActivate = route('admin/administration/activate',$admin->id);
                    $admin->urlRouteDelete = route('admin/administration/delete',$admin->id);
                    $admin->urlRouteUpdate = route('admin/administration/update',$admin->id);
                    $data[] = $admin;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function search(Request $request)
    {
        try{
            $query = $request->get('query');
            if($query != ''){
                $administrations = $this->model->where('name_administration', 'LIKE', '%'. $query .'%')->notArchive()->get();            
            }else{
                $administrations = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($administrations) && count($administrations) > 0){
                foreach($administrations as $administration ){
                    $administration->urlRouteActivate = route('admin/administration/activate',$administration->id);
                    $administration->urlRouteDelete = route('admin/administration/delete',$administration->id);
                    $administration->urlRouteUpdate = route('admin/administration/update',$administration->id);
                    if( $query != '' ){
                        $administration->searchButton = 0;
                    }else{
                        $administration->searchButton = 1;
                    }
                    $data[] = $administration;
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
            return Excel::download(new AdministrationExport, 'administrations.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , PLease Contact Technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $administrations = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.administration.pdf', compact('administrations'));
            $pdf = PDF::loadView('admin.administration.pdf', compact('administrations'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('administrations.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}


