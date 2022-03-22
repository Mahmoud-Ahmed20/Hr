<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FollowCars;
use DB;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\FollowCarsRequests\FollowCarsStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FollowCarsExport;
use PDF;

class FollowCarsController  extends Controller
{

    protected $model;

    public function __construct(FollowCars $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{
            $followCars = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.followCars.index', compact('followCars'));
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.followCars.create');
    }

    public function store(FollowCarsStoreRequest $request)
    {
        try{
            // validation
            //create employe
            $car = new $this->model();
            $car->car_type = $request->car_type;
            $car->plate_number = $request->plate_number;
            $car->color = $request->color;
            $car->model = $request->model;
            $car->owner_name = $request->owner_name;
            $car->license_expiration = $request->license_expiration;
            $car->insurance_expiry = $request->insurance_expiry;
            $car->driving_auth_expiry_1 = $request->driving_auth_expiry_1;
            $car->driving_auth_expiry_2 = $request->driving_auth_expiry_1;
            $car->driver_name = $request->driver_name;
            $car->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function update(FollowCarsStoreRequest $request, $id)
    {
        try{
            // validation
            //create employe
            $car = $this->model->findOrFail($id);
            $car->car_type = $request->car_type;
            $car->plate_number = $request->plate_number;
            $car->color = $request->color;
            $car->model = $request->model;
            $car->owner_name = $request->owner_name;
            $car->license_expiration = $request->license_expiration;
            $car->insurance_expiry = $request->insurance_expiry;
            $car->driving_auth_expiry_1 = $request->driving_auth_expiry_1;
            $car->driving_auth_expiry_2 = $request->driving_auth_expiry_1;
            $car->driver_name = $request->driver_name;
            $car->save();
            flash()->success("Success update");
            return back();
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $car = $this->model->findOrFail($id);
            $car->archive = 1;
            $car->save();
            flash()->success("The Deleted Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return $ex;
            return back();
        }
    }

    public function exportExcel()
    {
        try{
            return Excel::download(new FollowCarsExport, 'followCars.xlsx');
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function print($id)
    {
        try{
            $car = $this->model->findOrFail($id);
            return view('admin.followCars.print', compact('car'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function pdf()
    {
        try{
            $followCars = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.followCars.pdf', compact('followCars'));
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function exportPDF(){
        try{
            $followCars = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            $pdf = PDF::loadView('admin.followCars.pdf', compact('followCars'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('followCars.pdf');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function getMore(Request $request)
    {
        try{
            if( is_numeric($request->id) && $request->id > 0){
                $followCars = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $followCars = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($followCars && count($followCars) > 0){
                foreach($followCars as $car ){
                    $car->urlRouteUpdate = route('admin/followCars/update', $car->id);
                    $car->urlRouteDelete = route('admin/followCars/delete', $car->id);
                    $car->urlRoutePrint = route('admin/followCars/print', $car->id);
                    $data[] = $car;
                }
            }
            return $data;
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }
}
