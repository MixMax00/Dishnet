<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BillController extends Controller
{
    public function bill_pay(Request $request){
//
        $request->validate([
            'customer_id'=>'required',
            'month'=>'required',
            'year'=>'required',
//            'service_charge'=>'required',
//            'paid_amount'=>'required',

        ]);

        $bills = Bill::where('customer_id',$request->customer_id)->where('month',$request->month)->where('year',$request->year)->first();

//        return $bills;



        $bills-> payment_status = 1;
        $bills-> payment_date = Carbon::today()->format('Y-m-d');
        $bills-> em_id = auth()->guard('employee')->user()->employee_id;
        $bills->save();




//

//        return ApiResponse::success($webBill);

//        $bills = Bill::with('customer')->where('em_id',auth()->guard('employee')->user()->employee_id)->where('payment_date',Carbon::today())->where('payment_status',1)->get();
        return ApiResponse::success($bills);
//        return $request;
    }

    public function cash(){
        $bills = Bill::with('customer')->where('em_id',auth()->guard('employee')->user()->employee_id)->where('payment_date',Carbon::today())->where('payment_status',1)->get();
        return ApiResponse::success($bills);
    }

    public function bill_details($id){
        $bills = Bill::with('customer','customer.package')->find($id);
        return ApiResponse::success($bills);
    }

    public function due(){
        $bills = Collection::where('employee_id',auth()->guard('employee')->user()->employee_id)->where(function ($query){
            $query->where('due','>',0);
        })->get();

        return ApiResponse::success($bills);
    }

    public function  report(){

        $date = Carbon::now()->format('Y-m-d');



        $data = ['current_date'=>$date];

        return ApiResponse::success($data);


    }
}
