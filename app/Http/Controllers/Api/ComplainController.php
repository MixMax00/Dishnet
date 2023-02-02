<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function add(Request $request){
        $request->validate([
           'area_id'=>'required',
           'customer_id'=>'required',
           'complain'=>'required',
        ]);

        $complain = new Complaint();


        $complain->sp_id = auth()->guard('customer')->user()->sp_id;
//        $complain->employee_id = auth()->guard('customer')->user()->customer_id;
        $complain->area_id = $request->area_id;
        $complain->customer_id = $request->customer_id;
        $complain->complain = $request->complain;
        $complain->save();

        return ApiResponse::success($complain);

    }
}
