<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Staff;
use Response;

class StaffController  extends Controller
{
    public function details(Request $request){
        try{
            $query = $request->get('query');
            if($request->get('query') == null ){
                $staffS = Staff::notArchive()->select('id', 'name', 'salary_system')->get();
            }else{
                $staffS = Staff::notArchive()->where('name', 'LIKE', '%'. $query .'%')->select('id', 'name', 'salary_system')->get();
            }
            return Response::json($staffS);
        }catch(\Exception $ex){
            return response()->json([ 'error' => 'There Is Something Wrong , Please Contact Tecnical Support' ]);
        }
    }
}