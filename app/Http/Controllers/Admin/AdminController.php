<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\AdminRequests\AdminStoreRequest;
use App\Http\Requests\Admin\AdminRequests\AdminChangePasswordRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AdminsExport;
use PDF;

class AdminController  extends Controller
{

    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{
            $admins = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.admins.index', compact('admins'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(AdminStoreRequest $request)
    {
        try{
            // validation
            // hash password
            $request->merge(['password' => bcrypt($request->password)]);
            //create admin
            $admin = new $this->model();
            $admin->is_activate = 1;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phone = $request->phone;
            $admin->password = $request->password;
            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'admins'); // function on helper file to upload file
                $admin->photo = $file;
            }
            $admin->save();
            flash()->success("Success Add");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function info($id)
    {
        try{
            $admin = auth()->guard('admin')->user();
            return view('admin.admins.info', compact('admin'));
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function info_update(Request $request, $id)
    {
        try{
            // validation
            $validator = validator()->make($request->all(),[
                'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($id,'id')],
                'name' => 'required',
                'phone' => ['required', Rule::unique('admins', 'phone')->ignore($id,'id')],
            ]);
            if($validator->fails()){
                flash()->error($validator->errors()->first());
                return back();
            }
            // get admin
            $admin = auth()->guard('admin')->user();
            if(!$admin){
                flash()->error("There IS Somrthing Wrong");
                return back();
            }
            // updaet information
            $admin->email = $request->email;
            $admin->name = $request->name;
            $admin->phone = $request->phone;
            // save image
            if(!$request->hasFile('photo') == null){
                $file = uploadIamge( $request->file('photo'), 'admins'); // function on helper file to upload file
                $admin->photo = $file;
            }
            $admin->save();
            flash()->success("Success");
            return back();
        }catch(\Exception $ex){
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function change_password(AdminChangePasswordRequest $request)
    {
        try{
            // validation
            // get admin
            $admin = auth()->guard('admin')->user();
            if(!$admin){
                flash()->error("There IS Somrthing Wrong");
                return back();
            }
            // check old password
            if(!Hash::check($request->input('old_password'), $admin->password)){
                flash()->error("There IS Something Wrong");
                return back();
            }
            // update password
            $admin->password = bcrypt($request->input('password'));
            $admin->save();
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Somrthing Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function activate($id)
    {
        try{
            $admin = $this->model->findOrFail($id);
            if($admin->is_activate == 1){
                $admin->update(['is_activate' => 0]);
            }else{
                $admin->update(['is_activate' => 1]);
            }
            flash()->success("The Change Has Been Done");
            return back();
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong ,  Please Contact Technical Support");
            return back();
        }
    }

    public function delete($id)
    {
        try{
            $admin = $this->model->findOrFail($id);
            $admin->archive = 1;
            $admin->is_activate = 0;
            $admin->save();
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
                $admins = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $admins = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($admins && count($admins) > 0){
                foreach($admins as $admin ){
                    $admin->photo = asset($admin->photo);
                    $admin->urlRouteActivate = route('admins/activate', $admin->id);
                    $admin->urlRouteDelete = route('admins/delete', $admin->id);
                    $data[] = $admin;
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
            return Excel::download(new AdminsExport, 'admins.xlsx');
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportWord()
    {
        try{
            return Excel::download(new AdminsExport, 'admins.docs');
        }catch(Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {
        try{
            $admins = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.admins.pdf', compact('admins'));
            $pdf = PDF::loadView('admin.admins.pdf', compact('admins'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('admins.pdf');
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
                $admins = $this->model->where('email', 'LIKE', '%'. $query .'%')
                                        ->orWhere('name', 'LIKE', '%'. $query .'%')
                                        ->orWhere('phone', 'LIKE', '%'. $query .'%')
                                        ->notArchive()->get();            
            }else{
                $admins = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($admins) && count($admins) > 0){
                foreach($admins as $admin ){
                    $admin->photo = asset($admin->photo);
                    $admin->urlRouteActive = route('admins/activate', $admin->id);
                    $admin->urlRouteDelete = route('admins/delete', $admin->id);
                    if( $query != '' ){
                        $admin->searchButton = 0;
                    }else{
                        $admin->searchButton = 1;
                    }
                    $data[] = $admin;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

}
