<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Hash;
use Illuminate\Validation\Rule;
use App\Http\Requests\Admin\UserRequests\UserStoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use PDF;
class UserController  extends Controller
{

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try{
            $users = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            return view('admin.users.index', compact('users'));
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact technical Support");
            return back();
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserStoreRequest $request)
    {
        try{
            // validation
            // hash password
            $request->merge(['password' => bcrypt($request->password)]);
            // create user
            $user = new $this->model();
            $user->is_activate = 1;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = $request->password;
            //save image
            if (!$request->hasFile('photo') == null) {
                $file = uploadIamge( $request->file('photo'), 'users'); // function on helper file to upload file
                $user->photo = $file;
            }
            $user->save();
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
            $user = $this->model->findOrFail($id);
            if($user->is_activate == 1){
                $user->update(['is_activate' => 0]);
            }else{
                $user->update(['is_activate' => 1]);
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
            $user = $this->model->findOrFail($id);
            $user->archive = 1;
            $user->is_activate = 0;
            $user->save();
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
                $users = $this->model->notArchive()->where('id', '>', (int)$request->id)->limit(PAGINATION_COUNT)->get();
            }else{
                $users = $this->model->notArchive()->skip(PAGINATION_COUNT)->limit(PAGINATION_COUNT)->get();
            }
            $data = [];
            if($users && count($users) > 0){
                foreach($users as $user ){
                    $user->photo = asset($user->photo);
                    $user->urlRouteActivate = route('admin/users/activate', $user->id);
                    $user->urlRouteDelete = route('admin/users/delete', $user->id);
                    $data[] = $user;
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
            return Excel::download( new UsersExport , 'users.xlsx');
        }catch(\Exception $ex){
            flash()->error("There Is Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function exportPdf()
    {
        try{
            $users = $this->model->orderBy('id')->paginate(PAGINATION_COUNT);
            // return view('admin.users.pdf', compact('users'));
            $pdf = PDF::loadView('admin.users.pdf', compact('users'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream('users.pdf');
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
                $users = $this->model->where('email', 'LIKE', '%'. $query .'%')
                                        ->orWhere('name', 'LIKE', '%'. $query .'%')
                                        ->orWhere('phone', 'LIKE', '%'. $query .'%')
                                        ->notArchive()->get();            
            }else{
                $users = $this->model->notArchive()->orderBy('id')->paginate(PAGINATION_COUNT);
            }
            $data = [];
            if(isset($users) && count($users) > 0){
                foreach($users as $user ){
                    $user->urlRouteActive = route('admin/users/activate', $user->id);
                    $user->urlRouteDelete = route('admin/users/delete', $user->id);
                    if( $query != '' ){
                        $user->searchButton = 0;
                    }else{
                        $user->searchButton = 1;
                    }
                    $data[] = $user;
                }
            }
            return $data;
        }catch(\Exception $ex){
            return response()->json( ['error' => 'There Is Something Wrong , Please Contact Technical Support'] );
        }
    }

}
