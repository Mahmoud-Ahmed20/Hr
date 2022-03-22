<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\NationalityRequests\nationalityRequests;
use App\Models\Nationality;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NationalitiesExports;
use PDF;

class NationalityController extends Controller
{
    public $model;
    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{
            $nationalitys = $this->model->deleteArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.nationlity.index',compact('nationalitys'));
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }

    public function create()
    {
        return view('admin.nationlity.create');
    }

    public function store(nationalityRequests $re)
    {
        try{
            $nationality = new $this->model;
            $nationality->name_nationality= $re->name_nationality;
            $nationality->is_activate=1;
            $nationality->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(nationalityRequests $re ,$id)
    {
        try{
            $nationality = $this->model->findOrFail($id);
            $nationality->name_nationality = $re->name_nationality;
            $nationality->save();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }

    }

    public function delete($id)
    {
        try{
            $nationality = $this->model->findOrFail($id);
            $nationality->archive = 1;
            $nationality->is_activate = 0;
            $nationality->save();
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
            $nationality = $this->model->findOrFail($id);
            if($nationality->is_activate==1)
            {
                $nationality->update(['is_activate'=>0]);
            }else
            {
                $nationality->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
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
              $nationality = $this->model->deleteArchive()->where('id','>',(int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $nationality = $this->model->deleteArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($nationality&&count($nationality)>0)
            {
                foreach($nationality as $nationality)
                {
                    $nationality->urlRouteActivate = route('admin/nationality/activate',$nationality->id);
                    $nationality->urlRouteDelete = route('admin/nationality/delete',$nationality->id);
                    $nationality->urlRouteUpdate = route('admin/nationality/update',$nationality->id);
                    $data[] = $nationality;
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
                $nationalities = $this->model->where('name_nationality', 'LIKE', '%'. $query .'%')->notArchive()->get();            
            }else{
                $nationalities = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($nationalities) && count($nationalities) > 0){
                foreach($nationalities as $nationality ){
                    $nationality->urlRouteActivate = route('admin/nationality/activate',$nationality->id);
                    $nationality->urlRouteDelete = route('admin/nationality/delete',$nationality->id);
                    $nationality->urlRouteUpdate = route('admin/nationality/update',$nationality->id);
                    if( $query != '' ){
                        $nationality->searchButton = 0;
                    }else{
                        $nationality->searchButton = 1;
                    }
                    $data[] = $nationality;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return $ex;
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

    public function exportExcel()
    {
        try{
            return Excel::download(new NationalitiesExports, 'nationalities.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , PLease Contact Technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $nationalities = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.nationlity.pdf', compact('nationalities'));
            $pdf = PDF::loadView('admin.nationlity.pdf', compact('nationalities'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('nationalities.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
