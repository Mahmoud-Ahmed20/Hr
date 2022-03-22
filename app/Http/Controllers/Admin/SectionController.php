<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\SectionsRequests\SectionRequests;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SectionExports;
use PDF;

class SectionController extends Controller
{
    public $model;
    public function __construct(Section $model)
    {
            $this->model = $model;
    }

    public function index()
    {
        $sections= $this->model->deleteArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
        return view('admin.sections.index',compact('sections'));
    }
    
    public function create()
    {
        return view('admin.sections.create');
    }

    public function store(SectionRequests $re)
    {
        try{
            $section = new $this->model();
            $section->name = $re->name;
            $section->is_activate = 1 ;
            $section->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function activate($id)
    {
        try{
            $section = $this->model->findOrFail($id);
            if($section->is_activate==1)
            {
                $section->update(['is_activate'=>0]);
            }else
            {
                $section->update(['is_activate'=>1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $adm){
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
            }
    }

    public function update(SectionRequests $re,$id)
    {
        try{
            $section = $this->model->findOrFail($id);
            $section->name = $re->name;
            $section->save();
            flash()->success("The Updated Has Been Done");
            return back();
        }catch(\Exception $adm){
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $section = $this->model->findOrFail($id);
            $section->archive = 1;
            $section->is_activate = 0;
            $section->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $adm){
            return $adm;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function search(Request $request)
    {
        try{
            $query = $request->get('query');
            if($query != ''){
                $sections = $this->model->where('name', 'LIKE', '%'. $query .'%')->notArchive()->get();            
            }else{
                $sections = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($sections) && count($sections) > 0){
                foreach($sections as $section ){
                    $section->urlRouteActivate = route('admin/sections/activate',$section->id);
                    $section->urlRouteDelete = route('admin/sections/delete',$section->id);
                    $section->urlRouteUpdate = route('admin/sections/update',$section->id);
                    if( $query != '' ){
                        $section->searchButton = 0;
                    }else{
                        $section->searchButton = 1;
                    }
                    $data[] = $section;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

    public function getMore(Request $request)
    {
        try{
            if(is_numeric($request->id) && $request->id > 0)
            {
                $sections = $this->model->deleteArchive()->where('id','>',(int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else
            {
                $sections = $this->model->deleteArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($sections&&count($sections)>0)
            {
                foreach($sections as $section)
                {
                    $section->urlRouteActivate = route('admin/sections/activate',$section->id);
                    $section->urlRouteDelete = route('admin/sections/delete',$section->id);
                    $section->urlRouteUpdate = route('admin/sections/update',$section->id);
                    $data[] = $section;
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
            return Excel::download(new SectionExports, 'sections.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , PLease Contact Technical Support");
            return back();
        }
    }

    public function exportPDF()
    {
        try{
            $sections = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.sections.pdf', compact('sections'));
            $pdf = PDF::loadView('admin.sections.pdf', compact('sections'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('sections.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

}
