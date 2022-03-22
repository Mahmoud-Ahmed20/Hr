<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\Admin\AdminRequests\AdminLoginRequest;
use Auth;
use Hash;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function check_login(AdminLoginRequest $request){
        try{
            // validation
            $admin = Admin::where('email', $request->email)->first();
            if($admin){
                if(Hash::check($request->password, $admin->password)){
                    if($admin->is_activate == 1){
                        if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
                            return redirect(route('admin/index'));
                        }
                    }else{
                        flash()->error("You Are Not Activate");
                        return back();
                    }
                }else{
                    flash()->error("There IS Something Worng");
                    return back();
                }
            }else{
                flash()->error("There IS Something Wrong");
                return back();
            }
        }catch(\Exception $ex){
            return $ex;
            flash()->error("There IS Something Wrong , Please Contact Technical Support");
            return back();
        }
    }

    public function logout(){
        auth('admin')->logout();
        return redirect(route('admin/login'));
    }

}
