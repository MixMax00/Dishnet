<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CostController extends Controller
{
    public function cost(Request $request){
//        $request->validate([
//           'cost_details'=>'required',
//           'amount'=>'required'
//        ]);


        $costs = $request->all();
//        return $costs['costs'];
//        dd($costs[]);
        $i=0;
//       $length = count($costs['costs']);
        foreach ($costs['costs'] as $value) {
            $cost = new Cost();
            $cost->sp_id = auth()->guard('employee')->user()->sp_id;
            $cost->employee_id = auth()->guard('employee')->user()->employee_id;
            $cost->cost_details = $value['cost_details'];
            $cost->amount = $value['amount'];
            $cost->date = Carbon::now()->format('Y-m-d');
            $cost->save();

//            $i++;


        }

//        return $i;

        return response()->json([
           'code'=>200,
           'status'=>'true',
           'message'=>'Cost Request send',
//           'data'=>$costs['cost'],
        ],200);

//       return $length;

    }

    public function all_request(){
        $costs = Cost::where('employee_id',auth()->guard('employee')->user()->employee_id)->get();
        return ApiResponse::success($costs);
    }

    public function confirmed(){
        $cost = Cost::where('employee_id',auth()->guard('employee')->user()->employee_id)->where('is_Accept',2)->get();
        return ApiResponse::success($cost);
    }

    public function reject(){
        $cost = Cost::where('employee_id',auth()->guard('employee')->user()->employee_id)->where('is_Accept',1)->get();
        return ApiResponse::success($cost);
    }

    public function single_cost($id){
        $cost = Cost::find($id);
        return ApiResponse::success($cost);
    }

    public function date_wise(Request $request){
        $request->validate([
           'start_date'=>'required',
           'end_date'=> 'required'
        ]);

        $costs = Cost::where('date', '>=' ,$request->start_date)->where('date','<=',$request->end_date)->get();
        return ApiResponse::success($costs);
    }
}
